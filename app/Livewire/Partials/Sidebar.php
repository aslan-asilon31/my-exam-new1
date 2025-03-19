<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Asesmen;


class Sidebar extends Component
{

    public string $title = ''; 

    

   
    public function render()
    {
        return view('livewire.partials.sidebar')
        ->title($this->title);
    }

}
