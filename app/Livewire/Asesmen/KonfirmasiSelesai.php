<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Pertanyaan;
use App\Models\User;
use App\Models\PenggunaAsesmen;
use App\Models\DetailPenggunaAsesmen;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\DB;

class KonfirmasiSelesai extends Component
{
    use Toast;

    public $title = 'Konfirmasi Selesai ';
    public $url = '/konfirmasi-selesai';
    public $jawaban = [];


    public $questions = [];
    public $asesmen =[];
    public $asesmen_id;
    public $pertanyaan_id;
    public $answers = [];
    public $examList = false;
    public $examQuestion = false;
    public $examStarted = false;
    public $examFinished = false;
    public $waktuAsesmen ;
    public $waktuAsesmenMulai;
    public $waktuSekarang;
    public $waktuAsesmenSelesai;
    public $waktuAsesmenYangDihabiskan;

    public $questionTimer = 10;
    public $questionTimers = [];

    public $indexJawaban = 0;
    public $pertanyaans;
    public $userId;
    public $asesmenDurasi = 0 ;
    public $pertanyaanId;
    public $hitungPertanyaan = [];


    public $waktuSoalSekarang ;
    public $waktuSoalMulai ;
    public $waktuSoal ;
    public $waktuSoalSelesai ;
    public $waktuSoalBerjalan = 0;
    public $nomorSoal ;
    public $nomorSoalTerakhir ;
    public $userName ;
    public $userEmail ;


    public $nomorSoalTerakhirHasil ;

    #[\Livewire\Attributes\Locked]
    public string $id = '';

    #[\Livewire\Attributes\Locked]
    public $tampungNilai;


    #[\Livewire\Attributes\Session(key: 'detailPenggunaAsesmen')] 
    public $detailPenggunaAsesmen;


    #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')] 
    public $penggunaAsesmen;



    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->waktuAsesmenYangDihabiskan = session('soal-sesi.waktuAsesmenYangDihabiskan');

        $totalDetik = intval(abs($this->waktuAsesmenYangDihabiskan));
        $jam = floor($totalDetik / 3600);
        $menit = floor(($totalDetik % 3600) / 60);
        $detik = $totalDetik % 60;

        $this->waktuAsesmenYangDihabiskan = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);

    }

    public function simpanJawaban()
    {

        return $this->redirect('/dasbor-user', navigate: true);
             
    }

    public function clearSession()
    {
        Session::forget('soal-sesi.' . $this->userId);
    }

    public function render()
    {

        return view('livewire.asesmen.konfirmasi-selesai')
        ->layout('components.layouts.app_visitor')
        ->title($this->title);
    }
}
