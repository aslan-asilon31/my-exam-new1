<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use App\Models\Asesmen;
use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use App\Models\Pertanyaan;


class SoalAsesmen extends Component
{
    use Toast;
    public $title = 'Soal Asesmen';
    public $url = '/soal-asesmen';

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
    public $waktuAsesmenBerhentiSebelumSelesai;
    public $waktuAsesmenYangDihabiskan;

    public $questionTimer = 10;
    public $questionTimers = [];

    public $indexJawaban = 0;
    public $pertanyaans  = [];
    public $userId;
    public $userName;
    public $userEmail;
    public $asesmenDurasi = 0 ;
    public $pertanyaanId;
    public $hitungPertanyaan = [];
    public $jawaban;


    public $waktuSoalSekarang ;
    public $waktuSoalMulai ;
    public $waktuSoal ;
    public $waktuSoalSelesai ;
    public $waktuSoalBerjalan = 0;
    public $nomorSoal ;
    public $nomorSoalTerakhir ;
    public $currentSoalNow ;
    public $currentSoalTime ;
    public $waktuSoalYangDihabiskan ;
    public $nomorSoalTerakhirHasil ;




    #[\Livewire\Attributes\Locked]
    public string $id = '';


    #[On('update-soal-terakhir')]
    public function updateSoalTerakhir()
    {
        $this->nomorSoal = $this->indexJawaban+1;
        session([

        ]);

    }

    #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')] 
    public $penggunaAsesmen;


    public function mount()
    {

        // dd(Session());
        // session()->forget('soal-sesi.soal');

        \Carbon\Carbon::setLocale('id');

        $this->waktuSoalSekarang = now();
        $this->userId = $this->PenggunaAsesmen['pengguna_asesmen.user_id'] ?? auth()->id();
        $this->userName = $this->PenggunaAsesmen['pengguna_asesmen.user_name'];
        $this->userEmail = $this->PenggunaAsesmen['pengguna_asesmen.user_email'];

        $this->pertanyaans = Pertanyaan::where('asesmen_id', $this->id)->get();

        $this->jawaban = array_fill(0, count($this->pertanyaans), '');

        $this->initialize();
        $this->initializeSoal();

    }


    public function initializeSoal()
    {
        if (Session::has('soal-sesi.soal')) {
            $soalState = Session::get('soal-sesi.soal');

            if (is_array($soalState) && count($soalState) >= 0) {
                $this->jawaban = [];
                    $this->indexJawaban = end($soalState)['nomor_soal'];
                    $this->waktuSoal = end($soalState)['durasi_soal'] ;
                    $this->jawaban[$this->indexJawaban] = end($soalState)['jawaban'] ?? '';

            } else {
                dd('Error: Session variable soal-sesi.soal is not an array or is empty.');
            }
        }else{
            Session::get('soal-sesi.soal',[]);
        }
    }

    public function initialize()
    {

        $this->asesmen = Asesmen::where('id', $this->id)->first()->toArray();
        $this->waktuAsesmen = $this->asesmen['durasi'];

        $jam = floor($this->waktuAsesmen / 3600); 
        $menit = floor(($this->waktuAsesmen % 3600) / 60); 
        $detik = $this->waktuAsesmen % 60; 

        $this->waktuAsesmenMulai = now();
        $this->waktuAsesmenSelesai = $this->waktuAsesmenMulai->copy()->addSeconds($this->waktuAsesmen); 

        if (!Session::has('soal-sesi.waktuAsesmen')) {
            Session::put('soal-sesi.waktuAsesmen', [
                'jam' => $jam,
                'menit' => $menit,
                'detik' => $detik,
            ]);
            Session::put('soal-sesi.waktuAsesmenMulai', $this->waktuAsesmenMulai->format('Y-m-d H:i:s'));
            Session::put('soal-sesi.waktuAsesmenSelesai', $this->waktuAsesmenSelesai->format('Y-m-d H:i:s'));
        }

        $this->waktuSoalSekarang = now();
        $this->waktuSoalMulai = 30;
        $this->waktuSoal = $this->pertanyaans[$this->indexJawaban]->durasi;


        $this->waktuSoalSelesai = $this->waktuSoalSekarang->copy()->addSeconds($this->waktuSoal); // Waktu selesai soal

        $this->asesmen = Asesmen::where('id', $this->id)->first()->toArray();
        $this->asesmenDurasi = $this->asesmen['durasi'];

    }


    #[On('durasi-soal-selesai')]
    public function durasiSoalSelesai($value)
    {
        if ($this->indexJawaban < count($this->pertanyaans) - 1 ) {
            $this->indexJawaban++;

            if (session()->get('soal-sesi.userId') === $this->userId) {
                session([
                    'soal-sesi.waktuSoalBerjalan' => $value,
                ]);
            }

            return;
        } else {
            $this->redirect('/konfirmasi-selesai', navigate: true);
            return;
        }
    }

    // #[On('durasi-soal-selesai')]
    // public function nextPage($value)
    // {
    //     $this->waktuSoalBerjalan =$value;
    //     if (session()->get('soal-sesi.userId') === $this->userId) {
    //         session([
    //             'soal-sesi.waktuSoalBerjalan' => $value,
    //         ]);
    //     }


    // }

