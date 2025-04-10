<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class DetailPenggunaAsesmen extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'detail_pengguna_asesmen';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'pengguna_asesmen_id',
        'pertanyaan_id',
    ];

    public function pengguna_assesmen()
    {
        return $this->hasMany(PenggunaAsesmen::class,'id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }


}
