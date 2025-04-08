<?php

namespace App\Livewire\Admin\Dasbor;

use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\PenggunaAsesmen;
use App\Models\Asesmen;

class Dasbor extends Component
{
    use Toast;
    public $user_role ;
    public $url = '/dasbor';
    public $title = 'Dashboard';
    public $totalPesertaAsesmen;
    public $totalSoalAsesmen;

    public function mount()
    {
        $user = Auth::user();
        $this->user_role = $user->getRoleNames()->first();

        $this->initialize();

    }

    public function initialize()
    {
        $this->totalPesertaAsesmen = PenggunaAsesmen::distinct('pengguna_id')->count('pengguna_id');
        $this->totalSoalAsesmen = Asesmen::count('id');
    }
    
    public function render()
    {
        return view('livewire.admin.dasbor.dasbor')
        ->title($this->title);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}

