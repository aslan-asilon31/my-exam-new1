<?php

namespace App\Livewire\Pengguna\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PenggunaForm extends Form
{
  public string|null $nama = null;
  public string|null $surel = null;
  public string|null $sandi = null;
  public string|null $dibuat_oleh = null;
  public string|null $diupdate_oleh = null;
  public string|null $tgl_dibuat = null;
  public string|null $tgl_diupdate = null;

  public function rules()
  {
      return [
          'nama' => 'required|string|max:255',
          'surel' => 'required|string|email|max:255',
          'sandi' => 'required|string|min:6',
          'dibuat_oleh' => 'nullable|string|max:255',
          'diupdate_oleh' => 'nullable|string|max:255',
          'tgl_dibuat' => 'nullable|date',
          'tgl_diupdate' => 'nullable|date',
      ];
  }

  public function attributes()
  {
      return [
          'nama' => 'nama',
          'surel' => 'surel',
          'sandi' => 'sandi',
          'dibuat_oleh' => 'dibuat oleh',
          'diupdate_oleh' => 'diupdate oleh',
          'tgl_dibuat' => 'tanggal dibuat',
          'tgl_diupdate' => 'tanggal diupdate',
      ];
  }
}
