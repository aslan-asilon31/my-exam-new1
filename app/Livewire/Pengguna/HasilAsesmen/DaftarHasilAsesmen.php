<?php

namespace App\Livewire\Pengguna\HasilAsesmen;

use Livewire\Component;
use Livewire\Attributes\Title;

class DaftarHasilAsesmen extends Component
{
    protected $title = 'asesmens';
    public string $url = '/asesmen';


    #[Title('Daftar Hasil Asesmen')] 
    public function render()
    {
        return view('livewire.pengguna.hasil-asesmen.daftar-hasil-asesmen');
    }
}
