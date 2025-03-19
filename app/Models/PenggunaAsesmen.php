<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaAsesmen extends Model
{
    use HasFactory;

    protected $table = 'pengguna_asesmens';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'asesmen_id',
        'tgl_mulai',
        'tgl_selesai', // Pastikan untuk menambahkan kolom ini jika ada
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function asesmen()
    {
        return $this->belongsTo(Asesmen::class);
    }
}
