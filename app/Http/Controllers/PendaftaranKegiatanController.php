<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\PendaftaranKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranKegiatanController extends Controller
{
    // Tampilkan form daftar kegiatan
    public function create(Kegiatan $kegiatan)
    {
        // Cek apakah user sudah daftar
        $sudahDaftar = PendaftaranKegiatan::where('kegiatan_id', $kegiatan->id)
            ->where('user_id', Auth::id())
            ->exists();

        return view('kegiatan.daftar', compact('kegiatan', 'sudahDaftar'));
    }

    // Simpan pendaftaran lalu redirect ke WhatsApp
    public function store(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'no_hp'   => 'required|string|max:20',
            'email'   => 'nullable|email|max:100',
            'catatan' => 'nullable|string|max:500',
        ]);

        // Cek apakah sudah pernah daftar
        $pendaftaran = PendaftaranKegiatan::where('kegiatan_id', $kegiatan->id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$pendaftaran) {
            $pendaftaran = PendaftaranKegiatan::create([
                'kegiatan_id' => $kegiatan->id,
                'user_id'     => Auth::id(),
                'nama'        => $request->nama,
                'no_hp'       => $request->no_hp,
                'email'       => $request->email,
                'catatan'     => $request->catatan,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Format Pesan WhatsApp
        |--------------------------------------------------------------------------
        */

        $kodePendaftaran = 'REG-' .
            date('Ymd') . '-' .
            str_pad($pendaftaran->id, 4, '0', STR_PAD_LEFT);

        $kodeKegiatan = 'KGT-' .
            str_pad($kegiatan->id, 3, '0', STR_PAD_LEFT);

        $pesan  = "Halo Admin 👋\n\n";
        $pesan .= "Saya telah melakukan pendaftaran kegiatan.\n\n";

        $pesan .= "====================\n";
        $pesan .= "📋 DATA PENDAFTARAN\n";
        $pesan .= "====================\n\n";

        $pesan .= "🆔 ID Pendaftaran\n";
        $pesan .= $kodePendaftaran . "\n\n";

        $pesan .= "📌 Kode Kegiatan\n";
        $pesan .= $kodeKegiatan . "\n\n";

        $pesan .= "📖 Nama Kegiatan\n";
        $pesan .= $kegiatan->judul . "\n\n";

        $pesan .= "👤 Nama Peserta\n";
        $pesan .= $pendaftaran->nama . "\n\n";

        $pesan .= "📱 Nomor WhatsApp\n";
        $pesan .= $pendaftaran->no_hp . "\n\n";

        if (!empty($pendaftaran->email)) {
            $pesan .= "📧 Email\n";
            $pesan .= $pendaftaran->email . "\n\n";
        }

        if (!empty($pendaftaran->catatan)) {
            $pesan .= "📝 Catatan\n";
            $pesan .= $pendaftaran->catatan . "\n\n";
        }

        $pesan .= "📅 Tanggal Daftar\n";
        $pesan .= now()->format('d-m-Y H:i') . "\n\n";

        $pesan .= "Mohon konfirmasi pendaftaran saya.\n";
        $pesan .= "Terima kasih 🙏";

        /*
        |--------------------------------------------------------------------------
        | Redirect WhatsApp
        |--------------------------------------------------------------------------
        */

        // Jika kolom wa_grup berisi link grup, tetap gunakan grup.
        // Jika kosong, gunakan chat admin dengan pesan otomatis.
        if (!empty($kegiatan->wa_grup)) {
            return redirect()->away($kegiatan->wa_grup);
        }

        $nomorAdmin = "6281779080524";

        return redirect()->away(
            "https://wa.me/" . $nomorAdmin . "?text=" . urlencode($pesan)
        );
    }

    // Admin: lihat daftar peserta per kegiatan
    public function adminIndex(Kegiatan $kegiatan)
    {
        $peserta = PendaftaranKegiatan::with('user')
            ->where('kegiatan_id', $kegiatan->id)
            ->latest()
            ->get();

        return view('admin.kegiatan.peserta', compact('kegiatan', 'peserta'));
    }

    // Admin: export absensi peserta ke PDF
    public function exportPdf(Kegiatan $kegiatan)
    {
        $peserta = PendaftaranKegiatan::with('user')
            ->where('kegiatan_id', $kegiatan->id)
            ->latest()
            ->get();

        $pdf = PDF::loadView('admin.kegiatan.peserta-pdf', compact('kegiatan', 'peserta'))
            ->setPaper('a4', 'portrait');

        return $pdf->download(
            'absensi-' . \Illuminate\Support\Str::slug($kegiatan->judul) . '-' . now()->format('Ymd') . '.pdf'
        );
    }
}