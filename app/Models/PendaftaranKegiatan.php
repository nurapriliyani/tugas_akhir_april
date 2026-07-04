<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranKegiatan extends Model
{
    protected $table = 'pendaftaran_kegiatan';

    protected $fillable = [
        'kegiatan_id',
        'user_id',
        'nama',
        'no_hp',
        'email',
        'catatan',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}