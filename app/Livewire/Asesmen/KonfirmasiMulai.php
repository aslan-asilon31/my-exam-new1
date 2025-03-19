<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use App\Models\Asesmen;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class KonfirmasiMulai extends Component
{


    #[\Livewire\Attributes\Locked]
    public string $id = '';


    public $asesmen =[];
    public $assesmentList = false;
    public $assesmentQuestion = false;
    public $assesmentStarted = false;
    public $assesmentFinished = false;
    public $asesmenDurasi;
    public $questionTimer;
    public $questionTimers = [];

    public function mount()
    {

        $this->initialize($this->id);
        }

    #[On('asesment-durasi-id')] 
    public function initialize($asesmenId)
    {
        $this->id = $asesmenId;
        $this->asesmen = Asesmen::where('id', $this->id)->firstOrFail()->toArray();
        $this->asesmenDurasi = $this->asesmen['durasi'];
        // $this->asesmens = Asesmen::where('apa_aktif', true)->get();
    }

    
    // #[Layout('components.layouts.app_visitor')]
    #[Title('Konfirmasi Start')] 
    public function render()
    {

        return view('livewire.asesmen.konfirmasi-mulai')
        ->layout('components.layouts.app_visitor');
    }
}
