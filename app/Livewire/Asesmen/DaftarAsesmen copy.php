<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use App\Models\Asesmen;
use App\Models\Pertanyaan;
use App\Models\User;
use App\Models\PenggunaAsesmen;




class DaftarAsesmen extends Component
{
    use Toast;

    public $asesmens = [];
    public $title = 'Daftar Asesmen ' ;
    public $url = '/daftar-asesmen';

    public $asesmen_id;
    public $apakahSudahIkutAsesmen;
    public $asesmenDurasi = 0;

    public $questionTimer;
    public $questionTimers = [];

    #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')] 
    public $penggunaAsesmen;

    #[\Livewire\Attributes\Locked]
    public string $id = '';

    public $userId;
    public $user;
    public $userName;
    public $userEmail;
    public $cekPertanyaan;


    public function startTest()
    {
        return redirect()->route('Test');
        $this->dispatch('test-started');
    }

    public function mount()
    {
        $this->penggunaAsesmen = [];
        $this->userId = auth()->id();
        $user = User::where('id', auth()->id())->first();
        $this->user = $user ? $user->toArray() : null;
        
        $this->initialize();

    }

    public function initialize()
    {

        $this->asesmens = Asesmen::has('pertanyaans')->where('apa_aktif', true)->get()->toArray();
        
        if (!empty($this->asesmens)) {
            $durasi = array_column($this->asesmens, 'durasi'); 
            $this->asesmenDurasi = !empty($durasi) ? $durasi[0] : null; 
        } else {
            $this->asesmenDurasi = null;  
        }

        foreach ($this->asesmens as $asesmen) {

            $tglMulai = \Carbon\Carbon::parse($asesmen['tgl_mulai']);
            $tglSelesai = \Carbon\Carbon::parse($asesmen['tgl_selesai']);
            $durasi = $tglMulai->diff($tglSelesai);
            $this->asesmenDurasi = $durasi->format('%h jam %i menit %s detik');

        }




        $this->penggunaAsesmen['pengguna_asesmen.asesmen_id'] = $asesmen['id'];
        $this->penggunaAsesmen['pengguna_asesmen.tgl_mulai'] = $asesmen['tgl_mulai'];
        $this->penggunaAsesmen['pengguna_asesmen.tgl_selesai'] = $asesmen['tgl_selesai'];
        $this->penggunaAsesmen['pengguna_asesmen.asesmen_durasi'] = $asesmen['durasi'];

        $this->apakahSudahIkutAsesmen = PenggunaAsesmen::where('pengguna_id', auth()->id())->get(); 

    }

    public function apakahSudahIkutAsesmen()
    {
        return PenggunaAsesmen::where('pengguna_id', auth()->id())->first()->toArray();
    }


    public function render()
    {

        return view('livewire.asesmen.daftar-asesmen')
        ->layout('components.layouts.app_visitor')
        ->title($this->title);
    }
}
