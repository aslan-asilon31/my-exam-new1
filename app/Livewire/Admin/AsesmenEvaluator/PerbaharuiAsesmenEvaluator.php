<?php

namespace App\Livewire\Admin\AsesmenEvaluator;

use App\Livewire\Admin\AsesmenEvaluator\Forms\AsesmenEvaluatorForm;
use App\Livewire\Admin\AsesmenEvaluator\Forms\AsesmenSoalForm;
use Livewire\Component;
use App\Models\Page;
use App\Models\Pertanyaan;
use App\Models\Asesmen;
use Carbon\Carbon;

use Illuminate\Support\Str;
use Livewire\Attributes\On; 

class PerbaharuiAsesmenEvaluator extends Component
{
  public function render()
  {
    return view('livewire.admin.asesmen-evaluator.perbaharui-asesmen-evaluator')
      ->title($this->title);
  }

  use \Livewire\WithFileUploads;
  // use \App\Helpers\Permission\Traits\WithPermission;
  use \Mary\Traits\Toast;

  public $tampilFormJudulAsesmen =true;
  public $tampilFormSoalAsesmen = false;
  public $tampilJudulSoal = '';

  
  #[\Livewire\Attributes\Locked]
  private string $basePageName = 'asesmen-evaluator';

  #[\Livewire\Attributes\Locked]
  public string $title = 'Asesmen Evaluator';

  #[\Livewire\Attributes\Locked]
  public string $url = '/asesmen-evaluator';

  #[\Livewire\Attributes\Locked]
  public string $id = '';

  #[\Livewire\Attributes\Locked]
  public string $idSoal = '';

  #[\Livewire\Attributes\Locked]
  public string $readonly = '';

  #[\Livewire\Attributes\Locked]
  public bool $isReadonly = false;

  #[\Livewire\Attributes\Locked]
  public bool $isDisabled = false;

  #[\Livewire\Attributes\Locked]
  public array $options = [];

  #[\Livewire\Attributes\Locked]
  protected $masterModelAsesmen = \App\Models\Asesmen::class;
  protected $masterModelSoal = \App\Models\Pertanyaan::class;

  public AsesmenEvaluatorForm $masterForm;
  public AsesmenSoalForm $masterSoalForm;
  public $masterSoalForm1;
  public $asesmen;

  public function mount()
  {
    if ($this->id && $this->readonly) {
      $this->title .= ' (Tampil)';
      $this->tampil();
    } else if ($this->id) {
      $this->title .= ' (Ubah)';
      $this->ubah();
    } else {
      $this->title .= ' (Buat)';
      $this->buat();
    }
    $this->initialize();
  }

  public function initialize()
  {
  }

  public function buat()
  {

    $this->masterForm->reset();

  }

  #[On('asesmen-judul-sudah-dibuat')]
  public function buatSoal($idAsesmenJudul)
  {
    $this->id = $idAsesmenJudul;

    $this->tampilJudulSoal = $this->masterModelAsesmen::firstOrFail('id',$this->id);
    $this->masterSoalForm->id = $this->id;
    // $this->masterSoalForm->no_urut = (int) $this->masterModelSoal::where('asesmen_id',$this->id)
    // ?->max('no_urut') + 1;
    return [
        $this->tampilFormJudulAsesmen = false,
        $this->tampilFormSoalAsesmen = true,
    ];
  }

  public function bukaFormSoal()
  {
    return [
        $this->tampilFormJudulAsesmen = false,
        $this->tampilFormSoalAsesmen = true,
    ];
  }
  
  public function simpanSoal()
  {

    $validatedSoalForm = $this->validate(
      $this->masterSoalForm->rules(),
      [],
      $this->masterSoalForm->attributes()
    )['masterSoalForm'];
        // Log nilai sebelum penyimpanan
        $buatUuid = Str::uuid()->toString();
        $validatedSoalForm['id'] = $buatUuid;
        $validatedSoalForm['asesmen_id'] = $this->id;
        $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
        $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
        $validatedSoalForm['tgl_dibuat'] = now();
        $validatedSoalForm['tgl_diupdate'] = now();
        $validatedSoalForm['jenis'] = 'essay';
    
        $pertanyaan = Pertanyaan::create($validatedSoalForm);
        
        return $this->redirect('/asesmen-evaluator', navigate: true);
        $this->success('Soal Asesmen sudah dibuat');

  }
  
