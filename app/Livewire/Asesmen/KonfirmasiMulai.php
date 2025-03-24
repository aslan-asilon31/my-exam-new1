<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use App\Models\Asesmen;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class KonfirmasiMulai extends Component
{

    #[\Livewire\Attributes\Locked]
    public string $id = '';

    public $asesmen =[];
    public $assesmentList = false;
    public $assesmentQuestion = false;
    public $assesmentStarted = false;
    public $assesmentFinished = false;
    public $questionTimer;
    public $asesmenDurasi;
    public $questionTimers = [];

    public function mount()
    {
        $this->initialize($this->id);
    }

    public function initialize($asesmenId)
    {
        $this->id = $asesmenId;
        $this->asesmen = Asesmen::where('id', $this->id)->firstOrFail()->toArray();
        $this->asesmenDurasi = $this->asesmen['durasi'];
    }
    
    // #[Layout('components.layouts.app_visitor')]
    #[Title('Konfirmasi Start')] 
    public function render()
    {

        return view('livewire.asesmen.konfirmasi-mulai')
        ->layout('components.layouts.app_visitor');
    }
}
