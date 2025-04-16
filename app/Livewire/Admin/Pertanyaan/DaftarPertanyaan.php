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
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
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

    use WithFileUploads;
    public $image;

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

  #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')]
  public $penggunaAsesmen;



    public string $url = '/pertanyaan';

    use \Livewire\WithFileUploads;
    use \Mary\Traits\Toast;
    use \App\Helpers\ImageUpload\Traits\WithImageUpload;


    #[On('soal-dibuat')]
    public function initialize()
    {
        $this->soals = Pertanyaan::where('asesmen_id',$this->idAsesmen)->orderBy('no_urut', 'asc')->get();
    }


    public function mount()
    {
        $this->idAsesmen = $this->penggunaAsesmen['asesmen_id'] ?? session()->put('penggunaAsesmen.asesmen_id', $this->id);

        if ($this->idSoal) {
            $this->title .= ' (Ubah)';
            $this->ubah($id);
        } else {
            $this->title .= ' (Buat)';
            $this->buat();
        }
        $this->initialize();
    }

    #[On('soal-dibuat')]
    public function bersihkan_form()
    {
      $this->masterSoalForm->reset();
      $this->idSoal = null;
      $this->masterSoalForm->pertanyaan = null;
      $this->masterSoalForm->bobot = null;
      $this->masterSoalForm->durasi = null;
    }


    public function buat()
    {
      $this->masterSoalForm->reset();
      $this->idSoal = null;
      $this->masterSoalForm->pertanyaan = null;
      $this->masterSoalForm->bobot = null;
      $this->masterSoalForm->durasi = null;

      $lastNoUrut = Pertanyaan::where('asesmen_id', $this->idAsesmen)->max('no_urut');
      $this->masterSoalForm->no_urut = ($lastNoUrut !== null ? (int)$lastNoUrut + 1 : 1);


    }


    public function closeModal()
    {
      $this->modalPertanyaan = false;
    }

    public function simpan()
    {

     $this->masterSoalForm->asesmen_id =  $this->idAsesmen ?? session()->put('penggunaAsesmen.asesmen_id', $this->id);

      $validatedSoalForm = $this->validate(
        $this->masterSoalForm->rules(),
        [],
        $this->masterSoalForm->attributes()
      )['masterSoalForm'];

        $validatedSoalForm['durasi'] = (int) $validatedSoalForm['durasi'];
        $validatedSoalForm['bobot'] = (int) $validatedSoalForm['bobot'];

        if($this->image){
          $ext = $this->image->getClientOriginalExtension();
          $filename = str()->orderedUuid()->toString(). ".$ext";
  
          $filePath = $this->image->storeAs(
            path: 'files/images/pertanyaan',
            name: $filename, 
            options: 'public'
          );

          $validatedSoalForm['image_url'] =  '/' . $filePath;
        }

        $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
        $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
        $validatedSoalForm['tgl_dibuat'] = now();
        $validatedSoalForm['tgl_diupdate'] = now();
        $validatedSoalForm['jenis'] = 'essay';

          $pertanyaan = Pertanyaan::create($validatedSoalForm);
          $this->modalPertanyaan = false;
          $this->dispatch('soal-dibuat');

          $this->success('Soal Asesmen sudah dibuat');

    }

    public function ubah($id)
    {
        $this->idSoal = $id;
      $masterData = Pertanyaan::findOrFail($this->idSoal);
        $this->masterSoalForm->fill($masterData);
        $this->modalPertanyaan = true;

    }

    public function update()
    {

      $masterSoal = Pertanyaan::findOrFail($this->idSoal);

      $validatedForm = $this->validate(
        $this->masterSoalForm->rules(),
        [],
        $this->masterSoalForm->attributes()
      )['masterSoalForm'];

      if ($this->image) {
          // if ($masterSoal['image_url'] && Storage::disk('public')->exists(str_replace('/files/images/pertanyaan/', '', $masterSoal['image_url']))) {
          if ($masterSoal['image_url'] ) {
              Storage::disk('public')->delete($masterSoal['image_url']);
          }

          $ext = $this->image->getClientOriginalExtension();
          $filename = str()->orderedUuid()->toString() . '.' . $ext;

          $filePath = $this->image->storeAs(
              path: 'files/images/pertanyaan',
              name: $filename,
              options: 'public'
          );

          $validatedSoalForm['image_url'] = '/' . $filePath;
      }


      $validatedSoalForm['asesmen_id'] = $validatedForm['asesmen_id'];
      $validatedSoalForm['durasi'] = (int) $validatedForm['durasi'];
      $validatedSoalForm['bobot'] = (int) $validatedForm['bobot'];
      $validatedSoalForm['pertanyaan'] = $validatedForm['pertanyaan'];
      $validatedSoalForm['jenis'] = "essay";

      $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
      $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
      $validatedSoalForm['tgl_diupdate'] = now();

      $masterData = Pertanyaan::findOrFail($this->idSoal);

      if($masterData){
        $masterData->update($validatedSoalForm);
        $this->success('Soal Asesmen berhasil diubah');
        $this->modalPertanyaan = false;

      }else{
        $this->error('Soal Asesmen Gagal diubah');
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
