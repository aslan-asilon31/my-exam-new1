<?php

namespace App\Livewire\Admin\PenilaianAsesmen\Komponen;

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

final class TabelPenilaianAsesmen extends PowerGridComponent
{
    public string $tableName = 'asesmens';
    public string $sortField = 'tgl_dibuat';
    public string $sortDirection = 'desc';
    public string $url = '/penilaian-asesmen';

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
        return User::query()
                ->join('pengguna_asesmens', 'pengguna_asesmens.pengguna_id', '=', 'users.id')
                ->select([
                    'users.id',
                    'users.name',
                    'users.email',
                    'pengguna_asesmens.tgl_mulai',
                    'pengguna_asesmens.tgl_selesai',
                    'pengguna_asesmens.tgl_dibuat' ,
                    'pengguna_asesmens.tgl_diupdate'
                ])
                ->orderBy('pengguna_asesmens.tgl_dibuat', 'desc')
                ->limit(10)
                ->offset(0);

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
            ->add('action', fn($record) => Blade::render('
                <x-dropdown no-x-anchor class="btn-sm">
                    <x-menu-item title="Lihat Detail" Link="/penilaian-asesmen/' . e($record->id) . '/readonly" />
                    <x-menu-item title="Beri nilai" Link="/penilaian-asesmen/' . e($record->id) . '"/>
                </x-dropdown>'))
            ->add('name', fn($record) => $record->name)
            ->add('email', fn($record) => $record->email)
            ->add('tgl_mulai', fn($record) => $record->tgl_mulai)
            ->add('tgl_selesai', fn($record) => $record->tgl_selesai)
            ->add('tgl_dibuat', fn($record) => $record->tgl_dibuat)
            ->add('tgl_diupdate', fn($record) => $record->tgl_diupdate);
    }

    public function columns(): array
    {
        return [
            Column::make('', 'action')
                ->visibleInExport(false)
                ->bodyAttribute('text-center')
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),

            Column::make('Name', 'name')
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
            Filter::inputText('email', 'email')->placeholder('email'),
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
