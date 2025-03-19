<?php

namespace App\Livewire\Admin\Pertanyaan\Komponen;

use App\Helpers\Table\Traits\WithTable;
use App\Models\Pertanyaan;
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

final class TabelPertanyaan extends PowerGridComponent
{
    public string $tableName = 'asesmens';
    public string $sortField = 'tgl_dibuat';
    public string $sortDirection = 'desc';
    public string $url = '/pertanyaan';

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
        return Pertanyaan::query()
            ->join('asesmens', 'asesmens.id', 'pertanyaans.asesmen_id')
            ->select([
                'pertanyaans.id',
                'pertanyaans.asesmen_id',
                'pertanyaans.pertanyaan',
                'pertanyaans.jenis',
                'pertanyaans.durasi',
                'pertanyaans.bobot',
                'pertanyaans.dibuat_oleh',
                'pertanyaans.diupdate_oleh',
                'pertanyaans.tgl_dibuat',
                'pertanyaans.tgl_diupdate',
                'pertanyaans.no_urut',
                'pertanyaans.apa_aktif',
            ]);
    }

    public function relationSearch(): array
    {
        return [
            // 'asesmen' => [
            //     'pertanyaan',
            // ],
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
            ->add('asesmen_id', fn($record) => $record->asesmen_id)
            ->add('pertanyaan')
            ->add('jenis')
            ->add('durasi')
            ->add('bobot')
            ->add('dibuat_oleh')
            ->add('diupdate_oleh')
            ->add('tgl_dibuat')
            ->add('tgl_diupdate')
            ->add('no_urut')
            ->add('apa_aktif');
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

            Column::make('ID Asesmen', 'asesmen_id')
                ->sortable(),

            Column::make('Pertanyaan', 'pertanyaan')
                ->sortable()
                ->searchable(),

            Column::make('Jenis', 'jenis')
                ->sortable(),

            Column::make('Durasi', 'durasi')
                ->sortable(),
            Column::make('Bobot', 'bobot')
                ->sortable(),
            Column::make('Dibuat_oleh', 'dibuat_oleh')
                ->sortable(),
            Column::make('Diupdate oleh', 'diupdate_oleh')
                ->sortable(),

            Column::make('Tgl dibuat', 'tgl_dibuat')
                ->sortable(),

            Column::make('Tql diupdate', 'tgl_diupdate')
                ->sortable(),

            Column::make('No Urut', 'no_urut')
                ->sortable(),

            Column::make('Apakah Aktif', 'apa_aktif')
                ->sortable(),

        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('id', 'id')->placeholder('ID'),
            Filter::inputText('asesmen_id', 'asesmen_id')->placeholder('ID Asesmen'),
            Filter::inputText('pertanyaan', 'pertanyaan')->placeholder('Pertanyaan'),
            Filter::inputText('jenis', 'jenis')->placeholder('Jenis'),
            Filter::inputText('durasi', 'durasi')->placeholder('Durasi'),
            Filter::inputText('bobot', 'bobot')->placeholder('Bobot'),
            Filter::inputText('dibuat_oleh', 'dibuat_oleh')->placeholder('Dibuat oleh'),
            Filter::inputText('diupdate_oleh', 'diupdate_oleh')->placeholder('Diupdate oleh'),
            Filter::datetimepicker('tgl_dibuat', 'tgl_dibuat')
                ->params(['timezone' => 'Asia/Jakarta']),
            Filter::datetimepicker('tgl_diupdate', 'tgl_diupdate')
                ->params(['timezone' => 'Asia/Jakarta']),
         
            Filter::inputText('no_urut', 'no_urut')->placeholder('No Urut'),
            Filter::inputText('apa_aktif', 'apa_aktif')->placeholder('Apakah Aktif'),
        

    
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
