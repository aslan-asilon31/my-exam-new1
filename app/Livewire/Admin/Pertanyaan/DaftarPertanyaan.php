<?php

namespace App\Livewire\Admin\Pertanyaan;

use Livewire\Component;
use App\Models\Pertanyaan;
use App\Livewire\Admin\Pertanyaan\Forms\PertanyaanForm;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;

class DaftarPertanyaan extends Component
{
    public $soals = [];
    public $idSoal = '';
    public $title = '';
    public $modalPertanyaan = false;
    public $modalPertanyaanHapus = false;
    

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

    public function initialize()
    {
        $this->soals = Pertanyaan::all();
    }


    public function mount()
    {
        $this->id = Request::route('id'); 

      if ($this->idSoal) {
        $this->title .= ' (Ubah)';
        $this->ubah();
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
  
      // \Illuminate\Support\Facades\DB::beginTransaction();
      // try {
  
       
  
      //   \Illuminate\Support\Facades\DB::commit();
        
       
      // } catch (\Throwable $th) {
      //   \Illuminate\Support\Facades\DB::rollBack();
      //   \Log::error('Data failed to store: ' . $th->getMessage());
      //   $this->error('Data failed to store');
      // }
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

    //   $validatedSoalForm['id'] = $buatUuid;
    //   $validatedSoalForm['asesmen_id'] = $this->id;
    //   $validatedSoalForm['dibuat_oleh'] = auth()->user()->username ?? 'admin';
    //   $validatedSoalForm['diupdate_oleh'] = auth()->user()->username ?? 'admin';
    //   $validatedSoalForm['tgl_dibuat'] = now();
    //   $validatedSoalForm['tgl_diupdate'] = now();
    //   $validatedSoalForm['jenis'] = 'essay';
  
      \Illuminate\Support\Facades\DB::beginTransaction();
      try {
  

  
        $pertanyaan = Pertanyaan::update($validatedForm);
  
        \Illuminate\Support\Facades\DB::commit();
  
        $this->success('Data has been updated');
      } catch (\Throwable $th) {
        \Illuminate\Support\Facades\DB::rollBack();
        $this->error('Data failed to update');
      }
    }

    
    #[Title('Pertanyaan')] 
    public function render()
    {
        return view('livewire.admin.pertanyaan.daftar-pertanyaan');
    }
}
