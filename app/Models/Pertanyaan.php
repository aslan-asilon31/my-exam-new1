<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pertanyaan extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'pertanyaans';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'asesmen_id',
        'pertanyaan',
        'jenis',
        'durasi',
        'bobot',
        'image_url',
        'dibuat_oleh',
        'diupdate_oleh',
        'tgl_dibuat',
        'tgl_diupdate',
        'no_urut',
        'apa_aktif',
    ];

    public function newUniqueId(): string
    {
      return (string) str()->orderedUuid();
    }

    public function asesmen(): BelongsTo
    {
        return $this->belongsTo(Asesmen::class, 'id');
    }

    public function detail_pengguna_asesmens()
    {
        return $this->hasMany(DetailPenggunaAsesmen::class); 
    }

}
