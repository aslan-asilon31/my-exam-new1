<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use App\Models\Asesmen;
use App\Models\Pertanyaan;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;



class KonfirmasiMulai extends Component
{

    public $title = 'Konfirmasi Mulai Asesmen' ;
    public $url = '/konfirmasi-mulai';

    #[\Livewire\Attributes\Locked]
    public string $id = '';

    public $asesmen =[];
    public $questionTimer;
    public $asesmenDurasi;
    public $questionTimers = [];


    public $questions = [];
    public $answers = [];
    public $examList = false;
    public $examQuestion = false;
    public $examStarted = false;
    public $examFinished = false;
    public $waktuAsesmen ;
    public $waktuAsesmenMulai;
    public $waktuSekarang;
    public $waktuAsesmenSelesai;
    public $waktuAsesmenAkhir;
    public $waktuAsesmenYangDihabiskan;


    public $indexJawaban = 0;
    public $pertanyaans;

    public $user = [];
    public $userId;
    public $userName;
    public $userEmail;

    public $pertanyaanId;


    public $waktuSoalSekarang ;
    public $waktuSoal ;
    public $waktuSoalSelesai ;
    public $waktuSoalBerjalan = 0;
    public $nomorSoal ;
    public $nomorSoalTerakhir ;

    #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')] 
    public $penggunaAsesmen;

    public function mount()
    {

        $this->userId = auth()->id();
        $this->user = User::where('id', auth()->id())->first()->toArray();
        $this->userName = auth()->user()->name;
        $this->userEmail = auth()->user()->email;


        \Carbon\Carbon::setLocale('id');
        $this->initialize($this->id);

    }

    public function initialize()
    {
        $this->asesmen = Asesmen::where('id', $this->id)->first();
        


        $this->asesmenDurasi = $this->asesmen['durasi'];
    }

    public function render()
    {

        return view('livewire.asesmen.konfirmasi-mulai')
        ->layout('components.layouts.app_visitor');
    }
}
