<?php

namespace App\Livewire\Admin\Pengguna\Komponen;

use App\Helpers\Table\Traits\WithTable;
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

final class TabelPengguna extends PowerGridComponent
{
    public string $tableName = 'penggunas';
    public string $sortField = 'created_at';
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
        return User::query()
            ->select([
                'id',
                'name',
                'email',
                'created_by',
                'updated_by',
                'created_at',
                'updated_at',
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
            ->add('name', fn($record) => $record->name)
            ->add('email')
            ->add('created_by')
            ->add('updated_by')
            ->add('created_at')
            ->add('updated_at');
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


            Column::make('Name', 'name')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),



            Column::make('email', 'email')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('Dibuat oleh', 'created_by')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('update oleh', 'updated_by')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('tgl dibuat', 'created_at')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),


            Column::make('tgl dibuat', 'updated_at')
                ->sortable()
                ->headerAttribute('text-center', 'background-color:#851902; color:white;text-align:center;'),



        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('id', 'id')->placeholder('ID'),
            Filter::inputText('name', 'name')->placeholder('Name'),
            Filter::inputText('email', 'email')->placeholder('email'),
            Filter::inputText('created_by', 'created_by')->placeholder('Dibuat oleh'),
            Filter::inputText('updated_by', 'updated_by')->placeholder('Diupdate oleh'),
            Filter::datetimepicker('created_at', 'created_at')
                ->params(['timezone' => 'Asia/Jakarta']),
            Filter::datetimepicker('updated_at', 'updated_at')
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
