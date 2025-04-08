<?php

namespace App\Livewire\Admin\Pertanyaan;

use Livewire\Component;
use App\Models\Asesmen;
use App\Models\Pertanyaan;
use App\Livewire\Admin\Pertanyaan\Forms\PertanyaanForm;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;

class DaftarPertanyaan extends Component
{
    public Asesmen $asesmen;
    public $soals = [];
    public $idSoal = '';
    public $idAsesmen = '';
    public $title = '';
    public $modalPertanyaan = false;
    public $modalPertanyaanHapus = false;
    public $description = "";

    

    public PertanyaanForm $masterSoalForm;

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

  #[\Livewire\Attributes\Locked]
  private string $baseFolderName = '/files/images/pertanyaan';
  private string $baseImageName = 'pertanyaan-image';


    public string $url = '/pertanyaan';

    use \Livewire\WithFileUploads;
    use \Mary\Traits\Toast;
    use \App\Helpers\ImageUpload\Traits\WithImageUpload;


    public function initialize()
    {
        $this->soals = Pertanyaan::where('asesmen_id',$this->idAsesmen)->orderBy('no_urut', 'asc')->get();
    }


    public function mount()
    {
      $this->idAsesmen = session()->get('asesmen_id_for_pertanyaan');

      if ($this->idSoal) {
        $this->title .= ' (Ubah)';
        $this->ubah($id);
      } else {
        $this->title .= ' (Buat)';
        $this->buat();
      }
      $this->initialize();
    }

    public function buat()
    {
      $this->masterSoalForm->reset();
      $this->idSoal = null;

      $lastNoUrut = Pertanyaan::where('asesmen_id', $this->idAsesmen)->max('no_urut');
      $this->masterSoalForm->no_urut = ($lastNoUrut !== null ? (int)$lastNoUrut + 1 : 1);

    }

    public function closeModal()
    {
      $this->modalPertanyaan = false;
    }

    public function simpan()
    {
      $this->masterSoalForm->asesmen_id =  $this->idAsesmen;

      $validatedSoalForm = $this->validate(
        $this->masterSoalForm->rules(),
        [],
        $this->masterSoalForm->attributes()
      )['masterSoalForm'];


        $validatedSoalForm['durasi'] = (int) $validatedSoalForm['durasi'];
        $validatedSoalForm['bobot'] = (int) $validatedSoalForm['bobot'];

          $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
          $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
          $validatedSoalForm['tgl_dibuat'] = now();
          $validatedSoalForm['tgl_diupdate'] = now();
          $validatedSoalForm['jenis'] = 'essay';

          // image_url
            $folderName = $this->baseFolderName;
            $now = now()->format('Ymd_His_u');
            $imageName = $this->baseImageName . $now;
            $newImageUrl = $validatedSoalForm['image_url'];

            $validatedForm['image_url'] = $this->saveImage(
              $folderName,
              $imageName,
              $newImageUrl,
            );
          // ./image_url

          $pertanyaan = Pertanyaan::create($validatedSoalForm);
          $this->modalPertanyaan = false;
          
          $this->success('Soal Asesmen sudah dibuat');
  
    }

    public function ubah($id)
    {
      $this->idSoal = $id;
      $masterData = Pertanyaan::findOrFail($this->idSoal);
        $this->masterSoalForm->fill($masterData);
        $this->modalPertanyaan = true;

        // $this->masterSoalForm->no_urut = (int) Pertanyaan::findOrFail($this->id)
        // ?->max('no_urut') + 1;
    }

    public function update()
    {

      $validatedForm = $this->validate(
        $this->masterSoalForm->rules(),
        [],
        $this->masterSoalForm->attributes()
      )['masterSoalForm'];
  
      $validatedSoalForm['asesmen_id'] = $validatedForm['asesmen_id'];
      $validatedSoalForm['durasi'] = (int) $validatedForm['durasi'];
      $validatedSoalForm['bobot'] = (int) $validatedForm['bobot'];
      $validatedSoalForm['pertanyaan'] = $validatedForm['pertanyaan'];
      $validatedSoalForm['jenis'] = "essay";

      $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
      $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
      $validatedSoalForm['tgl_diupdate'] = now();

      $masterData = Pertanyaan::findOrFail($this->idSoal);

      // image_url
        $folderName = $this->baseFolderName;
        $now = now()->format('Ymd_His_u');
        $imageName = $this->baseImageName . '_' . $now;
        $newImageUrl = $validatedForm['image_url'];
        $oldImageUrl = $masterData['image_url'];

        $validatedSoalForm['image_url'] = $this->saveImage(
          $folderName,
          $imageName,
          $newImageUrl,
          $oldImageUrl,
        );
      // ./image_url

      if($masterData){
        $masterData->update($validatedSoalForm);
        $this->success('Soal Asesmen berhasil dibuat');
        $this->modalPertanyaan = false;

      }else{
        $this->error('Soal Asesmen Gagal dibuat');
        $this->modalPertanyaan = false;

      }


     
    }

    public function hapus()
    {
  
      $masterData = $this->masterSoalForm::findOrFail($this->id);
  
      \Illuminate\Support\Facades\DB::beginTransaction();
      try {
  
        $masterData->delete();
        \Illuminate\Support\Facades\DB::commit();
  
        $this->success('Data has been hapus');
        $this->redirect($this->url, true);
      } catch (\Throwable $th) {
        \Illuminate\Support\Facades\DB::rollBack();
        $this->error('Data failed to hapus');
      }
    }

    
    #[Title('Pertanyaan')] 
    public function render()
    {
        return view('livewire.admin.pertanyaan.daftar-pertanyaan');
    }
}
