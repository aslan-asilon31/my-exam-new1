<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Asesmen;
use Illuminate\Support\Facades\Auth;


class Footer extends Component
{

    public string $title = '';

    public function render()
    {
        return view('livewire.partials.footer')
        ->title($this->title);
    }



}
