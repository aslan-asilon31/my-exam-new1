<?php

namespace App\Livewire\User\DasborUser;

use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DasborUser extends Component
{
    use Toast;

    public $user_role ;
    public $title = 'Dashboard' ;
    public $url = '/dasbor-user';


    public function mount()
    {
        $user = Auth::user();
        $this->user_role = $user->getRoleNames()->first();
    }



    public function render()
    {
        return view('livewire.user.dasbor-user.dasbor-user')
        ->title($this->title);

    }
}

