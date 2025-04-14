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
    public string $tableName = 'users';
    public string $sortField = 'tgl_dibuat';
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
        $users = User::query()
                ->join('pengguna_asesmens', 'pengguna_asesmens.pengguna_id', '=', 'users.id')
                ->join('detail_pengguna_asesmen', 'detail_pengguna_asesmen.pengguna_asesmen_id', '=', 'pengguna_asesmens.id')
                ->join('pertanyaans', 'detail_pengguna_asesmen.pertanyaan_id', '=', 'pertanyaans.id')
                ->select([
                    'users.id',
                    'users.name',
                    'users.email',
                    DB::raw('MAX(pengguna_asesmens.tgl_mulai) as tgl_mulai'),
                    DB::raw('MAX(pengguna_asesmens.tgl_selesai) as tgl_selesai'),
                    DB::raw('MAX(pengguna_asesmens.tgl_dibuat) as tgl_dibuat'),
                    DB::raw('MAX(pengguna_asesmens.tgl_diupdate) as tgl_diupdate'),
                    DB::raw('SUM(detail_pengguna_asesmen.poin) as total_poin'), // Hitung total poin
                    DB::raw('COUNT(detail_pengguna_asesmen.pertanyaan_id) as total_soal') // Hitung total soal
                ])
                ->groupBy('users.id', 'users.name', 'users.email')
                ->where('users.id', '<>', auth()->id())
                ->orderByDesc('tgl_dibuat')
                ->limit(10);

            
                return $users; 

  
        // $users = User::query()
        //         ->join('pengguna_asesmens', 'pengguna_asesmens.pengguna_id', '=', 'users.id')
        //         ->join('detail_pengguna_asesmen', 'detail_pengguna_asesmen.pengguna_asesmen_id', '=', 'pengguna_asesmens.id')
        //         ->select([
        //             'users.id',
        //             'users.name',
        //             'users.email',
        //             DB::raw('MAX(pengguna_asesmens.tgl_mulai) as tgl_mulai'),
        //             DB::raw('MAX(pengguna_asesmens.tgl_selesai) as tgl_selesai'),
        //             DB::raw('MAX(pengguna_asesmens.tgl_dibuat) as tgl_dibuat'),
        //             DB::raw('MAX(pengguna_asesmens.tgl_diupdate) as tgl_diupdate'),
        //             DB::raw('MAX(detail_pengguna_asesmen.poin) as poin'),
        //         ])
        //         ->groupBy('users.id', 'users.name', 'users.email')
        //         ->where('users.id', '<>', auth()->id())
        //         ->orderByDesc('tgl_dibuat')->get()->toArray();

                // dd($users);

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
            ->add('name', fn($record) => $record->name)
            ->add('nilai_poin', fn($record) => $record->total_poin)
            ->add('email', fn($record) => $record->email)
            ->add('tgl_mulai', fn($record) => $record->tgl_mulai)
            ->add('tgl_selesai', fn($record) => $record->tgl_selesai)
            ->add('tgl_dibuat', fn($record) => $record->tgl_dibuat)
            ->add('tgl_diupdate', fn($record) => $record->tgl_diupdate);
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),
           
            Column::make('Nilai Poin', 'nilai_poin')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),
           

            Column::make('Tanggal Asesmen Mulai', 'tgl_mulai')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),

            Column::make('Tanggal Asesmen Selesai', 'tgl_selesai')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),

            Column::make('Tanggal Dibuat', 'tgl_dibuat')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),

            Column::make('Tanggal Diupdate', 'tgl_diupdate')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('Name', 'name')->placeholder('name'),
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
