<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}

.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 3px;letter-spacing:-0.3px;}
.page-sub{font-size:12px;color:#9e8e78;margin:0;}

.btn-group{display:flex;gap:8px;flex-wrap:wrap;}
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:#4a6535;color:#deecd0;font-size:12px;font-weight:600;padding:10px 18px;border-radius:7px;text-decoration:none;border:none;cursor:pointer;transition:opacity 0.15s;}
.btn-primary:hover{opacity:0.87;}

.alert-success{display:flex;align-items:center;gap:10px;background:#edf2e8;border:1px solid #c8d9b0;color:#4a6535;border-radius:9px;padding:11px 15px;margin-bottom:16px;font-size:13px;font-weight:600;}

/* Mini stats */
.mini-stats{display:grid;grid-template-columns:repeat(5,1fr);gap:10px;margin-bottom:18px;}
.ms-card{background:#fff;border-radius:9px;border:1px solid #e0d8cc;padding:12px 15px;display:flex;align-items:center;gap:10px;}
.ms-ico{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;}
.ms-ico.g{background:#edf2e8;}
.ms-ico.c{background:#f5ede4;}
.ms-ico.b{background:#e8eff2;}
.ms-ico.s{background:#f0eee8;}
.ms-ico.r{background:#fbeaea;}
.ms-num{font-family:'DM Serif Display',serif;font-size:20px;color:#2c2416;line-height:1;}
.ms-lbl{font-size:10px;color:#b09e88;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-top:2px;}

/* Filter */
.filter-row{display:flex;align-items:center;gap:8px;margin-bottom:14px;flex-wrap:wrap;}
.filter-btn{font-size:12px;font-weight:600;padding:6px 14px;border-radius:20px;border:1.5px solid #e0d8cc;background:#fff;color:#8a7a60;cursor:pointer;text-decoration:none;transition:all 0.15s;}
.filter-btn:hover,.filter-btn.active{background:#2c3325;color:#c8d9b0;border-color:#2c3325;}
.filter-btn.f-menunggu.active{background:#f5ede4;color:#b07040;border-color:#e8d8c4;}
.filter-btn.f-diproses.active{background:#e8eff2;color:#406080;border-color:#c4d8e8;}
.filter-btn.f-selesai.active{background:#edf2e8;color:#4a6535;border-color:#c8d9b0;}
.filter-btn.f-ditolak.active{background:#fdf2f2;color:#8a4040;border-color:#e8c8c8;}
.filter-count{font-size:10px;margin-left:4px;opacity:0.7;}

/* Grid layout */
.index-grid{display:grid;grid-template-columns:1fr 256px;gap:14px;align-items:start;}
.lap-list{display:flex;flex-direction:column;gap:8px;}

/* Card */
.lap-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;padding:14px 17px;display:flex;align-items:center;gap:13px;transition:all 0.15s;position:relative;}
.lap-card:hover{box-shadow:0 4px 14px rgba(44,35,22,0.08);border-color:#c8b8a8;transform:translateY(-1px);}
.lap-num{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#c8d9b0,#8fa67a);display:flex;align-items:center;justify-content:center;color:#2c3325;font-family:'DM Serif Display',serif;font-size:13px;font-weight:600;flex-shrink:0;}
.lap-info{flex:1;min-width:0;}
.lap-title{font-size:13.5px;font-weight:600;color:#2c2416;margin-bottom:3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.lap-meta{font-size:11px;color:#9e8e78;display:flex;align-items:center;gap:8px;flex-wrap:wrap;}
.lap-right{display:flex;flex-direction:column;align-items:flex-end;gap:5px;flex-shrink:0;}
.lap-date{font-size:10px;color:#b09e88;}
.lap-actions{display:flex;align-items:center;gap:6px;margin-top:8px;}
.btn-action{display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:600;padding:5px 11px;border-radius:6px;text-decoration:none;transition:all 0.15s;}
.btn-detail{background:#edf2e8;color:#4a6535;}.btn-detail:hover{background:#4a6535;color:#fff;}
.btn-edit-lap{background:#f5ede4;color:#b07040;}.btn-edit-lap:hover{background:#b07040;color:#fff;}

.badge{display:inline-flex;padding:3px 9px;border-radius:20px;font-size:10px;font-weight:700;letter-spacing:0.3px;}
.badge-menunggu{background:#f5ede4;color:#b07040;border:1px solid #e8d8c4;}
.badge-diproses{background:#e8eff2;color:#406080;border:1px solid #c4d8e8;}
.badge-selesai{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;}
.badge-ditolak{background:#fdf2f2;color:#8a4040;border:1px solid #e8c8c8;}
.anonim-tag{display:inline-flex;background:#fbeaea;color:#b04040;font-size:9px;font-weight:600;padding:2px 7px;border-radius:10px;border:1px solid #f0c8c8;}

.empty-state{background:#fff;border-radius:10px;border:1px solid #e0d8cc;padding:52px;text-align:center;}
.empty-icon{font-size:36px;margin-bottom:12px;}
.empty-title{font-family:'DM Serif Display',serif;font-size:16px;color:#2c2416;margin-bottom:6px;}
.empty-desc{font-size:13px;color:#9e8e78;}

/* Sidebar */
.sidebar-right{display:flex;flex-direction:column;gap:12px;}
.side-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;}
.side-card-hd{padding:11px 15px;border-bottom:1px solid #f0ece4;font-family:'DM Serif Display',serif;font-size:13px;color:#2c2416;}
.side-card-body{padding:12px 15px;}

.info-row{display:flex;justify-content:space-between;align-items:center;padding:7px 0;border-bottom:1px solid #f5f0ea;font-size:12px;}
.info-row:last-child{border-bottom:none;}
.info-key{color:#9e8e78;}
.info-val{font-weight:600;color:#2c2416;}

/* Progress bar */
.prog-wrap{margin-bottom:10px;}
.prog-label{display:flex;justify-content:space-between;font-size:11px;margin-bottom:4px;}
.prog-label span:first-child{color:#6a5c48;font-weight:600;}
.prog-label span:last-child{color:#b09e88;}
.prog-bar-bg{background:#f0ece4;border-radius:10px;height:5px;overflow:hidden;}
.prog-bar{height:5px;border-radius:10px;transition:width 0.4s;}

/* Timeline */
.timeline-item{display:flex;gap:10px;padding:8px 0;position:relative;}
.tl-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;margin-top:4px;}
.tl-dot.g{background:#6b8c52;}
.tl-dot.c{background:#c4905a;}
.tl-dot.b{background:#5a80a0;}
.tl-dot.s{background:#b09e88;}
.tl-dot.r{background:#b04040;}
.tl-line{position:absolute;left:3px;top:14px;bottom:-8px;width:1px;background:#e8e0d4;}
.tl-title{font-size:12px;font-weight:600;color:#2c2416;margin-bottom:2px;}
.tl-sub{font-size:11px;color:#9e8e78;}
.tl-time{font-size:10px;color:#c0b09c;margin-top:2px;}

.dark-card{background:#2c3325;border-radius:10px;padding:16px;position:relative;overflow:hidden;}
.dark-card::before{content:'';position:absolute;top:-20px;right:-20px;width:80px;height:80px;background:rgba(143,166,122,0.15);border-radius:50%;}
.dark-card h4{font-family:'DM Serif Display',serif;font-size:14px;color:#e8e0d0;margin:0 0 5px;position:relative;}
.dark-card p{font-size:11.5px;color:rgba(255,255,255,0.3);margin:0 0 12px;line-height:1.6;position:relative;}
.dark-card a{display:block;background:#8fa67a;color:#fff;font-size:12px;font-weight:600;border:none;padding:10px;border-radius:7px;cursor:pointer;position:relative;text-align:center;text-decoration:none;transition:opacity 0.15s;}
.dark-card a:hover{opacity:0.88;}

@media(max-width:960px){.index-grid{grid-template-columns:1fr;}.mini-stats{grid-template-columns:repeat(3,1fr);}}
@media(max-width:600px){.pg-wrap{padding:16px;}.mini-stats{grid-template-columns:repeat(2,1fr);}.btn-group{width:100%;}.btn-primary{flex:1;justify-content:center;}}
</style>

<div class="pg-wrap">

    {{-- TOPBAR --}}
    <div class="topbar">
        <div>
            <h1 class="page-title">Kelola Laporan Masuk</h1>
            <p class="page-sub">{{ now()->translatedFormat('l, d F Y') }} &nbsp;·&nbsp; Total {{ $laporan->count() }} laporan</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('admin.laporan.export.pdf') }}" class="btn-primary" target="_blank">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
                Export PDF
            </a>
            <a href="{{ route('admin.laporan.create') }}" class="btn-primary">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Tambah Manual
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert-success"><span>🌿</span> {{ session('success') }}</div>
    @endif

    {{-- MINI STATS --}}
    @php
        $cTotal    = $laporan->count();
        $cMenunggu = $laporan->where('status','menunggu')->count();
        $cDiproses = $laporan->where('status','diproses')->count();
        $cSelesai  = $laporan->where('status','selesai')->count();
        $cDitolak  = $laporan->where('status','ditolak')->count();
    @endphp
    <div class="mini-stats">
        <div class="ms-card">
            <div class="ms-ico g">📄</div>
            <div><div class="ms-num">{{ $cTotal }}</div><div class="ms-lbl">Total</div></div>
        </div>
        <div class="ms-card">
            <div class="ms-ico s">⏳</div>
            <div><div class="ms-num">{{ $cMenunggu }}</div><div class="ms-lbl">Menunggu</div></div>
        </div>
        <div class="ms-card">
            <div class="ms-ico b">🔄</div>
            <div><div class="ms-num">{{ $cDiproses }}</div><div class="ms-lbl">Diproses</div></div>
        </div>
        <div class="ms-card">
            <div class="ms-ico g">✅</div>
            <div><div class="ms-num">{{ $cSelesai }}</div><div class="ms-lbl">Selesai</div></div>
        </div>
        <div class="ms-card">
            <div class="ms-ico r">❌</div>
            <div><div class="ms-num">{{ $cDitolak }}</div><div class="ms-lbl">Ditolak</div></div>
        </div>
    </div>

    <div class="index-grid">
        <div>
            {{-- FILTER --}}
            @php $filterStatus = request('status','semua'); @endphp
            <div class="filter-row">
                <a href="{{ route('admin.laporan.index') }}" class="filter-btn {{ $filterStatus == 'semua' ? 'active' : '' }}">Semua <span class="filter-count">{{ $cTotal }}</span></a>
                <a href="{{ route('admin.laporan.index', ['status'=>'menunggu']) }}" class="filter-btn f-menunggu {{ $filterStatus == 'menunggu' ? 'active' : '' }}">Menunggu <span class="filter-count">{{ $cMenunggu }}</span></a>
                <a href="{{ route('admin.laporan.index', ['status'=>'diproses']) }}" class="filter-btn f-diproses {{ $filterStatus == 'diproses' ? 'active' : '' }}">Diproses <span class="filter-count">{{ $cDiproses }}</span></a>
                <a href="{{ route('admin.laporan.index', ['status'=>'selesai']) }}"  class="filter-btn f-selesai  {{ $filterStatus == 'selesai'  ? 'active' : '' }}">Selesai <span class="filter-count">{{ $cSelesai }}</span></a>
                <a href="{{ route('admin.laporan.index', ['status'=>'ditolak']) }}"  class="filter-btn f-ditolak  {{ $filterStatus == 'ditolak'  ? 'active' : '' }}">Ditolak <span class="filter-count">{{ $cDitolak }}</span></a>
            </div>

            {{-- LIST --}}
            <div class="lap-list">
                @php
                    $filtered = $filterStatus != 'semua'
                        ? $laporan->where('status', $filterStatus)
                        : $laporan;
                @endphp
                @forelse($filtered as $item)
                @php
                    $badgeClass = match($item->status) {
                        'menunggu' => 'badge-menunggu',
                        'diproses' => 'badge-diproses',
                        'selesai'  => 'badge-selesai',
                        'ditolak'  => 'badge-ditolak',
                        default    => 'badge-menunggu',
                    };
                    $statusLabel = match($item->status) {
                        'menunggu' => 'Menunggu',
                        'diproses' => 'Diproses',
                        'selesai'  => 'Selesai',
                        'ditolak'  => 'Ditolak',
                        default    => ucfirst($item->status),
                    };
                @endphp
                <div class="lap-card">
                    <div class="lap-num">{{ $loop->iteration }}</div>
                    <div class="lap-info">
                        <div class="lap-title">{{ $item->jenis_kasus }}</div>
                        <div class="lap-meta">
                            <span>👤 <strong style="color:#5a4a38;">{{ $item->anonim ? 'Anonim' : ($item->user->name ?? 'User tidak ditemukan') }}</strong></span>
                            @if($item->anonim)<span class="anonim-tag">Anonim</span>@endif
                            @if($item->lokasi)<span>📍 {{ Str::limit($item->lokasi, 22) }}</span>@endif
                            @if($item->kategori)<span>🏷 {{ $item->kategori }}</span>@endif
                            <span style="color:#c0b09c;">{{ $item->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="lap-actions">
                            <a href="{{ route('admin.laporan.show', $item->id) }}" class="btn-action btn-detail">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Detail
                            </a>
                            <a href="{{ route('admin.laporan.edit', $item->id) }}" class="btn-action btn-edit-lap">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-7M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Update Status
                            </a>
                        </div>
                    </div>
                    <div class="lap-right">
                        <span class="badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                        <span class="lap-date">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <div class="empty-icon">🌿</div>
                    <div class="empty-title">Belum ada laporan</div>
                    <div class="empty-desc">{{ $filterStatus != 'semua' ? 'Tidak ada laporan dengan status ini.' : 'Belum ada laporan yang masuk ke sistem.' }}</div>
                </div>
                @endforelse
            </div>
        </div>

        {{-- SIDEBAR KANAN --}}
        <div class="sidebar-right">

            {{-- Ringkasan --}}
            <div class="side-card">
                <div class="side-card-hd">Ringkasan Laporan</div>
                <div class="side-card-body">
                    <div class="info-row">
                        <span class="info-key">Total Masuk</span>
                        <span class="info-val">{{ $cTotal }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Menunggu Review</span>
                        <span class="info-val" style="color:#b07040;">{{ $cMenunggu }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Sedang Diproses</span>
                        <span class="info-val" style="color:#406080;">{{ $cDiproses }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Selesai Ditangani</span>
                        <span class="info-val" style="color:#4a6535;">{{ $cSelesai }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Ditolak</span>
                        <span class="info-val" style="color:#8a4040;">{{ $cDitolak }}</span>
                    </div>
                </div>
            </div>

            {{-- Progress penanganan --}}
            @if($cTotal > 0)
            <div class="side-card">
                <div class="side-card-hd">Progress Penanganan</div>
                <div class="side-card-body">
                    @php
                        $pctSelesai  = round($cSelesai  / $cTotal * 100);
                        $pctDiproses = round($cDiproses / $cTotal * 100);
                        $pctMenunggu = round($cMenunggu / $cTotal * 100);
                    @endphp
                    <div class="prog-wrap">
                        <div class="prog-label"><span>Selesai</span><span>{{ $pctSelesai }}%</span></div>
                        <div class="prog-bar-bg"><div class="prog-bar" style="width:{{ $pctSelesai }}%;background:#6b8c52;"></div></div>
                    </div>
                    <div class="prog-wrap">
                        <div class="prog-label"><span>Diproses</span><span>{{ $pctDiproses }}%</span></div>
                        <div class="prog-bar-bg"><div class="prog-bar" style="width:{{ $pctDiproses }}%;background:#5a80a0;"></div></div>
                    </div>
                    <div class="prog-wrap" style="margin-bottom:0;">
                        <div class="prog-label"><span>Menunggu</span><span>{{ $pctMenunggu }}%</span></div>
                        <div class="prog-bar-bg"><div class="prog-bar" style="width:{{ $pctMenunggu }}%;background:#c4905a;"></div></div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Aktivitas terbaru --}}
            @if($laporan->count() > 0)
            <div class="side-card">
                <div class="side-card-hd">Laporan Terbaru</div>
                <div class="side-card-body">
                    @foreach($laporan->sortByDesc('created_at')->take(4) as $lap)
                    @php
                        $dotColor = match($lap->status) {
                            'selesai'  => 'g',
                            'diproses' => 'b',
                            'ditolak'  => 'r',
                            default    => 's',
                        };
                    @endphp
                    <div class="timeline-item">
                        <div style="position:relative;display:flex;flex-direction:column;align-items:center;">
                            <div class="tl-dot {{ $dotColor }}"></div>
                            @if(!$loop->last)<div class="tl-line"></div>@endif
                        </div>
                        <div style="flex:1;padding-bottom:6px;">
                            <div class="tl-title">{{ Str::limit($lap->jenis_kasus, 28) }}</div>
                            <div class="tl-sub">{{ $lap->anonim ? 'Anonim' : ($lap->user->name ?? '—') }}</div>
                            <div class="tl-time">{{ $lap->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- CTA --}}
            <div class="dark-card">
                <h4>Butuh input manual?</h4>
                <p>Tambahkan laporan langsung dari panel admin untuk laporan yang masuk di luar sistem.</p>
                <a href="{{ route('admin.laporan.create') }}">＋ Tambah Laporan Manual</a>
            </div>

        </div>
    </div>
</div>
</x-app-layout>