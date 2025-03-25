<?php

namespace App\Livewire\Admin\Asesmen\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AsesmenForm extends Form
{

  public string|null $id = null;
  public string|null $judul = null;
  public string|null $deskripsi = null;
  public string|null $durasi = null;
  public string|null $tgl_mulai = null;
  public string|null $tgl_selesai = null;
  public string|null $dibuat_oleh = null;
  public string|null $diupdate_oleh = null;
  public string|null $tgl_dibuat = null;

  public function rules()
  {
      return [
          'id' => 'nullable|integer',
          'judul' => 'required|string|max:255',
          'deskripsi' => 'required|string',
          'durasi' => 'required|integer|min:1',
          'tgl_mulai' => 'required|date',
          'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
          'dibuat_oleh' => 'required|string|max:255',
          'diupdate_oleh' => 'required|string|max:255',
          'tgl_dibuat' => 'required|date',
      ];
  }

  public function attributes()
  {
      return [
          'id' => 'ID',
          'judul' => 'judul',
          'deskripsi' => 'deskripsi',
          'durasi' => 'durasi',
          'tgl_mulai' => 'tanggal mulai',
          'tgl_selesai' => 'tanggal selesai',
          'dibuat_oleh' => 'dibuat oleh',
          'diupdate_oleh' => 'diupdate oleh',
          'tgl_dibuat' => 'tanggal dibuat',
      ];
  }

}
