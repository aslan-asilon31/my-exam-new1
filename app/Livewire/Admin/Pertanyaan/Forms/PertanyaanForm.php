<?php

namespace App\Livewire\Admin\Pertanyaan\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PertanyaanForm extends Form
{
    public string|null $asesmen_id = null;
    public string|null $durasi = null;
    public string|null $image_url = null;
    public string|null $pertanyaan = null;
    public string|null $bobot = null;
    public int|null $no_urut;
    public int|null $apa_aktif = 1;

    public function rules()
    {
        return [
            'masterSoalForm.id' => 'nullable|string',
            'masterSoalForm.asesmen_id' => 'nullable|string',
            'masterSoalForm.image_url' => 'nullable|string',
            'masterSoalForm.durasi' => 'nullable|string',
            'masterSoalForm.pertanyaan' => 'nullable|string',
            'masterSoalForm.bobot' => 'required|integer|min:0',
            'masterSoalForm.no_urut' => 'required|integer',
            'masterSoalForm.apa_aktif' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'masterSoalForm.asesmen_id' => 'asesmen id',
            'masterSoalForm.image_url' => 'Image URL',
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
