<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaAsesmen extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pengguna_asesmens';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'pengguna_id',
        'asesmen_id',
        'tgl_mulai',
        'tgl_selesai', 
    ];

    public function pengguna()
    {
        return $this->belongsTo(User::class);
    }

    public function asesmen()
    {
        return $this->belongsTo(Asesmen::class);
    }

}
