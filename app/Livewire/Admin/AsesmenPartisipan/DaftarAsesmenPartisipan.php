<?php

namespace App\Livewire\Admin\AsesmenPartisipan;

use Livewire\Component;
use Livewire\Attributes\Title;

class DaftarAsesmenPartisipan extends Component
{
    protected $title = 'asesmens';
    public string $url = '/asesmen';


    #[Title('asesmens')] 
    public function render()
    {
        return view('livewire.admin.asesmen.daftar-asesmen-partisipan');
    }
}
