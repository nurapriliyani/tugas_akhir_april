<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    // 🔥 FIELD YANG BOLEH DIISI (WAJIB LENGKAP)
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
        'status',
    ];

    // 🔥 CASTING DATA
    protected $casts = [
        'anonim' => 'boolean',
        'tanggal_kejadian' => 'date',
    ];

    // 🔥 RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔥 STATUS LABEL (BIAR RAPI DI VIEW)
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'menunggu' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            default => 'Tidak diketahui',
        };
    }

    // 🔥 (BONUS) FORMAT TANGGAL BIAR RAPI
    public function getTanggalFormattedAttribute()
    {
        return $this->tanggal_kejadian
            ? $this->tanggal_kejadian->format('d M Y')
            : '-';
    }
}