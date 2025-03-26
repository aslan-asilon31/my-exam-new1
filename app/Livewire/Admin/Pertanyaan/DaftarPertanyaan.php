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


    public string $url = '/pertanyaan';

    use \Livewire\WithFileUploads;
    use \Mary\Traits\Toast;

    public function initialize()
    {
        $this->soals = Pertanyaan::all();
    }


    public function mount()
    {

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
    }


    public function simpan()
    {

      $validatedSoalForm = $this->validate(
        $this->masterSoalForm->rules(),
        [],
        $this->masterSoalForm->attributes()
      )['masterSoalForm'];

          $validatedSoalForm['asesmen_id'] = "95e36db6-dfa4-4b5e-955e-c9d3e56ae72a";
          $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
          $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
          $validatedSoalForm['tgl_dibuat'] = now();
          $validatedSoalForm['tgl_diupdate'] = now();
          $validatedSoalForm['jenis'] = 'essay';
      
          $pertanyaan = Pertanyaan::create($validatedSoalForm);
          
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
      
      // $this->permission($this->basePageName.'-update');
      $validatedForm = $this->validate(
        $this->masterSoalForm->rules(),
        [],
        $this->masterSoalForm->attributes()
      )['masterSoalForm'];
  
      $masterData = Pertanyaan::findOrFail($this->idSoal);

  
      \Illuminate\Support\Facades\DB::beginTransaction();
      try {
  

  
        $pertanyaan = Pertanyaan::update($validatedForm);
  
        \Illuminate\Support\Facades\DB::commit();
  
        $this->success('Soal Asesmen sudah dibuat');

      } catch (\Throwable $th) {
        \Illuminate\Support\Facades\DB::rollBack();
        $this->error('Soal Asesmen gagal dibuat');
      }
    }

    
    #[Title('Pertanyaan')] 
    public function render()
    {
        return view('livewire.admin.pertanyaan.daftar-pertanyaan');
    }
}
