<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    // tampilkan semua kegiatan
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    // form tambah kegiatan
    public function create()
    {
        return view('kegiatan.create');
    }

    // simpan kegiatan
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // upload gambar
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('kegiatan', 'public');
        }

        Kegiatan::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'status' => 'aktif'
        ]);

        return redirect('/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    // hapus kegiatan
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return back()->with('success', 'Kegiatan dihapus');
    }
}