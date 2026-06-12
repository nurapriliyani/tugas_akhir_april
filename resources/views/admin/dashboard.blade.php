<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.adb-wrap{font-family:'DM Sans',sans-serif;padding:28px;min-height:100vh;}

.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;}
.greet h1{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 4px;letter-spacing:-0.3px;}
.greet h1 i{font-style:italic;color:#6b8c52;}
.greet p{font-size:12px;color:#9e8e78;margin:0;}
.server-pill{display:flex;align-items:center;gap:14px;background:#fff;border:1px solid #e0d8cc;border-radius:9px;padding:9px 16px;}
.sp-item{text-align:right;}
.sp-item:first-child{padding-right:14px;border-right:1px solid #ede5da;}
.sp-label{font-size:9px;font-weight:600;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:3px;}
.sp-val{font-size:12px;font-weight:600;color:#2c2416;display:flex;align-items:center;gap:5px;}
.pulse-dot{width:6px;height:6px;background:#6b8c52;border-radius:50%;animation:pulse 2s infinite;}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:0.5;transform:scale(1.3)}}

.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px;}
.sc{background:#fff;border-radius:10px;padding:15px 17px;border:1px solid #e0d8cc;position:relative;overflow:hidden;}
.sc .blob{position:absolute;top:-12px;right:-12px;width:58px;height:58px;border-radius:50%;opacity:0.12;}
.sc.v1{background:#2c3325;border-color:#2c3325;}
.sc.v1 .sc-label{color:rgba(255,255,255,0.38);}
.sc.v1 .sc-num{color:#e8e0d0;}
.sc.v1 .sc-sub{color:#8fa67a;}
.sc.v1 .blob{background:#8fa67a;opacity:0.2;}
.sc.v2 .blob{background:#c4905a;}
.sc.v3 .blob{background:#6a9e88;}
.sc.v4 .blob{background:#9a8ac4;}
.sc-label{font-size:10px;font-weight:600;color:#b09e88;letter-spacing:0.8px;text-transform:uppercase;margin-bottom:7px;}
.sc-num{font-family:'DM Serif Display',serif;font-size:28px;color:#2c2416;margin-bottom:3px;line-height:1;}
.sc-sub{font-size:11px;font-weight:500;}
.sage{color:#6b8c52;}.clay{color:#b07040;}.moss{color:#4a7060;}.plum{color:#7060a8;}

.mid-grid{display:grid;grid-template-columns:1fr 240px;gap:14px;}
.left-col{display:flex;flex-direction:column;gap:12px;}
.right-col{display:flex;flex-direction:column;gap:12px;}

.card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;}
.card-hd{padding:12px 17px;border-bottom:1px solid #ede5da;display:flex;align-items:center;justify-content:space-between;}
.card-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#2c2416;margin:0;}
.card-hd a{font-size:11px;color:#6b8c52;font-weight:600;text-decoration:none;background:#edf2e8;padding:3px 9px;border-radius:20px;}

.qa-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:9px;padding:14px;}
.qa-item{display:flex;flex-direction:column;gap:7px;padding:13px;border-radius:9px;background:#f8f4ef;border:1px solid #ede5da;text-decoration:none;transition:all 0.18s;}
.qa-item:hover{transform:translateY(-2px);box-shadow:0 4px 14px rgba(44,35,22,0.07);}
.qa-item.q1:hover{background:#edf2e8;border-color:#8fa67a;}
.qa-item.q2:hover{background:#f2ede8;border-color:#c4905a;}
.qa-item.q3:hover{background:#eeebf5;border-color:#9a8ac4;}
.qa-ico{width:34px;height:34px;background:#fff;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:15px;border:1px solid #ede5da;}
.qa-title{font-size:12.5px;font-weight:600;color:#2c2416;}
.qa-desc{font-size:11px;color:#9e8e78;}

.lap-item{display:flex;align-items:center;gap:10px;padding:10px 17px;border-bottom:1px solid #f5f0ea;}
.lap-item:last-child{border-bottom:none;}
.lap-avatar{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#c8d9b0,#8fa67a);display:flex;align-items:center;justify-content:center;color:#2c3325;font-size:11px;font-weight:700;flex-shrink:0;}
.lap-title{font-size:12.5px;font-weight:600;color:#2c2416;margin-bottom:2px;}
.lap-meta{font-size:11px;color:#9e8e78;}
.lap-badge{margin-left:auto;font-size:10px;font-weight:600;padding:3px 8px;border-radius:8px;white-space:nowrap;flex-shrink:0;}
.lb-menunggu{background:#f5ede4;color:#b07040;}
.lb-diproses{background:#e8eff2;color:#406080;}
.lb-selesai{background:#edf2e8;color:#5a7a40;}
.lb-ditolak{background:#fbeaea;color:#b04040;}

.st-row{display:flex;align-items:center;justify-content:space-between;padding:8px 10px;border-radius:8px;margin-bottom:5px;}
.st-row:last-child{margin-bottom:0;}
.st-row.s1{background:#edf2e8;}.st-row.s2{background:#f5ede4;}.st-row.s3{background:#e8f0ec;}.st-row.s4{background:#eeeaf5;}
.st-l{display:flex;align-items:center;gap:7px;font-size:12.5px;font-weight:500;color:#3c2e20;}
.dot{width:6px;height:6px;border-radius:50%;flex-shrink:0;}
.dot.g{background:#6b8c52;}.dot.c{background:#b07040;}.dot.m{background:#4a7060;}.dot.p{background:#7060a8;}
.st-n{font-family:'DM Serif Display',serif;font-size:16px;color:#2c2416;}

.prof-card{background:#2c3325;border-radius:10px;padding:18px;}
.prof-avatar{width:40px;height:40px;background:#8fa67a;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-family:'DM Serif Display',serif;font-size:16px;font-weight:600;flex-shrink:0;}
.prof-name{font-size:13px;font-weight:600;color:#e8e0d0;margin-bottom:2px;}
.prof-email{font-size:10px;color:rgba(255,255,255,0.28);}
.prof-row{display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.06);font-size:12px;}
.prof-row:last-child{border-bottom:none;padding-bottom:0;}
.prof-key{color:rgba(255,255,255,0.32);}
.prof-val{color:#c8d9b0;font-weight:600;}
.role-badge{background:rgba(143,166,122,0.18);color:#c8d9b0;font-size:9px;font-weight:700;padding:3px 8px;border-radius:6px;border:1px solid rgba(143,166,122,0.25);letter-spacing:0.5px;}

.help-card{background:#2c3325;border-radius:10px;padding:16px;position:relative;overflow:hidden;}
.help-card::before{content:'';position:absolute;top:-28px;right:-28px;width:90px;height:90px;background:rgba(143,166,122,0.14);border-radius:50%;}
.help-card h3{font-family:'DM Serif Display',serif;font-size:13px;color:#e8e0d0;margin:0 0 5px;position:relative;}
.help-card p{font-size:11px;color:rgba(255,255,255,0.28);margin:0 0 12px;line-height:1.6;position:relative;}
.help-card button{width:100%;background:#8fa67a;color:#fff;font-size:12px;font-weight:600;border:none;padding:9px;border-radius:7px;cursor:pointer;position:relative;}
.help-card button:hover{background:#7a9068;}

.empty-lap{text-align:center;padding:24px;color:#b09e88;font-size:13px;font-style:italic;}

@media(max-width:1024px){.mid-grid{grid-template-columns:1fr;}}
@media(max-width:768px){.stats{grid-template-columns:repeat(2,1fr);}.qa-grid{grid-template-columns:1fr;}}
@media(max-width:480px){.adb-wrap{padding:16px;}}
</style>

<div class="adb-wrap">

    <div class="topbar">
        <div class="greet">
            <h1>Selamat datang, <i>{{ auth()->user()->name }}</i> 🌿</h1>
            <p>{{ now()->translatedFormat('l, d F Y') }} &nbsp;·&nbsp; Admin Control Center</p>
        </div>
        <div class="server-pill">
            <div class="sp-item">
                <div class="sp-label">Status Server</div>
                <div class="sp-val"><span class="pulse-dot"></span> Online</div>
            </div>
            <div class="sp-item">
                <div class="sp-label">Waktu Sistem</div>
                <div class="sp-val">{{ now()->format('H:i') }} WIB</div>
            </div>
        </div>
    </div>

    <div class="stats">
        <div class="sc v1"><div class="blob"></div>
            <div class="sc-label">Total Laporan</div>
            <div class="sc-num">{{ $totalLaporan }}</div>
            <div class="sc-sub">Semua aduan masuk</div>
        </div>
        <div class="sc v2"><div class="blob"></div>
            <div class="sc-label">Menunggu</div>
            <div class="sc-num">{{ $totalMenunggu }}</div>
            <div class="sc-sub clay">Perlu ditinjau</div>
        </div>
        <div class="sc v3"><div class="blob"></div>
            <div class="sc-label">Selesai</div>
            <div class="sc-num">{{ $totalSelesai }}</div>
            <div class="sc-sub moss">Ditindaklanjuti</div>
        </div>
        <div class="sc v4"><div class="blob"></div>
            <div class="sc-label">Anggota</div>
            <div class="sc-num">{{ $totalUser }}</div>
            <div class="sc-sub plum">Pengguna aktif</div>
        </div>
    </div>

    <div class="mid-grid">
        <div class="left-col">

            <div class="card">
                <div class="card-hd"><h3>Navigasi Cepat</h3></div>
                <div class="qa-grid">
                    <a href="{{ route('admin.laporan.index') }}" class="qa-item q1">
                        <div class="qa-ico">📂</div>
                        <div><div class="qa-title">Laporan Masuk</div><div class="qa-desc">Lihat & kelola aduan</div></div>
                    </a>
                    <a href="{{ route('admin.kegiatan.index') }}" class="qa-item q2">
                        <div class="qa-ico">📅</div>
                        <div><div class="qa-title">Atur Agenda</div><div class="qa-desc">Update kegiatan komunitas</div></div>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="qa-item q3">
                        <div class="qa-ico">👥</div>
                        <div><div class="qa-title">Kelola User</div><div class="qa-desc">Atur akses & anggota</div></div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-hd">
                    <h3>Laporan Terbaru</h3>
                    <a href="{{ route('admin.laporan.index') }}">Lihat Semua</a>
                </div>
                @forelse($laporanTerbaru as $laporan)
                @php
                    $badgeClass = match($laporan->status) {
                        'diproses' => 'lb-diproses', 'selesai' => 'lb-selesai',
                        'ditolak'  => 'lb-ditolak',  default   => 'lb-menunggu',
                    };
                    $statusLabel = match($laporan->status) {
                        'menunggu' => 'Menunggu', 'diproses' => 'Diproses',
                        'selesai'  => 'Selesai',  'ditolak'  => 'Ditolak',
                        default    => ucfirst($laporan->status),
                    };
                @endphp
                <div class="lap-item">
                    <div class="lap-avatar">{{ strtoupper(substr($laporan->anonim ? 'A' : ($laporan->user->name ?? 'U'), 0, 1)) }}</div>
                    <div style="flex:1;min-width:0;">
                        <div class="lap-title">{{ Str::limit($laporan->jenis_kasus, 38) }}</div>
                        <div class="lap-meta">{{ $laporan->anonim ? 'Anonim' : ($laporan->user->name ?? '-') }} · {{ $laporan->created_at->diffForHumans() }}</div>
                    </div>
                    <span class="lap-badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                </div>
                @empty
                <div class="empty-lap">Belum ada laporan masuk.</div>
                @endforelse
            </div>

            <div class="card">
                <div class="card-hd"><h3>Ringkasan Statistik</h3></div>
                <div style="padding:12px 15px;">
                    <div class="st-row s1"><div class="st-l"><div class="dot g"></div>Total Laporan</div><div class="st-n">{{ $totalLaporan }}</div></div>
                    <div class="st-row s2"><div class="st-l"><div class="dot c"></div>Menunggu</div><div class="st-n">{{ $totalMenunggu }}</div></div>
                    <div class="st-row s3"><div class="st-l"><div class="dot m"></div>Selesai</div><div class="st-n">{{ $totalSelesai }}</div></div>
                    <div class="st-row s4"><div class="st-l"><div class="dot p"></div>Anggota</div><div class="st-n">{{ $totalUser }}</div></div>
                </div>
            </div>

        </div>

        <div class="right-col">

            <div class="prof-card">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px;padding-bottom:14px;border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div class="prof-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <div>
                        <div class="prof-name">{{ auth()->user()->name }}</div>
                        <div class="prof-email">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div>
                    <div class="prof-row"><span class="prof-key">Role</span><span class="role-badge">ADMINISTRATOR</span></div>
                    <div class="prof-row"><span class="prof-key">Status</span><span class="prof-val">Aktif</span></div>
                    <div class="prof-row"><span class="prof-key">Login</span><span class="prof-val">{{ now()->format('d M Y') }}</span></div>
                </div>
            </div>

            <div class="card">
                <div class="card-hd"><h3>Info Sistem</h3></div>
                <div style="padding:12px 15px;display:flex;flex-direction:column;gap:8px;">
                    <div style="display:flex;justify-content:space-between;font-size:12px;"><span style="color:#9e8e78;">Versi</span><span style="font-weight:600;color:#2c2416;">v1.0.0</span></div>
                    <div style="display:flex;justify-content:space-between;font-size:12px;"><span style="color:#9e8e78;">Framework</span><span style="font-weight:600;color:#2c2416;">Laravel {{ app()->version() }}</span></div>
                    <div style="display:flex;justify-content:space-between;font-size:12px;"><span style="color:#9e8e78;">Database</span><span style="font-weight:600;color:#6b8c52;">● Connected</span></div>
                    <div style="display:flex;justify-content:space-between;font-size:12px;"><span style="color:#9e8e78;">Total Kegiatan</span><span style="font-weight:600;color:#2c2416;">{{ $totalKegiatan }}</span></div>
                </div>
            </div>

            <div class="help-card">
                <h3>Butuh Bantuan?</h3>
                <p>Jika sistem mengalami kendala, hubungi tim teknis melalui tiket support.</p>
                <button type="button">Buka Tiket Support</button>
            </div>

        </div>
    </div>
</div>
</x-app-layout>