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

    
    #[\Livewire\Attributes\Session] 
    public $detailPenggunaAsesmen = [];

    #[\Livewire\Attributes\Session] 
    public $indexDetailPenggunaAsesmen = 0;


    public function mount()
    {
        // session()->flush();
        dump(Session(), $this->detailPenggunaAsesmen);
        $this->userId = session()->get('soal-sesi.user_id');
        $this->userName = session()->get('soal-sesi.user_name');
        $this->userEmail = session()->get('soal-sesi.user_email');

        $this->initialize();

    }

    public function initialize()
    {
        $this->waktuAsesmenYangDihabiskan = session('soal-sesi.waktuAsesmenYangDihabiskan');

        $this->asesmen_id = session()->get('soal-sesi.asesmen_id');
        $this->userId = session()->get('soal-sesi.user_id');
        $this->userName = session()->get('soal-sesi.user_name');
        $this->userEmail = session()->get('soal-sesi.user_email');

        $totalDetik = intval(abs($this->waktuAsesmenYangDihabiskan));
        $jam = floor($totalDetik / 3600);
        $menit = floor(($totalDetik % 3600) / 60);
        $detik = $totalDetik % 60;

        $this->waktuAsesmenYangDihabiskan = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);


    }

    public function simpanJawaban()
    {

        $jawabanData = Session::get('soal-sesi');
        if ($jawabanData && isset($jawabanData['soal']) && is_array($jawabanData['soal'])) {
            $dataPenggunaAsesmen = [];

            foreach ($jawabanData['soal'] as $soal) {
                $pertanyaanId = $soal['pertanyaan_id'];
                $jawabanSoal = $soal['jawaban'];
                if (isset($soal['pertanyaan_id'])) {
                    $dataPenggunaAsesmen[] = [
                        'id' => (string) Str::uuid(),
                        'pengguna_id' => $this->userId ?? auth()->id(),
                        'asesmen_id' => $this->asesmen_id,
                        'tgl_selesai' => now(),
                    ];
                }
            }

            if (!empty($dataPenggunaAsesmen)) {

                DB::table('pengguna_asesmens')->insert($dataPenggunaAsesmen);

                // Retrieve all newly created ids (assuming 'created_at' is set correctly)
                $newIds = DB::table('pengguna_asesmens')
                    ->whereIn('id', array_column($dataPenggunaAsesmen, 'id')) // Use UUIDs from your data
                    ->pluck('id'); 

                // $penggunaNewAsesmenId[] = PenggunaAsesmen::insertGetId($dataPenggunaAsesmen);
            } else {
            }
        } else {
        }

        $detailPenggunaAsesmen = [];
        foreach ($jawabanData as $jawaban) {
            $detailPenggunaAsesmen[] = [
                'id' => (string) Str::uuid(),
                'pengguna_asesmen_id' =>  $newIds[0], 
                'pertanyaan_id' => $pertanyaanId,
                'jawaban' => $jawabanSoal, 
                'poin' => 0,
            ];
        }

        DetailPenggunaAsesmen::insert($detailPenggunaAsesmen);

        Session::forget('soal-sesi');

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

//     public function simpanJawaban()
// {
//     $jawabanData = Session::get('soal-sesi');

//     // Validasi waktu
//     if ($jawabanData['waktuSoalBerjalan'] < 0) {
//         $jawabanData['waktuSoalBerjalan'] = 0;
//     }
//     if ($jawabanData['waktuAsesmenYangDihabiskan'] < 0) {
//         $jawabanData['waktuAsesmenYangDihabiskan'] = 0;
//     }

//     // Simpan data asesmen utama
//     $penggunaAsesmen = PenggunaAsesmen::create([
//         'pengguna_id' => $this->userId, 
//         'asesmen_id' => $this->asesmen_id, 
//         'tgl_mulai' => now(),
//         'tgl_selesai' => now(),
//         'waktu_asesmen' => $jawabanData['waktuAsesmenYangDihabiskan'],
//     ]);

//     // Iterasi melalui setiap jawaban soal
//     foreach ($jawabanData['soal'] as $soal) {
//         // Validasi waktu soal
//         if ($soal['waktuSoalYangDihabiskan'] < 0) {
//             $soal['waktuSoalYangDihabiskan'] = 0;
//         }

//         // Simpan setiap jawaban ke dalam tabel jawaban_asesmen atau tabel terkait
//         Pertanyaan::create([
//             'pengguna_asesmen_id' => $penggunaAsesmen->id,
//             'pertanyaan_id' => $soal['pertanyaan_id'],
//             'jawaban' => $soal['jawaban'],
//             'durasi_soal' => $soal['durasiSoal'],
//             'waktu_soal_sekarang' => $soal['waktuSoalSekarang'],
//             'waktu_soal_selesai' => $soal['waktuSoalSelesai'],
//             'waktu_soal_yang_dihabiskan' => $soal['waktuSoalYangDihabiskan'],
//             'nomor_soal' => $soal['nomorSoal'],
//         ]);
//     }
// }



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
