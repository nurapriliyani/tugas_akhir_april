<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}
.topbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;flex-wrap:wrap;gap:12px;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 3px;letter-spacing:-0.3px;}
.page-sub{font-size:12px;color:#9e8e78;margin:0;}
.btn-group{display:flex;gap:8px;flex-wrap:wrap;}
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:#4a6535;color:#deecd0;font-size:12px;font-weight:600;padding:10px 18px;border-radius:7px;text-decoration:none;border:none;cursor:pointer;}
.btn-primary:hover{background:#3a5228;}

.alert-success{display:flex;align-items:center;gap:10px;background:#edf2e8;border:1px solid #c8d9b0;color:#4a6535;border-radius:10px;padding:12px 16px;margin-bottom:18px;font-size:13px;font-weight:600;}

.card{background:#fff;border-radius:12px;border:1px solid #e8e0d4;overflow:hidden;}
table{width:100%;border-collapse:collapse;}
thead{background:#f8f4ef;border-bottom:1px solid #ede5da;}
th{padding:11px 18px;font-size:10px;font-weight:700;color:#a89e88;text-transform:uppercase;letter-spacing:0.8px;text-align:left;}
th.right{text-align:right;}
tbody tr{border-bottom:1px solid #f5f0ea;transition:background 0.15s;}
tbody tr:last-child{border-bottom:none;}
tbody tr:hover{background:#faf7f3;}
td{padding:12px 18px;vertical-align:middle;}

.thumb{width:68px;height:48px;object-fit:cover;border-radius:8px;}
.thumb-empty{width:68px;height:48px;background:#f0ece4;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:18px;}

.item-title{font-size:13.5px;font-weight:600;color:#2c2416;margin-bottom:3px;}
.item-meta{font-size:11px;color:#9e8e78;}

.badge{display:inline-flex;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:700;letter-spacing:0.4px;}
.badge-aktif{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;}
.badge-selesai{background:#f0ece4;color:#8a7a60;border:1px solid #ddd5c8;}

.action-wrap{display:flex;justify-content:flex-end;gap:6px;}
.btn-icon{width:32px;height:32px;border-radius:7px;display:flex;align-items:center;justify-content:center;border:none;cursor:pointer;text-decoration:none;transition:all 0.15s;flex-shrink:0;}
.btn-view{background:#edf2e8;color:#4a6535;}.btn-view:hover{background:#4a6535;color:#fff;}
.btn-edit{background:#f5ede4;color:#b07040;}.btn-edit:hover{background:#b07040;color:#fff;}
.btn-del{background:#fbeaea;color:#b04040;}.btn-del:hover{background:#b04040;color:#fff;}

.empty-state{text-align:center;padding:48px;color:#b09e88;font-size:13px;font-style:italic;}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <div>
            <h1 class="page-title">Kelola Agenda Komunitas</h1>
            <p class="page-sub">{{ now()->translatedFormat('l, d F Y') }} &nbsp;·&nbsp; Total {{ $kegiatan->count() }} agenda</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('admin.kegiatan.export.pdf') }}" class="btn-primary" target="_blank">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
                Export PDF
            </a>
            <a href="{{ route('admin.kegiatan.create') }}" class="btn-primary">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Tambah Agenda
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert-success">
        <span>🌿</span> {{ session('success') }}
    </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Poster</th>
                    <th>Info Kegiatan</th>
                    <th>Status</th>
                    <th class="right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kegiatan as $item)
                <tr>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="thumb">
                        @else
                            <div class="thumb-empty">🌿</div>
                        @endif
                    </td>
                    <td>
                        <div class="item-title">{{ $item->judul }}</div>
                        <div class="item-meta">
                            📅 {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            &nbsp;·&nbsp;
                            📍 {{ $item->lokasi }}
                        </div>
                    </td>
                    <td>
                        @if($item->status == 'aktif')
                            <span class="badge badge-aktif">Mendatang</span>
                        @else
                            <span class="badge badge-selesai">Selesai</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-wrap">
                            <a href="{{ route('admin.kegiatan.show', $item->id) }}" class="btn-icon btn-view" title="Detail">
                                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <a href="{{ route('admin.kegiatan.edit', $item->id) }}" class="btn-icon btn-edit" title="Edit">
                                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-7M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            </a>
                            <form action="{{ route('admin.kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus agenda ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon btn-del" title="Hapus">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="empty-state">Belum ada agenda kegiatan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>