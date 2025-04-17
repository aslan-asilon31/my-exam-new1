<?php

namespace App\Livewire\Admin\Pengguna;

use Livewire\Component;
use Livewire\Attributes\Title;

class DaftarPengguna extends Component
{
    public string $title = 'Pengguna';
    public string $url = '/pengguna';

    #[Title('Pengguna')] 
    public function render()
    {
        return view('livewire.admin.pengguna.daftar-pengguna')
        ->title($this->title);
    }
}
