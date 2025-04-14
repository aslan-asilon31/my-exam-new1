<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use App\Models\Asesmen;
use App\Models\Pengguna;
use App\Models\User;
use Livewire\Attributes\On;
use Mary\Traits\Toast;
use App\Models\Pertanyaan;
use App\Models\PenggunaAsesmen;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SoalAsesmen extends Component
{
    use Toast;
    public $title = 'Soal Asesmen';
    public $url = '/soal-asesmen';
    public $jawaban;
    public $durasiSoal ;

    
    #[\Livewire\Attributes\Locked]
    public string $id = '';

    #[\Livewire\Attributes\Session(key: 'detailPenggunaAsesmen')] 
    public $detailPenggunaAsesmen;

    #[\Livewire\Attributes\Session(key: 'indexDetailPenggunaAsesmen')] 
    public $indexDetailPenggunaAsesmen;

    #[\Livewire\Attributes\Session(key: 'penggunaAsesmen')] 
    public $penggunaAsesmen;

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
                    'index' => $index,
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

        $this->durasiSoal = intval($this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu']);


    }

    public function soalSelanjutnya(){
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['jawaban'] = $this->jawaban;
      
        if($this->indexDetailPenggunaAsesmen >= (count($this->detailPenggunaAsesmen)-1)){

            $penggunaAsesmen = PenggunaAsesmen::create([
                'id' => (string) Str::uuid(),
                'pengguna_id' => auth()->id(), 
                'asesmen_id' => $this->id,
                'tgl_mulai' => now(),
                'tgl_selesai' => now(),
                'dibuat_oleh' => auth()->user()->name,
                'diupdate_oleh' => auth()->user()->name,
                'status' => 1,
            ]);

            $data = [];

            if (!empty($this->detailPenggunaAsesmen)) {
                foreach ($this->detailPenggunaAsesmen as $item) {
                    $data[] = [
                        'id' => (string) Str::uuid(),
                        'pengguna_asesmen_id' => $penggunaAsesmen->id,
                        'pertanyaan_id' => $item['pertanyaan_id'], 
                        'jawaban' => $item['jawaban'], 
                        'poin' => 0,
                        'apa_aktif' => 1,
                    ];
                }

                DB::table('detail_pengguna_asesmen')->insert($data);
                $this->detailPenggunaAsesmen = [];
                $this->indexDetailPenggunaAsesmen = [];
                return redirect()->to('konfirmasi-selesai');

                echo "Data inserted successfully!";

            } else {
                echo "No data available to insert.";
            }


        }

        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu'] = 0;
        $this->indexDetailPenggunaAsesmen = $this->indexDetailPenggunaAsesmen + 1;

        $waktuMulaiSoal = now();
        $durasi = $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['durasi'];
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_mulai_soal'] = now()->format('Y-m-d H:i:s');
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_selesai_soal'] = $waktuMulaiSoal->addSeconds($durasi)->format('Y-m-d H:i:s'); 
        $this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu'] = now()->diffInSeconds($this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['waktu_selesai_soal']);

        $this->durasiSoal = intval($this->detailPenggunaAsesmen[$this->indexDetailPenggunaAsesmen]['sisa_waktu']);
        $this->jawaban = '';
        $this->dispatch('resetCountdown');
    }

    
    public function render()
    {
        return view('livewire.asesmen.halaman-soal-asesmen')
        ->layout('components.layouts.app_visitor')
        ->title($this->title);
    }
}