  public function simpan()
  {
    $validatedForm = $this->validate(
      $this->masterForm->rules(),
      [],
      $this->masterForm->attributes()
    )['masterForm'];

    $tglMulai = \Carbon\Carbon::parse($validatedForm['tgl_mulai']);
    $tglSelesai = \Carbon\Carbon::parse($validatedForm['tgl_selesai']);
    $durasi = $tglMulai->diffInSeconds($tglSelesai);

    $validatedForm['durasi'] = $tglMulai->diffInSeconds($tglSelesai);


    \Illuminate\Support\Facades\DB::beginTransaction();
    try {

      // $validatedForm['id'] = str($validatedForm['name'])->slug('_');
      $validatedForm['id'] = Str::uuid();
      $validatedForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
      $validatedForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
      $validatedForm['tgl_dibuat'] = now();
      $validatedForm['tgl_diupdate'] = now();
      $validatedForm['durasi'] = $durasi;
      $validatedForm['apa_aktif'] = $validatedForm['apa_aktif'];

      $asesmendibuat = $this->masterModelAsesmen::create($validatedForm);
      \Illuminate\Support\Facades\DB::commit();
      // $this->create();
      $this->success('Judul Asesmen sudah dibuat');
      $this->dispatch("asesmen-judul-sudah-dibuat"); 
      $this->redirect('/asesmen-evaluator');
      // $this->bukaFormSoal();

    } catch (\Throwable $th) {
      \Illuminate\Support\Facades\DB::rollBack();
      \Log::error('Data failed to store: ' . $th->getMessage());
      $this->error('Data failed to store');
    }
  }

  public function tampil()
  {
    // $this->permission($this->basePageName.'-tampil');

    $this->isReadonly = true;
    $this->isDisabled = true;
    $masterData = $this->masterModelAsesmen::findOrFail($this->id);
    $this->masterForm->fill($masterData);
  }

  public function ubah()
  {

    $masterData = $this->masterModelAsesmen::findOrFail($this->id);
    $this->masterSoalForm->fill($masterData);
  }

  // public function update()
  // {

  //   $validatedForm = $this->validate(
  //     $this->masterSoalForm->rules(),
  //     [],
  //     $this->masterSoalForm->attributes()
  //   )['masterSoalForm'];

  //   $masterData = $this->masterModelAsesmen::findOrFail($this->id);

  //   \Illuminate\Support\Facades\DB::beginTransaction();
  //   try {

  //     $validatedForm['id'] = str($validatedForm['name'])->slug('_');
  //     $validatedForm['updated_by'] = auth()->user()->username;


  //     $masterData->update($validatedForm);

  //     \Illuminate\Support\Facades\DB::commit();

  //     $this->success('Data has been updated');
  //   } catch (\Throwable $th) {
  //     \Illuminate\Support\Facades\DB::rollBack();
  //     $this->error('Data failed to update');
  //   }
  // }

  public function hapus()
  {
    // $this->permission($this->basePageName.'-delete');

    $masterData = $this->masterModelAsesmen::findOrFail($this->id);

    \Illuminate\Support\Facades\DB::beginTransaction();
    try {

      $masterData->hapus();
      \Illuminate\Support\Facades\DB::commit();

      $this->success('Data has been hapusd');
      $this->redirect($this->url, true);
    } catch (\Throwable $th) {
      \Illuminate\Support\Facades\DB::rollBack();
      $this->error('Data failed to hapus');
    }
  }

/*
  tampil(){}
  buat(){}
  simpan(){}
  ubah($id){}
  update(){}


  buatSoal(){} // openFormSoalModal
  simpanSoal(){}
  ubahSoal($idSoal){} // openFormSoalModal
  updateSoal(){}
*/

}
