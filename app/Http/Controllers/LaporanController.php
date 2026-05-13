<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 👑 ADMIN SECTION
    |--------------------------------------------------------------------------
    */

    public function adminDashboard()
    {
        // Mengambil statistik global untuk seluruh sistem
        $totalLaporan = Laporan::count();
        $totalMenunggu = Laporan::where('status', 'menunggu')->count();
        $totalSelesai = Laporan::where('status', 'selesai')->count();
        $totalUser = User::count();
        $totalKegiatan = Kegiatan::count();

        // Mengarahkan ke file view khusus admin agar tampilan tidak tertukar
        return view('admin.dashboard', compact(
            'totalLaporan', 
            'totalMenunggu', 
            'totalSelesai', 
            'totalUser',
            'totalKegiatan'
        ));
    }

    public function adminIndex()
    {
        $laporan = Laporan::with('user')->latest()->get();
        return view('admin.laporan.index', compact('laporan'));
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

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil ditambahkan');
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

        $laporan->update($request->only(['jenis_kasus', 'kategori', 'lokasi', 'kronologi', 'no_hp', 'status']));

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | 👤 USER (PELAPOR) SECTION
    |--------------------------------------------------------------------------
    */

    public function userDashboard()
    {
        $user = Auth::user();
        
        // Statistik hanya milik user yang login
        $totalLaporan = Laporan::where('user_id', $user->id)->count();
        $totalMenunggu = Laporan::where('user_id', $user->id)->where('status', 'menunggu')->count();
        $totalSelesai = Laporan::where('user_id', $user->id)->where('status', 'selesai')->count();
        
        $kegiatans = Kegiatan::where('status', 'aktif')->latest()->take(3)->get();

        return view('dashboard', compact('totalLaporan', 'totalMenunggu', 'totalSelesai', 'kegiatans'));
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
            'jenis_kasus'      => 'required|string',
            'kronologi'        => 'required|string',
            'bukti'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buktiPath = $request->hasFile('bukti') ? $request->file('bukti')->store('bukti', 'public') : null;

        Laporan::create([
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

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim!');
    }

    public function show(Laporan $laporan)
    {
        if ($laporan->user_id !== Auth::id()) {
            abort(403);
        }
        return view('laporan.show', compact('laporan'));
    }
}