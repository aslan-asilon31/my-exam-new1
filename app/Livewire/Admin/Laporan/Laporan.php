<?php

namespace App\Livewire\Admin\Laporan;

use Livewire\Component;
use Livewire\Attributes\Title;

class Laporan extends Component
{
    protected $title = 'Laporan Asesmen';
    public string $url = '/laporan';


    public function render()
    {
        return view('livewire.admin.laporan.laporan');
    }
}
