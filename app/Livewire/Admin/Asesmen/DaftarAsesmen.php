<?php

namespace App\Livewire\Admin\Asesmen;

use Livewire\Component;
use Livewire\Attributes\Title;

class DaftarAsesmen extends Component
{
    protected $title = 'asesmens';
    protected $url = 'url';

    #[Title('asesmens')] 
    public function render()
    {
        return view('livewire.admin.asesmen.daftar-asesmen');
    }
}
