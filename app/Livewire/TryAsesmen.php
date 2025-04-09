<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;

class TryAsesmen extends Component
{
    public $durasiSoal = 0;
   
    #[Session] 
    public $soalAsesmen = [];

    #[Session] 
    public $indexSoalAsesmen = 0;

    public function mount()
    {
        // $this->soalAsesmen = [];
        $this->indexSoalAsesmen = 0;
        if(count($this->soalAsesmen)<=0){
            $this->soalAsesmen[] = [
                "pertanyaan_id" => (string) str()->orderedUuid(),
                "nomor_soal" => 1,
                "jawaban" => "",
                "durasi_soal" => 5,
                "waktu_soal_sekarang" => null,
                "waktu_soal_selesai" => null,
                "sisa_waktu_soal" => 0,
            ];
        }

        if ($this->soalAsesmen[$this->indexSoalAsesmen]['waktu_soal_selesai'] == null) {
            $durasiSoal =  $this->soalAsesmen[$this->indexSoalAsesmen]['durasi_soal'];
            $waktuSoalSekarang = now();
            $waktuSoalSelesai =  $waktuSoalSekarang->addSeconds($durasiSoal);
            $this->soalAsesmen[$this->indexSoalAsesmen]['waktu_soal_sekarang'] = $waktuSoalSekarang;
            $this->soalAsesmen[$this->indexSoalAsesmen]['waktu_soal_selesai'] = $waktuSoalSelesai;
        }

        $this->soalAsesmen[$this->indexSoalAsesmen]['sisa_waktu_soal'] = (int) round(now()->diffInSeconds( $this->soalAsesmen[$this->indexSoalAsesmen]['waktu_soal_selesai']));
        $this->durasiSoal = $this->soalAsesmen[$this->indexSoalAsesmen]['sisa_waktu_soal'];
    }

    public function soalSelanjutnya()
    {
        $this->indexSoalAsesmen = $this->indexSoalAsesmen + 1;
        $this->soalAsesmen[$this->indexSoalAsesmen] = [
            "pertanyaan_id" => (string) str()->orderedUuid(),
            "nomor_soal" => $this->indexSoalAsesmen+1,
            "jawaban" => "",
            "durasi_soal" => 30,
            "waktu_soal_sekarang" => null,
            "waktu_soal_selesai" => null,
            "sisa_waktu_soal" => 0,
        ];

        $durasiSoal =  $this->soalAsesmen[$this->indexSoalAsesmen]['durasi_soal'];
        $waktuSoalSekarang = now();
        $waktuSoalSelesai =  $waktuSoalSekarang->addSeconds($durasiSoal);
        $this->soalAsesmen[$this->indexSoalAsesmen]['waktu_soal_sekarang'] = $waktuSoalSekarang;
        $this->soalAsesmen[$this->indexSoalAsesmen]['waktu_soal_selesai'] = $waktuSoalSelesai;
        $this->soalAsesmen[$this->indexSoalAsesmen]['sisa_waktu_soal'] = (int) round(now()->diffInSeconds( $this->soalAsesmen[$this->indexSoalAsesmen]['waktu_soal_selesai']));
        $this->durasiSoal = $this->soalAsesmen[$this->indexSoalAsesmen]['sisa_waktu_soal'];

        $this->dispatch('resetCountdown');
    }

    public function render()
    {
        return view('livewire.try-asesmen');
    }
}
