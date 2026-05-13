<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    // Tampilkan daftar kegiatan di halaman admin
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    // Form tambah kegiatan
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    // Simpan kegiatan baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'lokasi'    => 'required|string',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('kegiatan', 'public');
        }

        Kegiatan::create([
            'judul'     => $request->judul,
            'tanggal'   => $request->tanggal,
            'lokasi'    => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $gambarPath,
            'status'    => 'aktif'
        ]);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diterbitkan!');
    }

    // Form edit kegiatan
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    // Update data kegiatan
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'lokasi'    => 'required|string',
            'deskripsi' => 'required',
            'status'    => 'required|in:aktif,selesai',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }
            $kegiatan->gambar = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatan->update([
            'judul'     => $request->judul,
            'tanggal'   => $request->tanggal,
            'lokasi'    => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status,
        ]);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    //show kegiatan
        public function show($id)
    {
        // Mengambil data kegiatan berdasarkan ID, jika tidak ada akan error 404
        $kegiatan = Kegiatan::findOrFail($id);

        // Mengirim data ke view admin/kegiatan/show.blade.php
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    // Hapus kegiatan
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }
        
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan telah dihapus.');
    }
}