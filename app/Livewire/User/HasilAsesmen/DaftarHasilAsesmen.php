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

    #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')] 
    public $penggunaAsesmen;

    public function mount()
    {
        \Carbon\Carbon::setLocale('id');

        $this->userId =$this->PenggunaAsesmen['pengguna_asesmen.user_id'] ?? auth()->id();

        $activePenggunaAsesmen = PenggunaAsesmen::with([
            'user',
            'asesmen',
            'detail_pengguna_asesmens',
            'asesmen.pertanyaans',
        ])
        ->where('pengguna_asesmens.pengguna_id', $this->userId)
        ->orderBy('tgl_dibuat', 'desc')
        ->first();

        if ($activePenggunaAsesmen) {
            $this->ActivePenggunaAsesmens = $activePenggunaAsesmen->toArray();
        } else {
            $this->ActivePenggunaAsesmens = []; 
            \Log::warning("No Pengguna Asesmen found for user ID: {$this->userId}");
        }

        $totalBobots = 0;
        $totalPoints = 0;

        if (isset($this->ActivePenggunaAsesmens['asesmen']['pertanyaans']) && isset($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'])) {
            $totalBobots = array_sum(array_column($this->ActivePenggunaAsesmens['asesmen']['pertanyaans'], 'bobot'));

            $totalPoints = array_sum(array_column($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'], 'poin'));
        }

        if ($totalBobots > 0) {
            $this->countHasilAsesmen = ceil(($totalPoints / $totalBobots) * 100);
        } else {
            $this->countHasilAsesmen = 0; 
        }

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
            ->where('pengguna_asesmens.pengguna_id', auth()->id())
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
