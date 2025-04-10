<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use App\Models\Asesmen;
use App\Models\Pengguna;
use App\Models\User;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use App\Models\Pertanyaan;

class SoalAsesmen extends Component
{
    use Toast;
    public $title = 'Soal Asesmen';
    public $url = '/soal-asesmen';
    
    #[\Livewire\Attributes\Locked]
    public string $id = '';

    #[\Livewire\Attributes\Session] 
    public $detailPenggunaAsesmen = [];

    #[\Livewire\Attributes\Session] 
    public $indexDetailPenggunaAsesmen = 0;

    public function mount(){
        $this->indexDetailPenggunaAsesmen = 0;
        $this->detailPenggunaAsesmen = [];

        if (count($this->detailPenggunaAsesmen)<=0) {
            $this->detailPenggunaAsesmen = Pertanyaan::query()
            ->where('asesmen_id', $this->id)
            ->orderBy('no_urut')
            ->get()
            ->map(function($pertanyaan ,$index){
                return [  
                    'pertanyaan_id' => $pertanyaan->id,
                    'no_urut' => $pertanyaan->no_urut,
                    'image_url' => $pertanyaan->image_url,
                    'pertanyaan' =>  $pertanyaan->pertanyaan,
                    'durasi' => $pertanyaan->durasi,
                    'bobot' => $pertanyaan->bobot,
                    'jawaban' => '',
                    'waktu_mulai_soal' => null,
                    'waktu_selesai_soal' => null,
                    'sisa_waktu' => 0,
                ];
            })
            ->toArray();
        }

        if($this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_mulai_soal'] == null){
            $waktuMulaiSoal = now();
            $durasi = $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['durasi'];
            $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_mulai_soal'] = now()->format('Y-m-d H:i:s');
            $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_selesai_soal'] = $waktuMulaiSoal->addSeconds($durasi)->format('Y-m-d H:i:s'); 
        }

        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu'] = now()->diffInSeconds($this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_selesai_soal']);
        if ($this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu'] <= 0) {
            $this->indexDetailPenggunaAsesmen =  $this->indexDetailPenggunaAsesmen + 1;
        }
    }

    public function soalSelanjutnya(){
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu'] = 0;
        $this->indexDetailPenggunaAsesmen = $this->indexDetailPenggunaAsesmen + 1;

        if($this->indexDetailPenggunaAsesmen > (count($this->detailPenggunaAsesmen)-1)){
            return redirect()->to('konfirmasi-selesai');
        }

        $waktuMulaiSoal = now();
        $durasi = $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['durasi'];
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_mulai_soal'] = now()->format('Y-m-d H:i:s');
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_selesai_soal'] = $waktuMulaiSoal->addSeconds($durasi)->format('Y-m-d H:i:s'); 
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu'] = now()->diffInSeconds($this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_selesai_soal']);
    }
    
    public function render()
    {
        return view('livewire.asesmen.halaman-soal-asesmen')
        ->layout('components.layouts.app_visitor')
        ->title($this->title);
    }
}
