<?php

namespace App\Livewire\Admin\Role\Component;

use App\Helpers\Table\Traits\WithTable;
use App\Models\Role;
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

final class RoleTable extends PowerGridComponent
{
    public string $tableName = 'roles';
    public string $sortField = 'created_at';
    // public string $sortDirection = 'desc';
    public string $url = '/role';

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
        return Role::query()
            ->select([
                'id',
                'name',
                'guard_name',

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
                    <x-menu-item title="Show" Link="/role/show/' . e($record->id) . '/readonly" />
                    <x-menu-item title="Edit" Link="/role/edit/' . e($record->id) . '"/>
                </x-dropdown>'))
            ->add('name', fn($record) => Blade::render('<p class="">' . $record->name . '</p>'))
            ->add('guard_name');
    }

    public function columns(): array
    {
        return [
            Column::make('Action', 'action')
                ->visibleInExport(false)
                ->bodyAttribute('text-center')
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),


            Column::make('Name', 'name')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),

            Column::make('guard name', 'guard_name')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-center', 'background-color:#A16A38; color:white;text-align:center;'),

        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('id', 'id')->placeholder('ID'),
            Filter::inputText('name', 'name')->placeholder('name'),
            Filter::inputText('guard_name', 'guard_name')->placeholder('guard name'),

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
