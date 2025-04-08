<?php

namespace App\Livewire\User\DasborUser;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\PenggunaAsesmen;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DasborUser extends Component
{
    use Toast;

    public $user_role ;
    public $title = 'Dashboard' ;
    public $url = '/dasbor-user';
    public $jumlahAsesmenYangPernahDiikuti;
    public $userId;


    public function mount()
    {
        $user = Auth::user();
        $this->user_role = $user->getRoleNames()->first();

        $this->userId = session()->get('soal-sesi.userId') ??  auth()->id() ;

        $this->jumlahAsesmenYangPernahDiikuti = PenggunaAsesmen::with([
            'user',
            'asesmen',
            'detail_pengguna_asesmens',
            'asesmen.pertanyaans',
          ])
          ->where('pengguna_asesmens.pengguna_id', $this->userId)
          ->orderBy('tgl_dibuat', 'desc')
          ->get()
          ->toArray();

    }



    public function render()
    {
        return view('livewire.user.dasbor-user.dasbor-user')
        ->title($this->title);

    }
}

