<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 👑 ADMIN SECTION
    |--------------------------------------------------------------------------
    */

    public function adminDashboard()
    {
        $totalLaporan   = Laporan::count();
        $totalMenunggu  = Laporan::where('status', 'menunggu')->count();
        $totalSelesai   = Laporan::where('status', 'selesai')->count();
        $totalUser      = User::count();
        $totalKegiatan  = Kegiatan::count();
        $laporanTerbaru = Laporan::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalLaporan',
            'totalMenunggu',
            'totalSelesai',
            'totalUser',
            'totalKegiatan',
            'laporanTerbaru'
        ));
    }

    public function adminIndex()
    {
        $laporan = Laporan::with('user')->latest()->get();
        return view('admin.laporan.index', compact('laporan'));
    }

    // Export PDF semua laporan (admin)
    public function exportPdf()
    {
        $laporans = Laporan::with('user')->latest()->get();

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('laporans'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-selendang-puan-' . now()->format('d-m-Y') . '.pdf');
    }

    // Export PDF laporan milik user sendiri
    public function exportUserPdf()
    {
        $user     = Auth::user();
        $laporans = Laporan::where('user_id', $user->id)->latest()->get();

        $pdf = Pdf::loadView('laporan.pdf', [
            'laporans' => $laporans,
            'user'     => $user,
        ])->setPaper('a4', 'portrait');

        return $pdf->download('laporan-saya-' . now()->format('d-m-Y') . '.pdf');
    }

    public function adminShow(Laporan $laporan)
    {
        $laporan->load('user');
        return view('admin.laporan.show', compact('laporan'));
    }

    public function adminCreate()
    {
        $users = User::all();
        return view('admin.laporan.create', compact('users'));
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'jenis_kasus' => 'required|string',
            'kronologi'   => 'required|string',
            'status'      => 'required|in:menunggu,diproses,selesai,ditolak',
        ]);

        Laporan::create([
            'user_id'     => $request->user_id,
            'jenis_kasus' => $request->jenis_kasus,
            'kategori'    => $request->kategori,
            'lokasi'      => $request->lokasi,
            'kronologi'   => $request->kronologi,
            'no_hp'       => $request->no_hp,
            'status'      => $request->status,
            'anonim'      => false,
        ]);

        return redirect()->route('admin.laporan.index')
            ->with('success', 'Laporan berhasil ditambahkan');
    }

    public function adminEdit(Laporan $laporan)
    {
        return view('admin.laporan.edit', compact('laporan'));
    }

    public function adminUpdate(Request $request, Laporan $laporan)
    {
        $request->validate([
            'jenis_kasus' => 'required|string',
            'kronologi'   => 'required|string',
            'status'      => 'required|in:menunggu,diproses,selesai,ditolak',
        ]);

        $statusLama = $laporan->status;

        $laporan->update($request->only([
            'jenis_kasus', 'kategori', 'lokasi',
            'kronologi', 'no_hp', 'status'
        ]));

        // Kirim notifikasi HANYA kalau status benar-benar berubah
        if ($statusLama !== $request->status) {
            $pesanMap = [
                'diproses' => 'Laporan kamu sedang diproses oleh tim kami.',
                'selesai'  => 'Laporan kamu telah selesai ditindaklanjuti.',
                'ditolak'  => 'Laporan kamu tidak dapat diproses lebih lanjut.',
            ];

            if (isset($pesanMap[$request->status])) {
                Notifikasi::create([
                    'user_id' => $laporan->user_id,
                    'type'    => $request->status,
                    'pesan'   => $pesanMap[$request->status],
                    'url'     => route('laporan.show', $laporan->id),
                ]);
            }
        }

        return redirect()->route('admin.laporan.index')
            ->with('success', 'Laporan berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | 👤 USER SECTION
    |--------------------------------------------------------------------------
    */

    public function userDashboard()
    {
        $user = Auth::user();

        $totalLaporan   = Laporan::where('user_id', $user->id)->count();
        $totalMenunggu  = Laporan::where('user_id', $user->id)->where('status', 'menunggu')->count();
        $totalSelesai   = Laporan::where('user_id', $user->id)->where('status', 'selesai')->count();
        $kegiatans      = Kegiatan::where('status', 'aktif')->orderBy('tanggal')->take(3)->get();
        $laporanTerbaru = Laporan::where('user_id', $user->id)->latest()->take(3)->get();

        $notifikasi = Notifikasi::where('user_id', $user->id)
            ->latest()
            ->take(10)
            ->get();

        $notifikasiCount = Notifikasi::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();

        return view('dashboard', compact(
            'totalLaporan',
            'totalMenunggu',
            'totalSelesai',
            'kegiatans',
            'laporanTerbaru',
            'notifikasi',
            'notifikasiCount'
        ));
    }

    public function laporanIndex()
    {
        $laporans = Laporan::where('user_id', Auth::id())->latest()->get();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kasus' => 'required|string',
            'kronologi'   => 'required|string',
            'bukti'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buktiPath = $request->hasFile('bukti')
            ? $request->file('bukti')->store('bukti', 'public')
            : null;

        $laporan = Laporan::create([
            'user_id'          => Auth::id(),
            'jenis_kasus'      => $request->jenis_kasus,
            'kategori'         => $request->kategori,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'lokasi'           => $request->lokasi,
            'kronologi'        => $request->kronologi,
            'bukti'            => $buktiPath,
            'no_hp'            => $request->no_hp,
            'anonim'           => $request->has('anonim'),
            'status'           => 'menunggu',
        ]);

        Notifikasi::create([
            'user_id' => Auth::id(),
            'type'    => 'info',
            'pesan'   => 'Laporan kamu berhasil dikirim dan sedang menunggu diproses.',
            'url'     => route('laporan.show', $laporan->id),
        ]);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim!');
    }

    public function show(Laporan $laporan)
    {
        if ($laporan->user_id !== Auth::id()) {
            abort(403);
        }
        return view('laporan.show', compact('laporan'));
    }

    /*
    |--------------------------------------------------------------------------
    | 🔔 NOTIFIKASI
    |--------------------------------------------------------------------------
    */

    public function bacaNotifikasi(Notifikasi $notifikasi)
    {
        abort_unless($notifikasi->user_id === Auth::id(), 403);

        $notifikasi->update(['is_read' => true]);

        return response()->json(['ok' => true]);
    }
}