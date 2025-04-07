<?php

namespace App\Livewire\User\HasilAsesmen;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Pengguna;
use App\Models\Asesmen;
use App\Models\PenggunaAsesmen;
use App\Models\DetailPenggunaAsesmen;
use Illuminate\Support\Facades\DB;

class DaftarHasilAsesmen extends Component
{
    public $title = 'hasil asesmens';
    public $url = '/hasil-asesmen';
    public $ActivePenggunaAsesmens;
    public $userId;

    public function mount()
    {
        $this->userId = session()->get('soal-sesi.userId') ??  auth()->id() ;

        $this->ActivePenggunaAsesmens = PenggunaAsesmen::with([
            'user',
            'asesmen',
            'detail_pengguna_asesmens',
            'asesmen.pertanyaans',
      
          ])
          ->where('pengguna_asesmens.pengguna_id', $this->userId) 
          ->orderBy('tgl_dibuat', 'desc')
          ->firstOrFail()
          ->toArray();

        //   dd($this->ActivePenggunaAsesmens);
        //   dd($this->ActivePenggunaAsesmens['asesmen']['pertanyaans']);
          $totalBobots = array_sum(array_column($this->ActivePenggunaAsesmens['asesmen']['pertanyaans'], 'bobot'));
          $totalPoints = array_sum(array_column($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'], 'poin'));
        dd(($totalPoints/$totalBobots)*100);

        // $this->asesmens = Asesmen::where('apa_aktif', true)->get();

        


    }

    public function render()
    {
        return view('livewire.user.hasil-asesmen.daftar-hasil-asesmen')
        ->title($this->title);

    }
}
