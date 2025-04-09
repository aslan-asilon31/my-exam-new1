<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use App\Models\Asesmen;
use App\Models\Pengguna;
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
    public $hitungPertanyaan = [];


    public $waktuSoalSekarang ;
    public $waktuSoalMulai ;
    public $waktuSoal ;
    public $waktuSoalSelesai ;
    public $waktuSoalBerjalan = 0;
    public $nomorSoal ;
    public $nomorSoalTerakhir ;
    public $nomorSoalTerakhirHasil ;


    public function mount()
    {
        // session()->flush();
        // session()->forget('soal-sesi.userId');
        // session()->forget('soal-sesi.asesmenId');
        // session()->forget('soal-sesi.pertanyaanId');
        // session()->forget('soal-sesi.waktuAsesmenMulai');


        // Session::forget('soal-sesi');
        // Session::forget('soal-sesi');
        // Session::forget('waktuSoalSekarang');
        // Session::forget('waktuSoal');
        // Session::forget('waktuSoalSelesai');
        // Session::forget('waktuSoalBerjalan');
        // dd(Session());

        $this->userId = session()->get('soal-sesi.userId');
        $this->user = User::where('id', session()->get('soal-sesi.user_id')  ?? auth()->id())->first()->toArray();
        $this->userName = session()->get('soal-sesi.user_name');
        $this->userEmail = session()->get('soal-sesi.user_email');


        \Carbon\Carbon::setLocale('id');
        $this->initialize($this->id);
    }

    public function initialize()
    {

        $this->asesmen = Asesmen::where('id', $this->id)->first()->toArray();
        $this->asesmenDurasi = $this->asesmen['durasi'];

        $tglMulai = \Carbon\Carbon::parse($this->asesmen['tgl_mulai']);
        $tglSelesai = \Carbon\Carbon::parse($this->asesmen['tgl_selesai']);

        // Menyimpan hasil perhitungan ke dalam variabel untuk digunakan di view
        $durasi = $tglMulai->diff($tglSelesai);
        $this->asesmenDurasi =  $durasi->format('%h jam %i menit %s detik');

        session()->put('soal-sesi',[
            'asesmen_id' => $this->asesmen['id'],
            'waktuAsesmen' => $this->asesmenDurasi,
        ]);

    }

    public function render()
    {

        return view('livewire.asesmen.konfirmasi-mulai')
        ->layout('components.layouts.app_visitor');
    }
}