    public function soalSelanjutnya()
    {
        $this->currentSoalNow = now();

        if (session()->get('soal-sesi.userId') === $this->userId) {
            session([
                'soal-sesi.waktuSoalBerjalan' => $this->waktuSoalBerjalan,
            ]);
        }

        $pertanyaanId = $this->pertanyaans[$this->indexJawaban]->id;

        $currentSoalTime = now();
        $elapsedSoalTime = $currentSoalTime->diffInSeconds($this->currentSoalNow); 

        $durasiSoal =  $this->pertanyaans[$this->indexJawaban]->durasi;
        // dd($durasiSoal,$this->pertanyaans[$this->indexJawaban]->durasi,$this->pertanyaans[$this->indexJawaban],$this->indexJawaban);
        
        $waktuSoalSekarang = now()->addSeconds(10);
        dd(now()->format('Y-m-d H:i:s'),now()->addSeconds(10)->format('Y-m-d H:i:s'));
        $waktuSoalSelesai =  $waktuSoalSekarang->addSeconds($durasiSoal);
        $sisaWaktuSoal = (int) round(now()->diffInSeconds( $this->pertanyaans[$this->indexJawaban]['waktu_soal_selesai']));
        dd($durasiSoal,$waktuSoalSekarang->format('Y-m-d H:i:s'),$waktuSoalSelesai->format('Y-m-d H:i:s'),$sisaWaktuSoal);
        session()->put('soal-sesi.soal.' . $this->indexJawaban, [
            'pertanyaan_id' => $pertanyaanId,
            'jawaban' => $this->jawaban[$this->indexJawaban] ?? "",
            'durasi_soal' => $durasiSoal,
            'waktu_soal_sekarang' => $waktuSoalSekarang->format('Y-m-d H:i:s'),
            // 'waktu_soal_sekarang' => $this->waktuSoalSekarang->format('Y-m-d H:i:s'),
            'waktu_soal_selesai' => $waktuSoalSelesai->format('Y-m-d H:i:s'),
            'sisa_waktu_soal' => $sisaWaktuSoal,
            'nomor_soal' => $this->indexJawaban+1,
        ]);

        if ($this->indexJawaban < count($this->pertanyaans) - 1) {

            $this->indexJawaban+1;
            $this->waktuSoal = $this->pertanyaans[$this->indexJawaban]->durasi;

        } else {
            $currentTime = now();
            $elapsedTime = $currentTime->diffInSeconds($this->waktuAsesmenMulai); // Hitung selisih waktu dalam detik

            if (isset($this->jawaban[$this->indexJawaban])) {
                session()->put('soal-sesi.soal.' . $this->indexJawaban, $this->jawaban[$this->indexJawaban]);
            }

            session()->put('soal-sesi.soal.' . $this->indexJawaban, [

                'pertanyaan_id' => $pertanyaanId,
                'jawaban' => $this->jawaban[$this->indexJawaban],
                'durasi_soal' => $this->waktuSoal,
                'waktu_soal_sekarang' => $this->waktuSoalSekarang->format('Y-m-d H:i:s'),
                'waktu_soal_selesai' => $this->waktuAsesmenSelesai->format('Y-m-d H:i:s'),
                'sisa_waktu_soal' => $elapsedSoalTime,
                'nomor_soal' => $this->indexJawaban+1,
            ]);

            $this->dispatch('update-soal-terakhir');
            Session::put('soal-sesi.waktuAsesmenYangDihabiskan', $elapsedTime);
            $this->nomorSoalTerakhirHasil = session('soal-sesi.nomorSoalTerakhir');

            $this->redirect('/konfirmasi-selesai', navigate: true);
        }
    }

    public function soalSebelumnya()
    {
        if ($this->indexJawaban > 0) {
            $this->indexJawaban--;
            if (Session::has('soal-sesi')) {
                $soalState = Session::get('soal-sesi');
                dd(Session());
                $this->waktuSoal = $soalState['soal'][$this->indexJawaban]['durasi_soal'];
                dd($this->waktuSoal);
                        
                if (isset($soalState[$this->indexJawaban])) {
                    $this->jawaban[$this->indexJawaban] = $soalState[$this->indexJawaban]['jawaban'] ?? '';
                }

            }
        }
    }

    public function confirmStartTest()
    {
        $this->testList = false;
        $this->testQuestion = false;
        $this->testStarted = true;
        $this->testFinished = false;
        $this->testTimer = 3600;

        $this->startTest();
    }

    public function startTest()
    {

        $this->testTimer = 3600;
        $this->testStarted = false;
        $this->testQuestion = true;
        $this->testList = false;
        $this->indexJawaban = 0;
        $this->testFinished = false;
        $this->questionTimers[$this->indexJawaban] = $this->questionTimer;
        $this->dispatch('start-timers');
    }

    #[On('assesmen-selesai')]
    public function finishTest($value)
    {
        session()->put('soal-sesi.nomorSoalTerakhir', $value);
        dd('finish', $value, session('soal-sesi.nomorSoalTerakhir'));
        dd(Session());
    }




    public function render()
    {
        return view('livewire.asesmen.halaman-soal-asesmen', [
            'currentQuestion' => $this->questions[$this->indexJawaban] ?? null, // Ambil soal berdasarkan indeks
        ])
        ->layout('components.layouts.app_visitor')
        ->title($this->title);
    }
}
