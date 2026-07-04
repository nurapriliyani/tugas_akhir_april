<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $fillable = ['user_id', 'type', 'pesan', 'url', 'is_read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function kirim($userId, $type, $pesan, $url = null)
    {
        return self::create([
            'user_id' => $userId,
            'type'    => $type,
            'pesan'   => $pesan,
            'url'     => $url,
        ]);
    }
}