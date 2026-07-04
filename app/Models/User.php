<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi (WAJIB sesuai database)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Field yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke laporan
     */
    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    /*relasi notifikasi*/
    public function notifikasis()
    {
         return $this->hasMany(Notifikasi::class);
    }

    /**
     * Cek role admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}