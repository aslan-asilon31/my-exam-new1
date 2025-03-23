<?php

namespace App\Livewire\Admin\LaporanAsesmen;

use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;

class DaftarLaporanAsesmen extends Component
{
    protected $title = 'asesmens';
    public string $url = '/asesmen';


    public function mount()
    {
        if (!auth()->pengguna()->can('lihat pertanyaan')) {
            abort(403, 'Unauthorized action.');
        }
    }

    #[Title('Daftar Hasil Asesmens')]
    public function render()
    {
        return view('livewire.admin.asesmen.daftar-hasil-asesmen');
    }
}
