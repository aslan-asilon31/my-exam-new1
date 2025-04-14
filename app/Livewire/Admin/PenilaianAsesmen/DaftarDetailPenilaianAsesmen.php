<?php

namespace App\Livewire\Admin\PenilaianAsesmen;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use App\Models\Asesmen;
use App\Models\Pengguna;
use App\Models\User;
use App\Models\PenggunaAsesmen;


class DaftarDetailPenilaianAsesmen extends Component
{
    protected $title = 'asesmens';
    public string $url = '/asesmen';

    use Toast;

    public $asesmens = [];

    public $asesmen_id;
    public $apakahSudahIkutAsesmen;
    public $asesmenDurasi = 0;

    public $ActivePenggunaAsesmens= [];

    public $questionTimer;
    public $questionTimers = [];

    #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')]
    public $penggunaAsesmen;

    #[\Livewire\Attributes\Locked]
    public string $id = '';

    public $userId;
    public $user;
    public $userName;
    public $userEmail;


    public function mount()
    {
        $this->penggunaAsesmen = [];
        $this->userId = auth()->id();
        $user = User::where('id', auth()->id())->first();
        $this->user = $user ? $user->toArray() : null;

        $this->initialize();
    }

    public function initialize()
    {

        \Carbon\Carbon::setLocale('id');

        $this->userId = auth()->id() ?? 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740';
        $user = User::where('id', $this->PenggunaAsesmen['pengguna_asesmen.user_id']  ?? auth()->id())->first();
        $this->user = $user ? $user->toArray() : null;
        $this->userName = $this->user['name'];
        $this->userEmail = $this->user['email'];

        $this->ActivePenggunaAsesmens = PenggunaAsesmen::with([
          'user',
          'asesmen',
          'detail_pengguna_asesmens',
          'asesmen.pertanyaans',
        ])
        ->where('pengguna_asesmens.pengguna_id',$this->id)
        ->orderBy('tgl_dibuat', 'desc')
        ->get()->toArray();




    }

    #[Title('Daftar Penilaian Asesmen')]
    public function render()
    {
        return view('livewire.admin.penilaian-asesmen.daftar-detail-penilaian-asesmen');
    }
}
