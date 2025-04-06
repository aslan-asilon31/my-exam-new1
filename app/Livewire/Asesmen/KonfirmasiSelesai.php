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


class KonfirmasiSelesai extends Component
{
    use Toast;

    public $title = 'Konfirmasi Selesai ';
    public $url = '/konfirmasi-selesai';
    public $jawaban = [];
    public $detailPenggunaAsesmen = [];


    public $questions = [];
    public $asesmen =[];
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

    public function mount()
    {
        $this->userId = session()->get('soal-sesi.userId');
        $this->user = User::where('id', session()->get('soal-sesi.user_id'))->firstOrFail()->toArray();
        $this->userName = session()->get('soal-sesi.user_name');
        $this->userEmail = session()->get('soal-sesi.user_email');

        $this->initialize();

    }

    public function initialize()
    {

        $this->waktuAsesmenYangDihabiskan = session('soal-sesi.waktuAsesmenYangDihabiskan');

        $this->userName = session('soal-sesi.user_name');
        $this->userEmail = session('soal-sesi.user_email');

        $totalDetik = intval(abs($this->waktuAsesmenYangDihabiskan));
        $jam = floor($totalDetik / 3600);
        $menit = floor(($totalDetik % 3600) / 60);
        $detik = $totalDetik % 60;

        $this->waktuAsesmenYangDihabiskan = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);


    }

    public function simpanJawaban()
    {

        $jawabanData = Session::get('soal-session');

        $penggunaAsesmen = PenggunaAsesmen::create([
            'pengguna_id' => 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740', // Ambil user ID dari auth
            'asesmen_id' => $jawabanData[0]['asesmen_id'], // Pastikan Anda memiliki asesmen_id yang sesuai
            'pertanyaan_id' => $jawabanData[0]['pertanyaan_id'], // Ambil pertanyaan_id dari jawaban
            'tgl_mulai' => now(),
            'tgl_selesai' => now(),
        ]);

        $detailPenggunaAsesmen = [];
        foreach ($jawabanData as $jawaban) {
            $detailPenggunaAsesmen[] = [
                'id' => (string) Str::uuid(),
                'pengguna_asesmen_id' =>  $penggunaAsesmen->id, // Pastikan Anda memiliki asesmen_id yang sesuai
                'pertanyaan_id' => (string) $jawaban['pertanyaan_id'], // Ambil pertanyaan_id dari jawaban
                'jawaban' => $jawaban['jawaban'], // Ambil jawaban dari jawaban
                'poin' => 0,
            ];
        }

        DetailPenggunaAsesmen::insert($detailPenggunaAsesmen);

        Session::forget('soal-session');

        $this->toast(
            type: 'success',
            title: 'Success',
            description: "Jawaban berhasil disimpan.",
            position: 'toast-top toast-end',
            icon: 'o-information-circle',
            css: 'alert-info',
            timeout: 3000,
            redirectTo: null
        );

        $this->redirect('/daftar-asesmen', navigate: true);

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
