<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Asesmen;
use Illuminate\Support\Facades\Auth;


class Sidebar extends Component
{

    public string $title = '';

    public function render()
    {
        return view('livewire.partials.sidebar')
        ->title($this->title);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

}
