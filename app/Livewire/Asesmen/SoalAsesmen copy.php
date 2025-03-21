<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On; 
use Mary\Traits\Toast;
use App\Models\Pertanyaan;


class SoalAsesmen extends Component
{
    use Toast;
    public string $title = 'Ujian '; 

    public $questions = [];
    public $answers = [];
    public $examList = false;
    public $examQuestion = false;
    public $examStarted = false;
    public $examFinished = false;
    public $examTimer = 3600; // 60 minutes in seconds
    public $questionTimer = 10; // 10 seconds per question
    public $questionTimers = [];

    public $currentQuestionIndex = 0;
    public $pertanyaans;
    public $userId;
    public $pertanyaanId;
    public $hitungPertanyaan = [];
    public $jawaban = [];
    public $lanjutkanSoal = false;
    public $waktuSoalHabis = false;


    #[\Livewire\Attributes\Locked]
    public string $id = '';

    public function mount()
    {
        // dd($this->currentQuestionIndex);
        // dd(Session());
        // Session::forget('jawaban');
        // Session::forget('soal-session');
        $this->initialize();
        $this->questionTimers = array_column($this->questions, 'timer');

        // // Initialize answers array
        // $this->answers = array_fill(0, count($this->questions), '');

        // // Initialize question timers
        // $this->questionTimers = array_fill(0, count($this->questions), $this->questionTimer);
    }


    
    // public function nextQuestion()
    // {
    //     if ($this->currentQuestionIndex < count($this->pertanyaans) - 1) {
    //         $this->currentQuestionIndex++;
    //     }
    // }

    // public function previousQuestion()
    // {
    //     if ($this->currentQuestionIndex > 0) {
    //         $this->currentQuestionIndex--;
    //     }
    // }

    #[On('jawaban-belum-diisi')]
    public function initialize()
    {
        $this->pertanyaans = Pertanyaan::where('asesmen_id', $this->id)->get();
        // Ambil jawaban dari session jika ada
        // if (Session::has('jawaban')) {
        //     $this->jawaban = Session::get('jawaban');
        // }

        $jawabanData = session('soal-session', []);

        // Pastikan untuk memeriksa apakah ada jawaban untuk currentQuestionIndex
        if (isset($jawabanData[$this->currentQuestionIndex])) {
            // Ambil jawaban sebagai string
            $this->jawaban[$this->currentQuestionIndex] = $jawabanData[$this->currentQuestionIndex]['jawaban'] ?? '';
            // dd($this->jawaban[$this->currentQuestionIndex]);
        } else {
            // Jika tidak ada jawaban, set ke string kosong
            $this->jawaban[$this->currentQuestionIndex] = '';
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
        $this->currentQuestionIndex = 0;
        $this->testFinished = false;
        $this->questionTimers[$this->currentQuestionIndex] = $this->questionTimer;
        $this->dispatch('start-timers');
    }



    public function examNow()
    {

        $this->testStarted = false;
        $this->testQuestion = true;
        $this->testList = false;
        $this->testFinished = false;
        $this->testTimer = 3600; 

        $this->questionTimers[$this->currentQuestionIndex] = $this->questionTimer;

        $this->dispatch('start-timers');
        return;
    }

    #[On('jawaban-belum-diisi')]
    public function jawabanBelumDiisi()
    {

        if ($this->currentQuestionIndex < count($this->pertanyaans) - 1 ) {
            $this->currentQuestionIndex++;
            return; 
    
        } else {
            $this->redirect('/konfirmasi-selesai', navigate: true);
            return;
        }


    }

    #[On('durasi-soal-selesai')]
    public function durasiSoalSelesai()
    {
        if ($this->currentQuestionIndex < count($this->pertanyaans) - 1 ) {
            $this->currentQuestionIndex++;

            return;
        } else {
            $this->redirect('/konfirmasi-selesai', navigate: true);
            return;
        }


    }

    
    public function nextQuestion()
    {
        // Check if the current answer is empty
        if (empty($this->jawaban[$this->currentQuestionIndex])) {
            $this->toast(
                type: 'error',
                title: 'Failed',
                description: "Silakan isi jawaban sebelum melanjutkan ke soal berikutnya",               
                position: 'toast-top toast-end',    
                icon: 'o-information-circle',      
                css: 'alert-info',                  
                timeout: 3000,                      
                redirectTo: null                    
            );
            $this->dispatch('jawaban-belum-diisi');
            return;
        }

        // Store the current question's answer in the session
        $userId = auth()->id() ?? 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740'; 
        $pertanyaanId = $this->pertanyaans[$this->currentQuestionIndex]->id; 
        
        session()->put('soal-session.' . $this->currentQuestionIndex, [
            'user_id' => $userId,
            'asesmen_id' => $this->id,
            'pertanyaan_id' => $pertanyaanId,
            'jawaban' => $this->jawaban[$this->currentQuestionIndex]
        ]);

        // Move to the next question if possible
        if ($this->currentQuestionIndex < count($this->pertanyaans) - 1) {
            $this->currentQuestionIndex++;
            $this->jawaban[$this->currentQuestionIndex] = session('soal-session.' . $this->currentQuestionIndex, '');

            // Dispatch event to start the timer with the new question's duration
            $this->dispatch('start-timers');
        } else {
            // Redirect to confirmation page if it's the last question
            $this->redirect('/konfirmasi-selesai', navigate: true);
        }
    }

    public function previousQuestion()
    {
        if ($this->currentQuestionIndex > 0) {
            $this->currentQuestionIndex--;
            $this->jawaban[$this->currentQuestionIndex] = session('soal-session.' . $this->currentQuestionIndex, '');
            $this->dispatch('start-timers'); // Dispatch event to reset the timer
        }
    }


    public function finishTest()
    {
        dd('finish');
        $this->testFinished = true;
        $this->testStarted = false;
    }

    public function render()
    {
        return view('livewire.asesmen.halaman-soal-asesmen')
        ->layout('components.layouts.app_visitor')
        ->title($this->title);
    }
}
