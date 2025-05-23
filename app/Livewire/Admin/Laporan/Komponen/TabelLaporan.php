<?php

namespace App\Livewire\Admin\Laporan\Komponen;

use App\Helpers\Table\Traits\WithTable;
use App\Models\Asesmen;
use App\Models\PenggunaAsesmen;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Position;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use Illuminate\Support\Facades\Blade;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

final class TabelLaporan extends PowerGridComponent
{
    public string $tableName = 'pengguna_asesmens';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    public string $url = '/laporan';
    public string $title = 'Laporan';

    use WithExport;
    use WithTable;

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'my-export-file')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        // $users = User::query()
        // ->join('pengguna_asesmens', 'pengguna_asesmens.pengguna_id', '=', 'users.id')
        // ->join('asesmens', 'pengguna_asesmens.asesmen_id', '=', 'asesmens.id')
        // ->join('detail_pengguna_asesmen', 'detail_pengguna_asesmen.pengguna_asesmen_id', '=', 'pengguna_asesmens.id')
        // ->join('pertanyaans', 'detail_pengguna_asesmen.pertanyaan_id', '=', 'pertanyaans.id')
        // ->select([
        //     'users.id',
        //     'users.name',
        //     'users.email',
        //     DB::raw('GROUP_CONCAT(asesmens.judul SEPARATOR ", ") as judul_asesmen'),
        //     DB::raw('MAX(pengguna_asesmens.tgl_mulai) as tgl_mulai'),
        //     DB::raw('MAX(pengguna_asesmens.tgl_selesai) as tgl_selesai'),
        //     DB::raw('MAX(pengguna_asesmens.tgl_dibuat) as tgl_dibuat'),
        //     DB::raw('MAX(pengguna_asesmens.tgl_diupdate) as tgl_diupdate'),
        //     DB::raw('SUM(detail_pengguna_asesmen.poin) as total_poin'),
        //     DB::raw('SUM(pertanyaans.bobot) as total_bobot'),
        //     DB::raw(
        //         "CASE
        //                 WHEN SUM(pertanyaans.bobot) = 0 THEN 0
        //                 ELSE (SUM(detail_pengguna_asesmen.poin)/SUM(pertanyaans.bobot)) * 100
        //             END AS hasil_poin"
        //         )
        // ])
        // ->groupBy('users.id', 'users.name', 'users.email')
        // ->orderByDesc(DB::raw("MAX(pengguna_asesmens.tgl_dibuat)"))
        // ->limit(10)->get();

        $users = User::query()
    ->join('pengguna_asesmens', 'pengguna_asesmens.pengguna_id', '=', 'users.id')
    ->join('asesmens', 'pengguna_asesmens.asesmen_id', '=', 'asesmens.id')
    ->join('detail_pengguna_asesmen', 'detail_pengguna_asesmen.pengguna_asesmen_id', '=', 'pengguna_asesmens.id')
    ->join('pertanyaans', 'detail_pengguna_asesmen.pertanyaan_id', '=', 'pertanyaans.id')
    ->select([
        'users.id as user_id',
        'users.name as user_name',
        'users.email as user_email',
        'asesmens.id as asesmen_id',
        'asesmens.judul as asesmen_judul',
        'pengguna_asesmens.tgl_mulai',
        'pengguna_asesmens.tgl_selesai',
        'pengguna_asesmens.tgl_dibuat',
        'pengguna_asesmens.tgl_diupdate',
        DB::raw('SUM(detail_pengguna_asesmen.poin) as total_poin'),
        DB::raw('SUM(pertanyaans.bobot) as total_bobot'),
        DB::raw(
            "CASE
                WHEN SUM(pertanyaans.bobot) = 0 THEN 0
                ELSE (SUM(detail_pengguna_asesmen.poin)/SUM(pertanyaans.bobot)) * 100
            END AS hasil_poin"
        )
    ])
    ->groupBy('users.id', 'users.name', 'users.email', 'asesmens.id', 'asesmens.judul', 'pengguna_asesmens.tgl_mulai', 'pengguna_asesmens.tgl_selesai', 'pengguna_asesmens.tgl_dibuat', 'pengguna_asesmens.tgl_diupdate')
    ->orderByDesc('pengguna_asesmens.tgl_dibuat')
    ->limit(10);
        
        // dd($users);
        // ->limit(10); 

        return $users;


    }

    public function relationSearch(): array
    {
        return [
            'pertanyaan' => [
                'pertanyaan',
            ],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('user_id', fn($record) => $record->user_id)
            ->add('user_name', fn($record) => $record->user_name)
            ->add('asesmen_judul', fn($record) => $record->asesmen_judul)
            ->add('hasil_poin', fn($record) => round($record->hasil_poin,1))
            ->add('user_email', fn($record) => $record->user_email)
            ->add('tgl_mulai', fn($record) => $record->tgl_mulai)
            ->add('tgl_selesai', fn($record) => $record->tgl_selesai)
            ->add('tgl_dibuat', fn($record) => $record->tgl_dibuat)
            ->add('tgl_diupdate', fn($record) => $record->tgl_diupdate);
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'user_id')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),
            Column::make('Name', 'user_name')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),

            Column::make('Asesmen', 'asesmen_judul')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),
            
            Column::make('Hasil Asesmen', 'hasil_poin')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),


            Column::make('Tanggal Asesmen Mulai', 'tgl_mulai')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),

            Column::make('Tanggal Asesmen Selesai', 'tgl_selesai')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),

            Column::make('Tanggal Dibuat', 'tgl_dibuat')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),

            Column::make('Tanggal Diupdate', 'tgl_diupdate')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),


        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('ID', 'user_id')->placeholder('user id'),
            Filter::inputText('Name', 'user_name')->placeholder('user name'),
            Filter::inputText('Email', 'user_email')->placeholder('user email'),
            Filter::inputText('Nilai Poin', 'nilai_poin')->placeholder('nilai_poin'),
            Filter::inputText('Tanggal Mulai', 'tgl_mulai')->placeholder('tgl_mulai'),
            Filter::inputText('Tanggal Selesai', 'tgl_selesai')->placeholder('tgl_selesai'),
            Filter::inputText('Tanggal Dibuat', 'tgl_dibuat')->placeholder('tgl_dibuat'),
            Filter::inputText('Tanggal Diupdate', 'tgl_diupdate')->placeholder('tgl_diupdate'),

        ];
    }

    #[\Livewire\Attributes\On('clickToPrint')]
    public function clickToPrint(string $id, string $name): void
    {
        $this->js('alert(\'Print  ' . $id . '\')');
    }

    #[\Livewire\Attributes\On('clickToShow')]
    public function clickToShow(string $id, string $name): void
    {
        $this->js('alert(\'Show ' . $id . '\')');
    }

    #[\Livewire\Attributes\On('clickToEdit')]
    public function clickToEdit(string $id, string $name): void
    {
        $this->js('alert(\'Edit ' . $id . '\')');
    }

    #[\Livewire\Attributes\On('clickToDelete')]
    public function clickToDelete(string $id, string $name): void
    {
        $this->js('alert(\'Delete ' . $id . '\')');
    }
}
