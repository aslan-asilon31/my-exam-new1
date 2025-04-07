<?php

namespace App\Livewire\Admin\Asesmen\Komponen;

use App\Helpers\Table\Traits\WithTable;
use App\Models\Asesmen;
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

final class TabelAsesmen extends PowerGridComponent
{
    public string $tableName = 'asesmens';
    public string $sortField = 'tgl_dibuat';
    public string $sortDirection = 'desc';
    public string $url = '/asesmen';

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
        return Asesmen::query()
            ->join('pertanyaans', 'asesmens.id', 'pertanyaans.asesmen_id')
            ->select([
                'asesmens.id',
                'asesmens.judul',
                'asesmens.deskripsi',
                'asesmens.durasi',
                'asesmens.tgl_mulai',
                'asesmens.tgl_selesai',
                'asesmens.dibuat_oleh',
                'asesmens.diupdate_oleh',
                'asesmens.tgl_dibuat',
            ]);
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
                    <x-menu-item title="Edit" Link="/ubah-asesmen/' . e($record->id) . '"/>
                </x-dropdown>'))
            ->add('judul', fn($record) => $record->judul)
            ->add('deskripsi')
            ->add('durasi')
            ->add('tgl_mulai')
            ->add('tgl_selesai')
            ->add('dibuat_oleh')
            ->add('diupdate_oleh')
            ->add('tgl_dibuat');
    }

    public function columns(): array
    {
        return [
            Column::make('Action', 'action')
                ->visibleInExport(false)
                ->bodyAttribute('text-center')
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('ID', 'id')
                ->visibleInExport(false) // Hide ID column in export
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('Judul', 'judul')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('Deskripsi', 'deskripsi')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('Durasi', 'durasi')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('Tanggal mulai', 'tgl_mulai')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),

            Column::make('Tanggal selesai', 'tgl_selesai')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),

            Column::make('Dibuat oleh', 'dibuat_oleh')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),

            Column::make('Dibuat oleh', 'diupdate_oleh')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('diupdate oleh', 'diupdate_oleh')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('tgl_dibuat', 'diupdate_oleh')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),



        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('id', 'id')->placeholder('ID'),
            Filter::inputText('judul', 'judul')->placeholder('Judul'),
            Filter::inputText('deskripsi', 'deskripsi')->placeholder('Deskripsi'),
            Filter::inputText('durasi', 'durasi')->placeholder('Durasi'),
            Filter::inputText('email', 'email')->placeholder('Email'),
            Filter::datetimepicker('tgl_mulai', 'tgl_dibuat')
                ->params(['timezone' => 'Asia/Jakarta']),

            Filter::inputText('dibuat_oleh', 'dibuat_oleh')->placeholder('dibuat_oleh'),
            Filter::inputText('diupdate_oleh', 'diupdate_oleh')->placeholder('diupdate_oleh'),



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
