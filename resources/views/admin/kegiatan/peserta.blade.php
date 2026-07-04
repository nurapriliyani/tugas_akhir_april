<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}

.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e8e0d4;color:#6a5c48;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;font-family:'DM Sans',sans-serif;}
.back-btn:hover{background:#f8f4ef;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 3px;letter-spacing:-0.3px;}
.page-sub{font-size:12px;color:#9e8e78;margin:0;font-family:'DM Sans',sans-serif;}
.btn-export{display:inline-flex;align-items:center;gap:7px;background:#4a6535;color:#deecd0;font-size:12px;font-weight:600;padding:10px 18px;border-radius:7px;text-decoration:none;font-family:'DM Sans',sans-serif;}
.btn-export:hover{opacity:.87;}

/* Info kegiatan */
.info-banner{background:#2c3325;border-radius:12px;padding:18px 22px;margin-bottom:20px;display:flex;align-items:center;gap:18px;position:relative;overflow:hidden;}
.info-banner::before{content:'';position:absolute;top:-20px;right:-20px;width:100px;height:100px;background:rgba(143,166,122,.12);border-radius:50%;}
.ib-ico{width:48px;height:48px;border-radius:12px;background:rgba(143,166,122,.2);border:1px solid rgba(143,166,122,.3);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#c8d9b0;}
.ib-info{flex:1;position:relative;}
.ib-title{font-family:'DM Serif Display',serif;font-size:16px;color:#eee8dc;margin:0 0 5px;}
.ib-metas{display:flex;gap:16px;flex-wrap:wrap;}
.ib-meta{display:inline-flex;align-items:center;gap:5px;font-size:11px;color:rgba(200,217,176,.55);font-family:'DM Sans',sans-serif;}
.ib-meta strong{color:rgba(200,217,176,.8);font-weight:600;}
.ib-meta svg{flex-shrink:0;}
.ib-badge{background:rgba(143,166,122,.2);border:1px solid rgba(143,166,122,.3);color:#c8d9b0;font-size:12px;font-weight:700;padding:6px 16px;border-radius:20px;flex-shrink:0;position:relative;font-family:'DM Sans',sans-serif;}

/* Stats */
.mini-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:18px;}
.ms-card{background:#fff;border-radius:9px;border:1px solid #e0d8cc;padding:12px 16px;display:flex;align-items:center;gap:10px;}
.ms-ico{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.ms-ico.g{background:#edf2e8;color:#4a6535;} .ms-ico.b{background:#e8eff2;color:#3576a8;} .ms-ico.c{background:#f5ede4;color:#b07040;}
.ms-num{font-family:'DM Serif Display',serif;font-size:20px;color:#2c2416;line-height:1;}
.ms-lbl{font-size:10px;color:#b09e88;font-weight:600;text-transform:uppercase;letter-spacing:.5px;margin-top:2px;font-family:'DM Sans',sans-serif;}

/* Table */
.table-card{background:#fff;border-radius:12px;border:1px solid #e0d8cc;overflow:hidden;}
.table-hd{padding:14px 18px;border-bottom:1px solid #ede5da;display:flex;align-items:center;justify-content:space-between;}
.table-hd h3{font-family:'DM Serif Display',serif;font-size:15px;color:#2c2416;margin:0;}
.search-box{display:flex;align-items:center;gap:8px;background:#f5f0e8;border:1px solid #e0d8cc;border-radius:7px;padding:7px 12px;}
.search-box input{border:none;outline:none;background:transparent;font-size:12px;color:#2c2416;font-family:'DM Sans',sans-serif;width:160px;}
.search-box input::placeholder{color:#b09e88;}

table{width:100%;border-collapse:collapse;font-family:'DM Sans',sans-serif;}
thead tr{background:#f5f0e8;border-bottom:2px solid #e8e0d4;}
thead th{padding:10px 16px;text-align:left;font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:.7px;white-space:nowrap;}
tbody tr{border-bottom:1px solid #f0ece4;transition:background .12s;}
tbody tr:hover{background:#faf8f4;}
tbody tr:last-child{border-bottom:none;}
tbody td{padding:12px 16px;font-size:12.5px;color:#3a2e20;vertical-align:middle;}

.avatar{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#c8d9b0,#8fa67a);display:flex;align-items:center;justify-content:center;color:#2c3325;font-family:'DM Serif Display',serif;font-size:13px;font-weight:600;flex-shrink:0;}
.peserta-name{font-weight:600;color:#2c2416;}
.peserta-email{font-size:11px;color:#9e8e78;margin-top:1px;}

.catatan-text{font-size:11.5px;color:#6a5c48;font-style:italic;max-width:200px;display:inline-block;}

.wa-link{display:inline-flex;align-items:center;gap:5px;background:#edf8f0;color:#25a855;font-size:11px;font-weight:600;padding:5px 10px;border-radius:6px;text-decoration:none;border:1px solid #b8e8cc;font-family:'DM Sans',sans-serif;}
.wa-link:hover{background:#25D366;color:#fff;border-color:#25D366;}

.reg-date{font-size:11px;color:#b09e88;}

.empty-state{padding:52px;text-align:center;}
.empty-ico{width:56px;height:56px;border-radius:50%;background:#f0ece4;color:#b09e88;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;}
.empty-title{font-family:'DM Serif Display',serif;font-size:16px;color:#2c2416;margin-bottom:6px;}
.empty-desc{font-size:12.5px;color:#9e8e78;font-family:'DM Sans',sans-serif;}

.row-num{font-size:11px;color:#c0b09c;width:32px;}
</style>

<div class="pg-wrap">

    <div class="topbar">
        <div>
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
                <a href="{{ route('admin.kegiatan.index') }}" class="back-btn">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Kembali
                </a>
            </div>
            <h1 class="page-title">Daftar Peserta</h1>
            <p class="page-sub">{{ $kegiatan->judul }} &nbsp;·&nbsp; {{ $peserta->count() }} pendaftar</p>
        </div>
        <a href="{{ route('admin.kegiatan.peserta.export', $kegiatan->id) }}" class="btn-export">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
            Export PDF
        </a>
    </div>

    {{-- Info kegiatan --}}
    <div class="info-banner">
        <div class="ib-ico">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v2M8 21v-4a2 2 0 012-2h4a2 2 0 012 2v4"/></svg>
        </div>
        <div class="ib-info">
            <div class="ib-title">{{ $kegiatan->judul }}</div>
            <div class="ib-metas">
                <div class="ib-meta">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <strong>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</strong>
                </div>
                <div class="ib-meta">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <strong>{{ $kegiatan->lokasi }}</strong>
                </div>
                @if($kegiatan->wa_grup)
                <div class="ib-meta">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <a href="{{ $kegiatan->wa_grup }}" target="_blank" style="color:#8fa67a;font-weight:600;text-decoration:none;">Link Grup WA</a>
                </div>
                @endif
            </div>
        </div>
        <div class="ib-badge">{{ $peserta->count() }} Pendaftar</div>
    </div>

    {{-- Mini stats --}}
    @php
        $hari = \Carbon\Carbon::parse($kegiatan->tanggal)->diffInDays(now(), false);
        $statusKegiatan = $hari > 0 ? 'Sudah Berlangsung' : ($hari === 0 ? 'Hari Ini' : 'Akan Datang');
    @endphp
    <div class="mini-stats">
        <div class="ms-card">
            <div class="ms-ico g">
                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-4a4 4 0 11-8 0 4 4 0 018 0zm6 0a4 4 0 11-8 0"/></svg>
            </div>
            <div><div class="ms-num">{{ $peserta->count() }}</div><div class="ms-lbl">Total Pendaftar</div></div>
        </div>
        <div class="ms-card">
            <div class="ms-ico b">
                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div><div class="ms-num">{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M') }}</div><div class="ms-lbl">Tanggal Kegiatan</div></div>
        </div>
        <div class="ms-card">
            <div class="ms-ico c">
                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div><div class="ms-num" style="font-size:13px;padding-top:3px;">{{ $statusKegiatan }}</div><div class="ms-lbl">Status</div></div>
        </div>
    </div>

    {{-- Tabel peserta --}}
    <div class="table-card">
        <div class="table-hd">
            <h3>Daftar Pendaftar</h3>
            <div class="search-box">
                <svg width="13" height="13" fill="none" stroke="#b09e88" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/></svg>
                <input type="text" id="searchInput" placeholder="Cari nama atau HP..." onkeyup="filterTable()">
            </div>
        </div>

        @if($peserta->isEmpty())
        <div class="empty-state">
            <div class="empty-ico">
                <svg width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-4a4 4 0 11-8 0 4 4 0 018 0zm6 0a4 4 0 11-8 0"/></svg>
            </div>
            <div class="empty-title">Belum ada pendaftar</div>
            <div class="empty-desc">Belum ada yang mendaftar untuk kegiatan ini.</div>
        </div>
        @else
        <table id="pesertaTable">
            <thead>
                <tr>
                    <th class="row-num">#</th>
                    <th>Peserta</th>
                    <th>Nomor WA</th>
                    <th>Email</th>
                    <th>Catatan</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peserta as $i => $p)
                <tr>
                    <td class="row-num">{{ $i + 1 }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar">{{ strtoupper(substr($p->nama, 0, 1)) }}</div>
                            <div>
                                <div class="peserta-name">{{ $p->nama }}</div>
                                @if($p->user)
                                    <div class="peserta-email">Akun: {{ $p->user->email }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td style="font-weight:600;">{{ $p->no_hp }}</td>
                    <td style="color:#6a5c48;">{{ $p->email ?: '—' }}</td>
                    <td>
                        @if($p->catatan)
                            <span class="catatan-text">"{{ Str::limit($p->catatan, 60) }}"</span>
                        @else
                            <span style="color:#d0c8bc;">—</span>
                        @endif
                    </td>
                    <td>
                        <div class="reg-date">{{ $p->created_at->translatedFormat('d M Y') }}</div>
                        <div class="reg-date">{{ $p->created_at->format('H:i') }} WIB</div>
                    </td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->no_hp) }}" target="_blank" rel="noopener" class="wa-link">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.522 5.843L.054 23.215a.75.75 0 00.904.904l5.372-1.468A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.97 0-3.81-.538-5.387-1.473l-.386-.228-3.19.871.871-3.19-.228-.386A9.955 9.955 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                            Hubungi
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

</div>

<script>
function filterTable() {
    const q = document.getElementById('searchInput').value.toLowerCase();
    document.querySelectorAll('#pesertaTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
}
</script>
</x-app-layout>