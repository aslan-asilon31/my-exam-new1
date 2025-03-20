<?php

namespace App\Livewire\Admin\AsesmenEvaluator\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PertanyaanForm extends Form
{
  
  public string|null $asesmen_id = null;
  public string|null $pertanyaan = null;
  public string|null $jenis = null;
  public string|null $durasi = null;
  public string|null $bobot = null;
  public string|null $dibuat_oleh = null;
  public string|null $diupdate_oleh = null;
  public string|null $tgl_dibuat = null;
  public string|null $tgl_diupdate = null;
  public string|null $no_urut = null;
  public bool|null $apa_aktif = null;

  public function rules()
  {
      return [
          'asesmen_id' => 'required|integer',
          'pertanyaan' => 'required|string|max:255',
          'jenis' => 'required|string|max:100',
          'durasi' => 'required|integer|min:1',
          'bobot' => 'required|numeric|min:0',
          'dibuat_oleh' => 'nullable|string|max:255',
          'diupdate_oleh' => 'nullable|string|max:255',
          'tgl_dibuat' => 'nullable|date',
          'tgl_diupdate' => 'nullable|date',
          'no_urut' => 'required|integer',
          'apa_aktif' => 'boolean',
      ];
  }

  public function attributes()
  {
      return [
          'asesmen_id' => 'asesmen ID',
          'pertanyaan' => 'pertanyaan',
          'jenis' => 'jenis',
          'durasi' => 'durasi',
          'bobot' => 'bobot',
          'dibuat_oleh' => 'dibuat oleh',
          'diupdate_oleh' => 'diupdate oleh',
          'tgl_dibuat' => 'tanggal dibuat',
          'tgl_diupdate' => 'tanggal diupdate',
          'no_urut' => 'nomor urut',
          'apa_aktif' => 'status aktif',
      ];
  }
}
