<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_kasus',
        'kategori',
        'tanggal_kejadian',
        'lokasi',
        'kronologi',
        'bukti',
        'no_hp',
        'anonim',
        'status', // Sudah benar masuk fillable
    ];

    protected $casts = [
        'anonim' => 'boolean',
        'tanggal_kejadian' => 'date',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Accessor untuk label status agar tampilan lebih rapi
     * REVISI: Tambahkan case 'ditolak'
     */
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'menunggu' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai'  => 'Selesai',
            'ditolak'  => 'Ditolak', // <--- Tambahkan ini
            default    => 'Tidak diketahui',
        };
    }
}