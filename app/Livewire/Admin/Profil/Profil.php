<?php

namespace App\Livewire\Admin\Profil;

use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Profil extends Component
{
    public $title = "Profil";
    public $url = "profil";
    public $user_role;



    public function mount()
    {
        $user = User::where('id',user()->id())->first();
        $user_login = Auth::user();

        $this->user_role = $user_login->getRoleNames()->first();

    }

    public function render()
    {
        return view('livewire.admin.profil.profil')->title($this->title);
    }
}
