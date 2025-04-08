<?php

namespace App\Livewire\Admin\AsesmenEvaluator\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AsesmenEvaluatorForm extends Form
{

  public string|null $id = null;
  public string|null $judul = null;
  public int|null $durasi = 0;
  public string|null $deskripsi = null;
  public string|null $tgl_mulai = null;
  public string|null $tgl_selesai = null;
  public int|null $apa_aktif = 1;

  public function rules()
  {
      return [
          'masterForm.id' => 'nullable|string',
          'masterForm.judul' => 'nullable|string|max:255',
          'masterForm.deskripsi' => 'required|string',
          'masterForm.durasi' => 'nullable|integer|min:1',
          'masterForm.tgl_mulai' => 'required|date',
          'masterForm.tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
          'masterForm.apa_aktif' => 'required|bool',
      ];
  }

  public function attributes()
  {
      return [
          'masterForm.id' => 'ID',
          'masterForm.judul' => 'judul',
          'masterForm.deskripsi' => 'deskripsi',
          'masterForm.durasi' => 'durasi',
          'masterForm.tgl_mulai' => 'tanggal mulai',
          'masterForm.tgl_selesai' => 'tanggal selesai',
          'masterForm.apa_aktif' => 'Apakah Aktif',
      ];
  }

}
