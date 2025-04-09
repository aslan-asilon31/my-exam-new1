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
use App\Models\User;


class DaftarAsesmen extends Component
{
    use Toast;

    public $asesmens = [];
    public $title = 'Daftar Asesmen ' ;
    public $url = '/daftar-asesmen';

    public $asesmen_id;
    public $asesmenDurasi = 0;

    public $questionTimer;
    public $questionTimers = [];


    #[\Livewire\Attributes\Locked]
    public string $id = '';

    public $userId;
    public $user;
    public $userName;
    public $userEmail;


    public function startTest()
    {
        return redirect()->route('Test');
        $this->dispatch('test-started');
    }

    public function mount()
    {
        $this->userId = auth()->id();

        $user = User::where('id', session()->get('soal-sesi.user_id') ?? auth()->id())->first();
        $this->user = $user ? $user->toArray() : null;

        session()->put('soal-sesi.user_id', $this->user['id']);
        session()->put('soal-sesi.user_name' , $this->user['name']);
        session()->put('soal-sesi.user_email', $this->user['email']);

        $this->initialize();
    }

    public function initialize()
    {


        $this->asesmens = Asesmen::where('apa_aktif', true)->get();

        foreach ($this->asesmens as $asesmen) {
            $tglMulai = \Carbon\Carbon::parse($asesmen['tgl_mulai']);
            $tglSelesai = \Carbon\Carbon::parse($asesmen['tgl_selesai']);

            $durasi = $tglMulai->diff($tglSelesai);

            $asesmen->durasi = $durasi->format('%h jam %i menit %s detik');
        }

    }


    public function render()
    {
        return view('livewire.asesmen.daftar-asesmen')
        ->layout('components.layouts.app_visitor');
    }
}
