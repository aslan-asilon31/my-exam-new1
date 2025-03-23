<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use App\Models\Asesmen;

class DaftarAsesmen extends Component
{
    use Toast;

    public $asesmens = [];
    public $asesmen_id;


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
        $this->asesmens = Asesmen::where('apa_aktif', true)->get();

    }

    // public function passId($id)
    // {
    //     $this->id = $id;
    //     $this->asesmens = Asesmen::where('apa_aktif', true)->get();
    //     $this->dispatch('asesment-id', asesmenId: $this->id);

    // }

    #[Layout('components.layouts.app_visitor')]
    #[Title('Assesment List')]
    public function render()
    {
        return view('livewire.asesmen.daftar-asesmen');
    }
}
