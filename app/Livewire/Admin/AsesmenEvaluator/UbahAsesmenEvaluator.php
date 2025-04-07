<?php

namespace App\Livewire\Admin\AsesmenEvaluator;

use App\Livewire\Admin\AsesmenEvaluator\Forms\AsesmenEvaluatorForm;
use App\Livewire\Admin\AsesmenEvaluator\Forms\AsesmenSoalForm;
use Livewire\Component;
use App\Models\Page;
use App\Models\Pertanyaan;
use App\Models\Asesmen;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class UbahAsesmenEvaluator extends Component
{

  public string $selectedTab = 'asesmen-tab';

  public function render()
  {
    return view('livewire.admin.asesmen-evaluator.ubah-asesmen')
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

  public function mount()
  {
    $this->ubah();
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

  // public function simpanSoal()
  // {
  //   $validatedSoalForm = $this->validate(
  //     $this->masterSoalForm->rules(),
  //     [],
  //     $this->masterSoalForm->attributes()
  //   )['masterSoalForm'];
  //       // Log nilai sebelum penyimpanan
  //       $buatUuid = Str::uuid()->toString();
  //       $validatedSoalForm['id'] = $buatUuid;
  //       $validatedSoalForm['asesmen_id'] = $this->id;
  //       $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
  //       $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
  //       $validatedSoalForm['tgl_dibuat'] = now();
  //       $validatedSoalForm['tgl_diupdate'] = now();
  //       $validatedSoalForm['jenis'] = 'essay';

  //       $pertanyaan = Pertanyaan::buat($validatedSoalForm);

  //       return $this->redirect('/asesmen-evaluator', navigate: true);
  //       $this->success('Soal Asesmen sudah dibuat');

  //   // \Illuminate\Support\Facades\DB::beginTransaction();
  //   // try {



  //   //   \Illuminate\Support\Facades\DB::commit();


  //   // } catch (\Throwable $th) {
  //   //   \Illuminate\Support\Facades\DB::rollBack();
  //   //   \Log::error('Data failed to store: ' . $th->getMessage());
  //   //   $this->error('Data failed to store');
  //   // }
  // }

  // public function simpan()
  // {
  //   // $this->permission($this->basePageName.'-buat');

  //   $validatedForm = $this->validate(
  //     $this->masterForm->rules(),
  //     [],
  //     $this->masterForm->attributes()
  //   )['masterForm'];


  //   \Illuminate\Support\Facades\DB::beginTransaction();
  //   try {

  //     // $validatedForm['id'] = str($validatedForm['name'])->slug('_');
  //     $validatedForm['id'] = Str::uuid();
  //     $validatedForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
  //     $validatedForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
  //     $validatedForm['tgl_dibuat'] = now();
  //     // $validatedForm['apa_aktif'] = $this->masterForm['apa_aktif'];

  //     $asesmendibuat = $this->masterModelAsesmen::create($validatedForm);
  //     \Illuminate\Support\Facades\DB::commit();
  //     // $this->create();
  //     $this->success('Judul Asesmen sudah dibuat');
  //     $this->dispatch('asesmen-judul-sudah-dibuat', idAsesmenJudul: $asesmendibuat->id);
  //     $this->bukaFormSoal();


  //   } catch (\Throwable $th) {
  //     \Illuminate\Support\Facades\DB::rollBack();
  //     \Log::error('Data failed to store: ' . $th->getMessage());
  //     $this->error('Data failed to store');
  //   }
  // }

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

       // Format date fields if necessary
      if ($masterData->tgl_mulai) {
        $masterData->tgl_mulai = \DateTime::createFromFormat('Y-m-d H:i:s', $masterData->tgl_mulai)->format('Y-m-d\TH:i');
    }

    if ($masterData->tgl_selesai) {
        $masterData->tgl_selesai = \DateTime::createFromFormat('Y-m-d H:i:s', $masterData->tgl_selesai)->format('Y-m-d\TH:i');
    }

    // Fill the form with the formatted data
    $this->masterForm->fill($masterData->toArray());
  }

  public function update()
  {
    // $this->permission($this->basePageName.'-update');

    $validatedForm = $this->validate(
      $this->masterForm->rules(),
      [],
      $this->masterForm->attributes()
    )['masterForm'];

    $masterData = $this->masterModelAsesmen::findOrFail($this->id);

    \Illuminate\Support\Facades\DB::beginTransaction();
    try {

      $validatedSoalForm['asesmen_id'] = $this->id;
      $validatedSoalForm['dibuat_oleh'] = auth()->user()->name ?? 'admin';
      $validatedSoalForm['diupdate_oleh'] = auth()->user()->name ?? 'admin';
      $validatedSoalForm['tgl_dibuat'] = now();
      $validatedSoalForm['tgl_diupdate'] = now();
      $validatedSoalForm['jenis'] = 'essay';

      $masterData->update($validatedForm);

      \Illuminate\Support\Facades\DB::commit();

      $this->success('Data Asesmen berhasil di Update');
    } catch (\Throwable $th) {
      \Illuminate\Support\Facades\DB::rollBack();
      $this->error('Data Asesmen Gagal di Update');
    }
  }

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
