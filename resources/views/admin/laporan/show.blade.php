<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}
.topbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;flex-wrap:wrap;gap:10px;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e8e0d4;color:#6a5c48;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;}
.back-btn:hover{background:#f8f4ef;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0;letter-spacing:-0.3px;}
.btn-edit-lap{display:inline-flex;align-items:center;gap:6px;background:#f5ede4;color:#b07040;font-size:12px;font-weight:600;padding:9px 16px;border-radius:7px;text-decoration:none;border:1px solid #e8d8c4;}
.btn-edit-lap:hover{background:#b07040;color:#fff;border-color:#b07040;}

.grid2{display:grid;grid-template-columns:240px 1fr;gap:16px;align-items:start;}
.card{background:#fff;border-radius:12px;border:1px solid #e8e0d4;overflow:hidden;}

.meta-section{padding:16px;display:flex;flex-direction:column;gap:14px;}
.meta-label{font-size:9px;font-weight:700;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:3px;}
.meta-val{font-size:13px;font-weight:600;color:#2c2416;}
.meta-val.muted{color:#8a7a60;font-weight:400;}

.badge{display:inline-flex;padding:4px 11px;border-radius:20px;font-size:10px;font-weight:700;letter-spacing:0.4px;}
.badge-menunggu{background:#f5ede4;color:#b07040;border:1px solid #e8d8c4;}
.badge-diproses{background:#e8eff2;color:#406080;border:1px solid #c4d8e8;}
.badge-selesai{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;}
.badge-ditolak{background:#fbeaea;color:#b04040;border:1px solid #f0c8c8;}
.anonim-tag{display:inline-flex;background:#fbeaea;color:#b04040;font-size:10px;font-weight:600;padding:3px 9px;border-radius:10px;border:1px solid #f0c8c8;}

.detail-header{padding:20px 22px;border-bottom:1px solid #f0ece4;}
.detail-title{font-family:'DM Serif Display',serif;font-size:20px;color:#2c2416;margin:0 0 10px;letter-spacing:-0.3px;}
.tag-row{display:flex;flex-wrap:wrap;gap:7px;}
.tag{display:inline-flex;align-items:center;gap:5px;padding:5px 11px;border-radius:7px;font-size:12px;font-weight:600;}
.tag-sage{background:#edf2e8;color:#4a6535;}
.tag-clay{background:#f5ede4;color:#8a6040;}
.tag-stone{background:#f0ece4;color:#6a5c48;}

.detail-section{padding:18px 22px;border-bottom:1px solid #f0ece4;}
.detail-section:last-child{border-bottom:none;}
.section-label{font-size:10px;font-weight:700;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:10px;}
.section-content{font-size:13.5px;color:#5a4a38;line-height:1.8;}

.bukti-img{width:100%;max-width:320px;border-radius:10px;border:1px solid #e8e0d4;}
.bukti-empty{display:inline-flex;align-items:center;gap:6px;background:#f8f4ef;color:#b09e88;font-size:12px;padding:8px 14px;border-radius:7px;border:1px dashed #ddd5c8;}

.action-footer{padding:14px 22px;background:#f8f4ef;border-top:1px solid #f0ece4;display:flex;justify-content:flex-end;}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <div style="display:flex;align-items:center;gap:10px;">
            <a href="{{ route('admin.laporan.index') }}" class="back-btn">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Kembali
            </a>
            <h1 class="page-title">Detail Laporan #{{ $laporan->id }}</h1>
        </div>
        <a href="{{ route('admin.laporan.edit', $laporan->id) }}" class="btn-edit-lap">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-7M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Update Status
        </a>
    </div>

    <div class="grid2">
        {{-- Kiri: Metadata --}}
        <div class="card">
            <div class="meta-section">
                <div>
                    <div class="meta-label">Status</div>
                    @php
                        $badgeClass = match($laporan->status) {
                            'menunggu' => 'badge-menunggu',
                            'diproses' => 'badge-diproses',
                            'selesai'  => 'badge-selesai',
                            'ditolak'  => 'badge-ditolak',
                            default    => 'badge-menunggu',
                        };
                        $statusLabel = match($laporan->status) {
                            'menunggu' => 'Menunggu',
                            'diproses' => 'Diproses',
                            'selesai'  => 'Selesai',
                            'ditolak'  => 'Ditolak',
                            default    => ucfirst($laporan->status),
                        };
                    @endphp
                    <span class="badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                </div>
                <div>
                    <div class="meta-label">Pelapor</div>
                    <div class="meta-val">
                        @if($laporan->anonim)
                            <span class="anonim-tag">Anonim</span>
                        @else
                            {{ $laporan->user->name ?? 'User tidak ditemukan' }}
                        @endif
                    </div>
                </div>
                @if(!$laporan->anonim && $laporan->user)
                <div>
                    <div class="meta-label">Email</div>
                    <div class="meta-val muted">{{ $laporan->user->email }}</div>
                </div>
                @endif
                @if($laporan->no_hp)
                <div>
                    <div class="meta-label">No. WhatsApp</div>
                    <div class="meta-val">{{ $laporan->no_hp }}</div>
                </div>
                @endif
                @if($laporan->tanggal_kejadian)
                <div>
                    <div class="meta-label">Tanggal Kejadian</div>
                    <div class="meta-val">{{ \Carbon\Carbon::parse($laporan->tanggal_kejadian)->format('d M Y') }}</div>
                </div>
                @endif
                <div>
                    <div class="meta-label">Dilaporkan</div>
                    <div class="meta-val muted">{{ $laporan->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>

        {{-- Kanan: Detail --}}
        <div class="card">
            <div class="detail-header">
                <h2 class="detail-title">{{ $laporan->jenis_kasus }}</h2>
                <div class="tag-row">
                    @if($laporan->kategori)
                        <span class="tag tag-sage">{{ $laporan->kategori }}</span>
                    @endif
                    @if($laporan->lokasi)
                        <span class="tag tag-clay">📍 {{ $laporan->lokasi }}</span>
                    @endif
                </div>
            </div>

            <div class="detail-section">
                <div class="section-label">Kronologi Kejadian</div>
                <div class="section-content">{{ $laporan->kronologi }}</div>
            </div>

            @if($laporan->bukti)
            <div class="detail-section">
                <div class="section-label">Bukti / Lampiran</div>
                <img src="{{ asset('storage/' . $laporan->bukti) }}" class="bukti-img">
            </div>
            @else
            <div class="detail-section">
                <div class="section-label">Bukti / Lampiran</div>
                <div class="bukti-empty">🌿 Tidak ada bukti dilampirkan</div>
            </div>
            @endif

            <div class="action-footer">
                <a href="{{ route('admin.laporan.edit', $laporan->id) }}" class="btn-edit-lap">
                    Proses & Update Status →
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>