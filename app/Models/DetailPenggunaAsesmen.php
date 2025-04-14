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
        'jawaban',
        'poin',
    ];

    public function pengguna_asesmen()
    {
        return $this->hasMany(PenggunaAsesmen::class);
    }

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class, 'id');
    }


}
