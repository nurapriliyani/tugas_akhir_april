<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}
.topbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;flex-wrap:wrap;gap:10px;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e8e0d4;color:#6a5c48;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;}
.back-btn:hover{background:#f8f4ef;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0;letter-spacing:-0.3px;}
.btn-edit{display:inline-flex;align-items:center;gap:6px;background:#f5ede4;color:#b07040;font-size:12px;font-weight:600;padding:9px 16px;border-radius:7px;text-decoration:none;border:1px solid #e8d8c4;}
.btn-edit:hover{background:#b07040;color:#fff;border-color:#b07040;}

.grid2{display:grid;grid-template-columns:260px 1fr;gap:16px;align-items:start;}
.card{background:#fff;border-radius:12px;border:1px solid #e8e0d4;overflow:hidden;}

.poster-wrap{padding:16px;}
.poster-img{width:100%;border-radius:10px;object-fit:cover;}
.poster-empty{width:100%;aspect-ratio:1;background:#f0ece4;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;color:#b09e88;font-size:13px;gap:8px;border:1.5px dashed #ddd5c8;}
.poster-empty span{font-size:32px;}
.meta-section{padding:14px 16px;border-top:1px solid #f0ece4;display:flex;flex-direction:column;gap:12px;}
.meta-label{font-size:9px;font-weight:700;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:3px;}
.meta-val{font-size:13px;font-weight:600;color:#2c2416;}

.badge{display:inline-flex;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:700;}
.badge-aktif{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;}
.badge-selesai{background:#f0ece4;color:#8a7a60;border:1px solid #ddd5c8;}

.detail-header{padding:20px 22px;border-bottom:1px solid #f0ece4;}
.detail-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 12px;letter-spacing:-0.3px;}
.tag-row{display:flex;flex-wrap:wrap;gap:8px;}
.tag{display:inline-flex;align-items:center;gap:5px;padding:6px 12px;border-radius:7px;font-size:12px;font-weight:600;}
.tag-date{background:#edf2e8;color:#4a6535;}
.tag-loc{background:#f0ece4;color:#8a6040;}

.desc-section{padding:20px 22px;}
.desc-label{font-size:10px;font-weight:700;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:12px;}
.desc-content{font-size:13.5px;color:#5a4a38;line-height:1.8;}

.action-footer{padding:16px 22px;background:#f8f4ef;border-top:1px solid #f0ece4;display:flex;justify-content:flex-end;}
.btn-del{display:inline-flex;align-items:center;gap:6px;background:#fff;border:1px solid #e8c8c8;color:#b04040;font-size:12px;font-weight:600;padding:9px 16px;border-radius:7px;cursor:pointer;}
.btn-del:hover{background:#b04040;color:#fff;border-color:#b04040;}

@media(max-width:768px){.grid2{grid-template-columns:1fr;}}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <div style="display:flex;align-items:center;gap:10px;">
            <a href="{{ route('admin.kegiatan.index') }}" class="back-btn">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Kembali
            </a>
            <h1 class="page-title">Detail Agenda</h1>
        </div>
        <a href="{{ route('admin.kegiatan.edit', $kegiatan->id) }}" class="btn-edit">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-7M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Edit Agenda
        </a>
    </div>

    <div class="grid2">
        {{-- Kiri: Poster --}}
        <div class="card">
            <div class="poster-wrap">
                @if($kegiatan->gambar)
                    <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="poster-img">
                @else
                    <div class="poster-empty">
                        <span>🌿</span>
                        Tidak ada poster
                    </div>
                @endif
            </div>
            <div class="meta-section">
                <div>
                    <div class="meta-label">Status</div>
                    @if($kegiatan->status == 'aktif')
                        <span class="badge badge-aktif">Mendatang</span>
                    @else
                        <span class="badge badge-selesai">Selesai</span>
                    @endif
                </div>
                <div>
                    <div class="meta-label">Dibuat Pada</div>
                    <div class="meta-val">{{ $kegiatan->created_at->format('d M Y, H:i') }}</div>
                </div>
                <div>
                    <div class="meta-label">Terakhir Diubah</div>
                    <div class="meta-val">{{ $kegiatan->updated_at->format('d M Y, H:i') }}</div>
                </div>
            </div>
        </div>

        {{-- Kanan: Detail --}}
        <div class="card">
            <div class="detail-header">
                <h2 class="detail-title">{{ $kegiatan->judul }}</h2>
                <div class="tag-row">
                    <span class="tag tag-date">📅 {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</span>
                    <span class="tag tag-loc">📍 {{ $kegiatan->lokasi }}</span>
                </div>
            </div>
            <div class="desc-section">
                <div class="desc-label">Deskripsi Kegiatan</div>
                <div class="desc-content">{!! nl2br(e($kegiatan->deskripsi)) !!}</div>
            </div>
            <div class="action-footer">
                <form action="{{ route('admin.kegiatan.destroy', $kegiatan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-del">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus Agenda
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>