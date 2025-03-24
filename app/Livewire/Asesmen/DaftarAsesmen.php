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
    public $asesmenDurasi = 0;

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

    #[Title('Daftar Assesment ')]
    public function render()
    {
        return view('livewire.asesmen.daftar-asesmen')
        ->layout('components.layouts.app_visitor');
    }
}
