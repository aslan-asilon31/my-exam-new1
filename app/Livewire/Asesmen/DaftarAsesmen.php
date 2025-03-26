<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use App\Models\Asesmen;
use App\Models\Pengguna;

class DaftarAsesmen extends Component
{
    use Toast;

    public $asesmens = [];
    public $asesmen_id;
    public $asesmenDurasi = 0;

    public $questionTimer;
    public $questionTimers = [];

    public $user = [];
    public $userId;
    public $userName;
    public $userEmail;

    #[\Livewire\Attributes\Locked]
    public string $id = '';


    public function startTest()
    {
        return redirect()->route('Test');
        $this->dispatch('test-started');
    }

    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->userId = auth()->id() ?? 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740';
        $this->user = Pengguna::where('id', $this->userId)->firstOrFail()->toArray();
        $this->userName = $this->user['nama'];
        $this->userEmail = $this->user['surel'];

        $this->asesmens = Asesmen::where('apa_aktif', true)->get();

        // Iterate over each assessment to calculate the duration
        foreach ($this->asesmens as $asesmen) {
            $tglMulai = \Carbon\Carbon::parse($asesmen['tgl_mulai']);
            $tglSelesai = \Carbon\Carbon::parse($asesmen['tgl_selesai']);
            
            // Calculate the duration
            $durasi = $tglMulai->diff($tglSelesai);
            
            // Store the duration in a new property of the asesmen object
            $asesmen->durasi = $durasi->format('%h jam %i menit %s detik');
        }

        

    }

    #[Title('Daftar Assesment ')]
    public function render()
    {
        return view('livewire.asesmen.daftar-asesmen')
        ->layout('components.layouts.app_visitor');
    }
}
