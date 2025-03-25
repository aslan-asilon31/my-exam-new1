<?php

namespace App\Livewire\Admin\HasilAsesmen\Komponen;

use App\Helpers\Table\Traits\WithTable;
use App\Models\Asesmen;
use App\Models\PenggunaAsesmen;
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

final class TabelHasilAsesmen extends PowerGridComponent
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
        return Pengguna::query()
                ->join('pengguna_asesmens', 'pengguna_asesmens.pengguna_id', '=', 'penggunas.id')
                ->select([
                    'penggunas.id',
                    'penggunas.nama',
                    'pengguna_asesmens.tgl_dibuat' // Pastikan untuk memilih kolom tgl_dibuat dari tabel yang benar
                ])
                ->orderBy('pengguna_asesmens.tgl_dibuat', 'desc') // Menyebutkan tabel untuk kolom tgl_dibuat
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
                    <x-menu-item title="Edit" Link="/ubah-asesmen/' . e($record->id) . '"/>
                </x-dropdown>'))
            ->add('id', fn($record) => $record->id)
            ->add('nama', fn($record) => $record->nama);
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
                ->sortable(),


           
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('id', 'id')->placeholder('ID'),
            Filter::inputText('Nama', 'nama')->placeholder('nama'),
            

    
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
