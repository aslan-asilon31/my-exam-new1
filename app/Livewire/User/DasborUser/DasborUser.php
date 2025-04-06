<?php

namespace App\Livewire\User\DasborUser;

use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DasborUser extends Component
{
    use Toast;

    public string $search = '';
    public $user_role ;

    protected $url = '/dasbor-user';


    public bool $drawer = false;

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public function mount()
    {
        $user = Auth::user();

        $this->user_role = $user->getRoleNames(); // Ini akan menjadi koleksi dari role names.
    }



    public function render()
    {
        return view('livewire.user.dasbor-user.dasbor-user')
        ->title($this->title);

    }
}

