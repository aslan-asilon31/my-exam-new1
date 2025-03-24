<?php

namespace App\Livewire\Asesmen;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Pertanyaan;
use App\Models\PenggunaAsesmen;
use App\Models\DetailPenggunaAsesmen;
use Illuminate\Support\Facades\Session;
use Mary\Traits\Toast;


class KonfirmasiSelesai extends Component
{
    use Toast;

    public string $title = 'Konfirmasi Selesai '; 
    public $jawaban = [];
    public $detailPenggunaAsesmen = [];

    #[\Livewire\Attributes\Locked]
    public string $id = '';

    public function mount()
    {
        dd(Session());
     
    }

    public function initialize()
    {

     
    }

    public function simpanJawaban()
    {


        // Ambil jawaban dari session
        $jawabanData = Session::get('soal-session');
        // $jawabanData = Session::get();
            //  dd(Session());
        $penggunaAsesmen = PenggunaAsesmen::create([
            'user_id' => 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740', // Ambil user ID dari auth
            'asesmen_id' => $jawabanData[0]['asesmen_id'], // Pastikan Anda memiliki asesmen_id yang sesuai
            'pertanyaan_id' => $jawabanData[0]['pertanyaan_id'], // Ambil pertanyaan_id dari jawaban
            'tgl_mulai' => now(), // Atur tanggal mulai
            'tgl_selesai' => now(), // Atur tanggal selesai
        ]);

        $detailPenggunaAsesmen = [];
        foreach ($jawabanData as $jawaban) {
            $detailPenggunaAsesmen[] = [
                'id' => (string) Str::uuid(),
                'asesmen_user_id' =>  $penggunaAsesmen->id, // Pastikan Anda memiliki asesmen_id yang sesuai
                'pertanyaan_id' => (string) $jawaban['pertanyaan_id'], // Ambil pertanyaan_id dari jawaban
                'jawaban' => $jawaban['jawaban'], // Ambil jawaban dari jawaban
                'poin' => 0, // Ambil jawaban dari jawaban
            ];
        }

        DetailPenggunaAsesmen::insert($detailPenggunaAsesmen);      

        // Hapus jawaban dari session setelah disimpan
        Session::forget('soal-session');
    
        // Tambahkan notifikasi atau redirect sesuai kebutuhan
        $this->toast(
            type: 'success',
            title: 'Success',
            description: "Jawaban berhasil disimpan.",
            position: 'toast-top toast-end',
            icon: 'o-information-circle',
            css: 'alert-info',
            timeout: 3000,
            redirectTo: null
        );

        $this->redirect('/daftar-asesmen', navigate: true);

    }
    
    public function clearSession()
    {
        $userId = auth()->id(); 
        Session::forget('soal-sesi.' . $userId); 
    }

    public function render()
    {

        return view('livewire.asesmen.konfirmasi-selesai')
        ->layout('components.layouts.app_visitor')
        ->title($this->title);
    }
}
