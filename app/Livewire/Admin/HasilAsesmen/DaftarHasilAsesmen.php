<?php

namespace App\Livewire\Admin\HasilAsesmen;

use Livewire\Component;
use Livewire\Attributes\Title;

class DaftarHasilAsesmen extends Component
{
    protected $title = 'asesmens';
    public string $url = '/asesmen';


    #[Title('Daftar Hasil Asesmens')] 
    public function render()
    {
        return view('livewire.admin.hasil-asesmen.daftar-hasil-asesmen');
    }
}
