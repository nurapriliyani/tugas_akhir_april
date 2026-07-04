<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function exportPdf()
    {
        $kegiatan = Kegiatan::latest()->get();

        $pdf = Pdf::loadView('admin.kegiatan.pdf', compact('kegiatan'))
            ->setPaper('a4', 'landscape');

        return $pdf->download(
            'rekapitulasi-agenda-kegiatan-' . now()->format('Ymd') . '.pdf'
        );
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'lokasi'      => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'wa_grup'     => 'nullable|url|max:255',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $validated['status'] = 'aktif';

        Kegiatan::create($validated);

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'lokasi'      => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'wa_grup'     => 'nullable|url|max:255',
            'status'      => 'required|in:aktif,selesai',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {

            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Agenda berhasil diperbarui!');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        $kegiatan->delete();

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }

    public function exportPesertaPdf(Kegiatan $kegiatan)
    {
        $peserta = $kegiatan->pendaftaran()->latest()->get();

        $pdf = Pdf::loadView('admin.kegiatan.peserta-pdf', compact('kegiatan', 'peserta'))
            ->setPaper('a4', 'portrait');

        return $pdf->download(
            'absensi-' . \Illuminate\Support\Str::slug($kegiatan->judul) . '-' . now()->format('Ymd') . '.pdf'
        );
    }
}