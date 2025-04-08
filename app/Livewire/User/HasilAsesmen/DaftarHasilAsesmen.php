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
    public $asesmens = [];
    public $countHasilAsesmen;
    public $durasi;
    public $asesmenYangPernahDiikuti;

    public function mount()
    {
      \Carbon\Carbon::setLocale('id');

        $this->userId = session()->get('soal-sesi.userId') ??  auth()->id() ;

        $this->ActivePenggunaAsesmens = PenggunaAsesmen::with([
            'user',
            'asesmen',
            'detail_pengguna_asesmens',
            'asesmen.pertanyaans',

          ])
          ->where('pengguna_asesmens.pengguna_id', $this->userId)
          ->orderBy('tgl_dibuat', 'desc')
          ->first()
          ->toArray();

          $totalBobots = array_sum(array_column($this->ActivePenggunaAsesmens['asesmen']['pertanyaans'], 'bobot'));
          $totalPoints = array_sum(array_column($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'], 'poin'));

          $this->countHasilAsesmen =  ceil(($totalPoints/$totalBobots)*100);


          $this->initialize();
        }
    
        public function initialize()
        {

          $this->asesmenYangPernahDiikuti = PenggunaAsesmen::with([
              'user',
              'asesmen',
              'detail_pengguna_asesmens',
              'asesmen.pertanyaans',
          ])
          ->where('pengguna_asesmens.pengguna_id', $this->userId)
          ->orderBy('tgl_dibuat', 'asc')
          ->get()
          ->toArray();

         
        }
    

    public function render()
    {
        return view('livewire.user.hasil-asesmen.daftar-hasil-asesmen')
        ->title($this->title);

    }
}
