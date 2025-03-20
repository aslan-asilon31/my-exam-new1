<?php

namespace App\Livewire\Admin\LaporanAsesmen;

use Livewire\Component;
use Livewire\Attributes\Title;

class DaftarLaporanAsesmen extends Component
{
    protected $title = 'asesmens';
    public string $url = '/asesmen';


    #[Title('Daftar Hasil Asesmens')] 
    public function render()
    {
        return view('livewire.admin.asesmen.daftar-hasil-asesmen');
    }
}
