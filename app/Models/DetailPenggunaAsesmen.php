<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenggunaAsesmen extends Model
{
    use HasFactory;

    protected $table = 'detail_pengguna_asesmen';
    public $timestamps = false;
    protected $fillable = [
        'pengguna_asesmen_id',
        'pertanyaan_id',
    ];

    public function pengguna_assesmen()
    {
        return $this->belongsTo(PenggunaAsesmen::class, 'pengguna_asesmen_id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }


}
