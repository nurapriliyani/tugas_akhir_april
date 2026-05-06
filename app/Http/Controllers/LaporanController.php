<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // FORM
    public function create()
    {
        return view('laporan.create');
    }

    // SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kasus'       => 'required|string',
            'kategori'          => 'nullable|string',
            'tanggal_kejadian'  => 'nullable|date',
            'lokasi'            => 'nullable|string',
            'kronologi'         => 'required|string',
            'bukti'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'no_hp'             => 'nullable|string',
        ]);

        // upload bukti
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        }

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

        return redirect()->route('dashboard')
            ->with('success', 'Laporan berhasil dikirim!');
    }

    // RIWAYAT
    public function index()
    {
        $laporans = Laporan::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('laporan.index', compact('laporans'));
    }

    public function show($id)
    {
        $laporan = Laporan::where('id', $id)
            ->where('user_id', Auth::id()) // biar aman
            ->firstOrFail();

        return view('laporan.show', compact('laporan'));
    }
}