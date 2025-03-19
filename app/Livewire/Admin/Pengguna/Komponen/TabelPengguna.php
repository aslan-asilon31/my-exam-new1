<?php

namespace App\Livewire\Admin\Pengguna\Komponen;

use App\Helpers\Table\Traits\WithTable;
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

final class TabelPengguna extends PowerGridComponent
{
    public string $tableName = 'penggunas';
    public string $sortField = 'tgl_dibuat';
    public string $sortDirection = 'desc';
    public string $url = '/pengguna';

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
        return Pengguna::query()
            ->select([
                'id',
                'nama',
                'surel',
                'dibuat_oleh',
                'diupdate_oleh',
                'tgl_dibuat',
                'tgl_diupdate',
            ]);
    }

    public function relationSearch(): array
    {
        return [
       
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('action', fn($record) => Blade::render('
                <x-dropdown no-x-anchor class="btn-sm">
                    <x-menu-item title="Show" Link="/daftar-pertanyaan/show/' . e($record->id) . '/readonly" />
                    <x-menu-item title="Edit" Link="/daftar-pertanyaan/edit/' . e($record->id) . '"/>
                </x-dropdown>'))
            ->add('nama', fn($record) => $record->nama)
            ->add('surel')
            ->add('dibuat_oleh')
            ->add('diupdate_oleh')
            ->add('tgl_dibuat')
            ->add('tgl_diupdate');
    }

    public function columns(): array
    {
        return [
            Column::make('Action', 'action')
                ->visibleInExport(false)
                ->bodyAttribute('text-center'),

            Column::make('ID', 'id')
                ->visibleInExport(false) // Hide ID column in export
                ->sortable(),

            Column::make('Nama', 'nama')
                ->sortable()
                ->searchable(),


            Column::make('Surel', 'surel')
                ->sortable()
                ->searchable(),

            Column::make('Dibuat oleh', 'dibuat_oleh')
                ->sortable(),

            Column::make('update oleh', 'diupdate_oleh')
                ->sortable(),

            Column::make('tgl dibuat', 'tgl_dibuat')
                ->sortable(),

            Column::make('tgl dibuat', 'tgl_diupdate')
                ->sortable(),

           
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('id', 'id')->placeholder('ID'),
            Filter::inputText('nama', 'nama')->placeholder('Nama'),
            Filter::inputText('surel', 'surel')->placeholder('Surel'),
            Filter::inputText('dibuat_oleh', 'dibuat_oleh')->placeholder('Dibuat oleh'),
            Filter::inputText('diupdate_oleh', 'diupdate_oleh')->placeholder('Diupdate oleh'),
            Filter::datetimepicker('tgl_dibuat', 'tgl_dibuat')
                ->params(['timezone' => 'Asia/Jakarta']),
            Filter::datetimepicker('tgl_diupdate', 'tgl_diupdate')
                ->params(['timezone' => 'Asia/Jakarta']),
         
        

    
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
