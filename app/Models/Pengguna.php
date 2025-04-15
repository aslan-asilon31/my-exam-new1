<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; 

class Pengguna extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'users';
    public $timestamps = false;
    public $incrementing = true; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function pengguna_asesmens()
    {
        return $this->hasMany(PenggunaAsesmen::class, 'pengguna_id', 'id');
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'sandi',
        'ingat_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'sandi' => 'hashed',
        ];
    }
}
