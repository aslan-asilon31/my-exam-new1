<?php

namespace App\Livewire\Admin\Pertanyaan\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PertanyaanForm extends Form
{
    public string|null $id = null;
    public string|null $pertanyaan = null;
    public string|null $durasi = null;
    public string|null $bobot = null;
    public int|null $no_urut = 0;
    public int|null $apa_aktif = 1;

    public function rules()
    {
        return [
            'masterSoalForm.pertanyaan' => 'required|string|max:255',
            'masterSoalForm.durasi' => 'required|integer|min:1',
            'masterSoalForm.bobot' => 'required|numeric|min:0',
            'masterSoalForm.no_urut' => 'required|integer',
            'masterSoalForm.apa_aktif' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'masterSoalForm.id' => 'id',
            'masterSoalForm.pertanyaan' => 'pertanyaan',
            'masterSoalForm.durasi' => 'durasi',
            'masterSoalForm.bobot' => 'bobot',
            'masterSoalForm.dibuat_oleh' => 'dibuat oleh',
            'masterSoalForm.diupdate_oleh' => 'diupdate oleh',
            'masterSoalForm.tgl_dibuat' => 'tanggal dibuat',
            'masterSoalForm.tgl_diupdate' => 'tanggal diupdate',
            'masterSoalForm.no_urut' => 'nomor urut',
            'masterSoalForm.apa_aktif' => 'status aktif',
        ];
    }

}
