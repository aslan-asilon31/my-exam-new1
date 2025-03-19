<?php

namespace App\Livewire\Admin\Pertanyaan;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class DaftarPertanyaan extends Component
{

    public string $url = '/pertanyaan';

    #[Title('Pertanyaan')] 
    public function render()
    {
        return view('livewire.admin.pertanyaan.daftar-pertanyaan');
    }
}
