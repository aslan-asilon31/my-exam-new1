<?php

namespace App\Livewire\Admin\Dasbor;

use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;


class Dasbor extends Component
{
    use Toast;

    protected $url = '/dasbor';
    protected $title = 'Dashboard';

    public function mount()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        $this->user_role = $user->getRoleNames(); // Ini akan menjadi koleksi dari role names.
    }

    public function render()
    {
        return view('livewire.admin.dasbor.dasbor')
        ->title($this->title);

    }
}

