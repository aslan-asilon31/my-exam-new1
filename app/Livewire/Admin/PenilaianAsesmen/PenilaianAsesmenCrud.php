<?php

namespace App\Livewire\Admin\PenilaianAsesmen;

use App\Livewire\Admin\PenilaianAsesmen\Forms\PenilaianAsesmenForm;
use Livewire\Component;
use App\Models\Pengguna;
use App\Models\User;
use App\Models\Asesmen;
use App\Models\PenggunaAsesmen;
use App\Models\DetailPenggunaAsesmen;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;


class PenilaianAsesmenCrud extends Component
{
  public function render()
  {
    return view('livewire.admin.penilaian-asesmen.penilaian-crud')
      ->title($this->title);
  }

  public $asesmen = [];
  public $userId;
  public $asesmenId;
  public $userName;
  public $userEmail;
  public $pertanyaanId;
  public $ActivePenggunaAsesmens=[];

  use \Livewire\WithFileUploads;
  // use \App\Helpers\Permission\Traits\WithPermission;
  use \Mary\Traits\Toast;

  public PenilaianAsesmenForm $masterForm;

  #[\Livewire\Attributes\Locked]
  private string $basePageName = 'asesmen';

  #[\Livewire\Attributes\Locked]
  public string $title = 'Asesmen';

  #[\Livewire\Attributes\Locked]
  public string $url = '/asesmen';

  #[\Livewire\Attributes\Locked]
  public string $id = '';

  #[\Livewire\Attributes\Locked]
  public string $readonly = '';

  #[\Livewire\Attributes\Locked]
  public bool $isReadonly = false;

  #[\Livewire\Attributes\Locked]
  public bool $isDisabled = false;

  #[\Livewire\Attributes\Locked]
  public array $options = [];

  public $asesmens= [];
  public $masterPengguna;
  public $asesmen_id;
  public $asesmenDurasi = 0;

  public $questionTimer;
  public $questionTimers = [];

  public $user = [];
  public $poin;


  #[\Livewire\Attributes\Locked]
  protected $masterModel = \App\Models\Pengguna::class;


  public function mount()
  {
    if ($this->id && $this->readonly) {
      $this->title .= ' (Show)';
      $this->show();
    } else {
      $this->title .= ' (Edit)';

      $this->edit();
    }

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
      'detail_pengguna_asesmens.pertanyaans',
    ])
    ->where('pengguna_asesmens.asesmen_id',$this->id) 
    ->orderBy('tgl_dibuat', 'desc')
    ->first()->toArray();




    $this->masterForm->fill($this->ActivePenggunaAsesmens);
    
    $this->asesmenId = $this->ActivePenggunaAsesmens['asesmen_id'] ?? null;
    
    $asesmen = Asesmen::where('id', $this->asesmenId)->first();
    $this->asesmen = $asesmen ? $asesmen->toArray() : null;

    $this->asesmenDurasi = $this->asesmen['durasi'];

    $tglMulai = \Carbon\Carbon::parse($this->asesmen['tgl_mulai']);
    $tglSelesai = \Carbon\Carbon::parse($this->asesmen['tgl_selesai']);

    $durasi = $tglMulai->diff($tglSelesai);
    $this->asesmenDurasi =  $durasi->format('%h jam %i menit %s detik'); 


  }

  public function create()
  {
    // $this->permission($this->basePageName.'-create');

    $this->masterForm->reset();
  }

  public function store()
  {

    $validatedForm = $this->validate(
      $this->masterForm->rules(),
      [],
      $this->masterForm->attributes()
    )['masterForm'];

    \Illuminate\Support\Facades\DB::beginTransaction();
    try {

      $validatedForm['id'] = str($validatedForm['name'])->slug('_');

      $validatedForm['created_by'] = auth()->user()->username;
      $validatedForm['updated_by'] = auth()->user()->username;

      $this->masterModel::create($validatedForm);
      \Illuminate\Support\Facades\DB::commit();

      $this->create();
      $this->success('Data has been stored');
    } catch (\Throwable $th) {
      \Illuminate\Support\Facades\DB::rollBack();
      \Log::error('Data failed to store: ' . $th->getMessage());
      $this->error('Data failed to store');
    }
  }

  public function show()
  {
    $this->isReadonly = true;
    $this->isDisabled = true;
    $masterData = $this->masterModel::findOrFail($this->id);
    $this->masterForm->fill($masterData);
    
  }

  public function edit()
  {


    $activePengguna = PenggunaAsesmen::with([
      'user',
      'asesmen',
      'detail_pengguna_asesmens',
      'asesmen.pertanyaans', 
    ])
    ->where('pengguna_asesmens.pengguna_id', $this->userId) 
    ->orderBy('tgl_dibuat', 'desc')
    ->first();

    if ($activePengguna) {
        $this->ActivePenggunaAsesmens = $activePengguna->toArray();
        
        if ($this->masterForm instanceof PenilaianAsesmenForm) {
            $this->masterForm->fill($this->ActivePenggunaAsesmens);

        } else {
            throw new \Exception("Master form is not an instance of PenilaianAsesmenForm");
        }
    } else {
      session()->flash('error', 'Tidak ada pengguna asesman ditemukan.');
      return;
  }

 
  }

  public function update()
  {

    if (isset($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'])) {
        foreach ($this->ActivePenggunaAsesmens['detail_pengguna_asesmens'] as $index => $detail) {
          $detailPenggunaAsesmen = DetailPenggunaAsesmen::findOrFail($detail['id']);
              
            $detailPenggunaAsesmen->update([
                'poin' => $detail['poin'],  
            ]);
        }

        session()->flash('success', 'Berhasil memperbaharui data.');
    } else {
        session()->flash('error', 'Tidak ada detail pengguna asesmen yang ditemukan.');
    }


      $this->success('Berhasil memberikan poin.');
      session()->flash('message', 'Berhasil perbaharui data.');

  }
  

  public function delete()
  {
    // $this->permission($this->basePageName.'-delete');

    $masterData = $this->masterModel::findOrFail($this->id);

    \Illuminate\Support\Facades\DB::beginTransaction();
    try {

      $masterData->delete();
      \Illuminate\Support\Facades\DB::commit();

      $this->success('Data has been deleted');
      $this->redirect($this->url, true);
    } catch (\Throwable $th) {
      \Illuminate\Support\Facades\DB::rollBack();
      $this->error('Data failed to delete');
    }
  }


}
