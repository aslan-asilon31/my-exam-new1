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

    // public function mount()
    // {
    //   \Carbon\Carbon::setLocale('id');

    //     $this->userId = session()->get('soal-sesi.userId') ??  auth()->id() ;

    //     $this->ActivePenggunaAsesmens = PenggunaAsesmen::with([
    //         'user',
    //         'asesmen',
    //         'detail_pengguna_asesmens',
    //         'asesmen.pertanyaans',

    //       ])
    //       ->where('pengguna_asesmens.pengguna_id', $this->userId)
    //       ->orderBy('tgl_dibuat', 'desc')
    //       ->first()toArray();

    //       $totalBobots = array_sum(array_column($this->ActivePenggunaAsesmens['asesmen']['pertanyaans'], 'bobot'));
    //       $totalPoints = array_sum(array_column($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'], 'poin'));

    //       $this->countHasilAsesmen =  ceil(($totalPoints/$totalBobots)*100);


    //       $this->initialize();
    //   }

    public function mount()
{
    \Carbon\Carbon::setLocale('id');

    // Retrieve user ID from session or authentication
    $this->userId = session()->get('soal-sesi.userId') ?? auth()->id();

    // Fetch the active PenggunaAsesmen record
    $activePenggunaAsesmen = PenggunaAsesmen::with([
        'user',
        'asesmen',
        'detail_pengguna_asesmens',
        'asesmen.pertanyaans',
    ])
    ->where('pengguna_asesmens.pengguna_id', $this->userId)
    ->orderBy('tgl_dibuat', 'desc')
    ->first();

    // Check if the result is not null and convert to array
    if ($activePenggunaAsesmen) {
        $this->ActivePenggunaAsesmens = $activePenggunaAsesmen->toArray();
    } else {
        // Handle the case where no results were found
        $this->ActivePenggunaAsesmens = []; // Set to an empty array or a default value
        // Optionally log or debug information here
        \Log::warning("No Pengguna Asesmen found for user ID: {$this->userId}");
    }

    // Initialize totals to zero
    $totalBobots = 0;
    $totalPoints = 0;

    // Check if the necessary keys exist in the array
    if (isset($this->ActivePenggunaAsesmens['asesmen']['pertanyaans']) && isset($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'])) {
        // Calculate total bobots
        $totalBobots = array_sum(array_column($this->ActivePenggunaAsesmens['asesmen']['pertanyaans'], 'bobot'));

        // Calculate total points
        $totalPoints = array_sum(array_column($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'], 'poin'));
    }

    // Calculate countHasilAsesmen safely
    if ($totalBobots > 0) {
        $this->countHasilAsesmen = ceil(($totalPoints / $totalBobots) * 100);
    } else {
        $this->countHasilAsesmen = 0; // Handle division by zero
    }

    // Debugging
    // dd($this->userId, $this->ActivePenggunaAsesmens, $totalBobots, $totalPoints, $this->countHasilAsesmen);
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
