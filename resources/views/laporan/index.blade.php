<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}

.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 3px;letter-spacing:-0.3px;}
.page-sub{font-size:12px;color:#9e8e78;margin:0;}
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:#2c3325;color:#c8d9b0;font-size:12px;font-weight:600;padding:10px 18px;border-radius:7px;text-decoration:none;transition:opacity 0.15s;}
.btn-primary:hover{opacity:0.87;}

.alert-success{display:flex;align-items:center;gap:10px;background:#edf2e8;border:1px solid #c8d9b0;color:#4a6535;border-radius:9px;padding:11px 15px;margin-bottom:16px;font-size:13px;font-weight:600;}

/* Mini stats */
.mini-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:18px;}
.ms-card{background:#fff;border-radius:9px;border:1px solid #e0d8cc;padding:12px 15px;display:flex;align-items:center;gap:10px;}
.ms-ico{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;}
.ms-ico.g{background:#edf2e8;}
.ms-ico.c{background:#f5ede4;}
.ms-ico.b{background:#e8eff2;}
.ms-ico.s{background:#f0eee8;}
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

/* List */
.index-grid{display:grid;grid-template-columns:1fr 256px;gap:14px;align-items:start;}
.lap-list{display:flex;flex-direction:column;gap:8px;}

.lap-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;padding:14px 17px;display:flex;align-items:center;gap:13px;text-decoration:none;transition:all 0.15s;position:relative;}
.lap-card:hover{box-shadow:0 4px 14px rgba(44,35,22,0.08);border-color:#c8b8a8;transform:translateY(-1px);}
.lap-num{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#c8d9b0,#8fa67a);display:flex;align-items:center;justify-content:center;color:#2c3325;font-family:'DM Serif Display',serif;font-size:13px;font-weight:600;flex-shrink:0;}
.lap-info{flex:1;min-width:0;}
.lap-title{font-size:13.5px;font-weight:600;color:#2c2416;margin-bottom:3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.lap-meta{font-size:11px;color:#9e8e78;display:flex;align-items:center;gap:8px;flex-wrap:wrap;}
.lap-meta span{display:inline-flex;align-items:center;gap:3px;}
.lap-right{display:flex;flex-direction:column;align-items:flex-end;gap:5px;flex-shrink:0;}
.lap-date{font-size:10px;color:#b09e88;}
.badge{display:inline-flex;padding:3px 9px;border-radius:20px;font-size:10px;font-weight:700;letter-spacing:0.3px;}
.badge-menunggu{background:#f5ede4;color:#b07040;border:1px solid #e8d8c4;}
.badge-diproses{background:#e8eff2;color:#406080;border:1px solid #c4d8e8;}
.badge-selesai{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;}
.badge-ditolak{background:#fdf2f2;color:#8a4040;border:1px solid #e8c8c8;}
.lap-arrow{color:#d0c8bc;flex-shrink:0;}

.empty-state{background:#fff;border-radius:10px;border:1px solid #e0d8cc;padding:52px;text-align:center;}
.empty-icon{font-size:36px;margin-bottom:12px;}
.empty-title{font-family:'DM Serif Display',serif;font-size:16px;color:#2c2416;margin-bottom:6px;}
.empty-desc{font-size:13px;color:#9e8e78;margin-bottom:20px;}

/* Sidebar kanan */
.sidebar-right{display:flex;flex-direction:column;gap:12px;}
.side-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;}
.side-card-hd{padding:11px 15px;border-bottom:1px solid #f0ece4;font-family:'DM Serif Display',serif;font-size:13px;color:#2c2416;}
.side-card-body{padding:12px 15px;}

.info-row{display:flex;justify-content:space-between;align-items:center;padding:7px 0;border-bottom:1px solid #f5f0ea;font-size:12px;}
.info-row:last-child{border-bottom:none;}
.info-key{color:#9e8e78;}
.info-val{font-weight:600;color:#2c2416;}

.timeline-item{display:flex;gap:10px;padding:8px 0;position:relative;}
.timeline-item:last-child .tl-line{display:none;}
.tl-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;margin-top:4px;}
.tl-dot.g{background:#6b8c52;}
.tl-dot.c{background:#c4905a;}
.tl-dot.s{background:#b09e88;}
.tl-line{position:absolute;left:3px;top:14px;bottom:-8px;width:1px;background:#e8e0d4;}
.tl-title{font-size:12px;font-weight:600;color:#2c2416;margin-bottom:2px;}
.tl-desc{font-size:11px;color:#9e8e78;line-height:1.5;}
.tl-time{font-size:10px;color:#c0b09c;margin-top:2px;}

.dark-card{background:#2c3325;border-radius:10px;padding:16px;position:relative;overflow:hidden;}
.dark-card::before{content:'';position:absolute;top:-20px;right:-20px;width:80px;height:80px;background:rgba(143,166,122,0.15);border-radius:50%;}
.dark-card h4{font-family:'DM Serif Display',serif;font-size:14px;color:#e8e0d0;margin:0 0 5px;position:relative;}
.dark-card p{font-size:11.5px;color:rgba(255,255,255,0.3);margin:0 0 12px;line-height:1.6;position:relative;}
.dark-card a{display:block;background:#8fa67a;color:#fff;font-size:12px;font-weight:600;border:none;padding:10px;border-radius:7px;cursor:pointer;position:relative;text-align:center;text-decoration:none;transition:opacity 0.15s;}
.dark-card a:hover{opacity:0.88;}

@media(max-width:900px){.index-grid{grid-template-columns:1fr;}.mini-stats{grid-template-columns:repeat(2,1fr);}}
@media(max-width:600px){.pg-wrap{padding:16px;}.mini-stats{grid-template-columns:repeat(2,1fr);}}
</style>

<div class="pg-wrap">
    <div class="topbar">
    <div>
        <h1 class="page-title">Laporan Saya</h1>
        <p class="page-sub">{{ now()->translatedFormat('l, d F Y') }} &nbsp;·&nbsp; Total {{ $laporans->count() }} laporan</p>
    </div>

    <div style="display:flex;gap:10px;">
        <a href="{{ route('laporan.export.pdf') }}"
           class="btn-primary"
           style="background:#8b3a3a;color:white;">
            📄 Export PDF
        </a>

        <a href="{{ route('laporan.create') }}" class="btn-primary">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Buat Laporan
        </a>
    </div>
</div>

    @if(session('success'))
    <div class="alert-success"><span>🌿</span> {{ session('success') }}</div>
    @endif

    {{-- Mini Stats --}}
    @php
        $cTotal    = $laporans->count();
        $cMenunggu = $laporans->where('status','menunggu')->count();
        $cDiproses = $laporans->where('status','diproses')->count();
        $cSelesai  = $laporans->where('status','selesai')->count();
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
    </div>

    <div class="index-grid">
        <div>
            {{-- Filter --}}
            @php $filterStatus = request('status','semua'); @endphp
            <div class="filter-row">
                <a href="{{ route('laporan.index') }}" class="filter-btn {{ $filterStatus == 'semua' ? 'active' : '' }}">Semua <span class="filter-count">{{ $cTotal }}</span></a>
                <a href="{{ route('laporan.index', ['status'=>'menunggu']) }}" class="filter-btn f-menunggu {{ $filterStatus == 'menunggu' ? 'active' : '' }}">Menunggu <span class="filter-count">{{ $cMenunggu }}</span></a>
                <a href="{{ route('laporan.index', ['status'=>'diproses']) }}" class="filter-btn f-diproses {{ $filterStatus == 'diproses' ? 'active' : '' }}">Diproses <span class="filter-count">{{ $cDiproses }}</span></a>
                <a href="{{ route('laporan.index', ['status'=>'selesai']) }}"  class="filter-btn f-selesai  {{ $filterStatus == 'selesai'  ? 'active' : '' }}">Selesai <span class="filter-count">{{ $cSelesai }}</span></a>
            </div>

            {{-- List --}}
            <div class="lap-list">
                @php
                    $filtered = $filterStatus != 'semua'
                        ? $laporans->where('status', $filterStatus)
                        : $laporans;
                @endphp
                @forelse($filtered as $laporan)
                @php
                    $badgeClass = match($laporan->status) {
                        'diproses' => 'badge-diproses',
                        'selesai'  => 'badge-selesai',
                        'ditolak'  => 'badge-ditolak',
                        default    => 'badge-menunggu',
                    };
                    $statusLabel = match($laporan->status) {
                        'menunggu' => 'Menunggu', 'diproses' => 'Diproses',
                        'selesai'  => 'Selesai',  'ditolak'  => 'Ditolak',
                        default    => ucfirst($laporan->status),
                    };
                @endphp
                <a href="{{ route('laporan.show', $laporan->id) }}" class="lap-card">
                    <div class="lap-num">{{ $loop->iteration }}</div>
                    <div class="lap-info">
                        <div class="lap-title">{{ $laporan->jenis_kasus }}</div>
                        <div class="lap-meta">
                            @if($laporan->lokasi)<span>📍 {{ Str::limit($laporan->lokasi, 20) }}</span>@endif
                            @if($laporan->kategori)<span>🏷 {{ $laporan->kategori }}</span>@endif
                            @if($laporan->anonim)<span style="color:#c47a7a;">🔒 Anonim</span>@endif
                        </div>
                    </div>
                    <div class="lap-right">
                        <span class="badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                        <span class="lap-date">{{ $laporan->created_at->format('d M Y') }}</span>
                    </div>
                    <svg class="lap-arrow" width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                @empty
                <div class="empty-state">
                    <div class="empty-icon">🌿</div>
                    <div class="empty-title">Belum ada laporan</div>
                    <div class="empty-desc">{{ $filterStatus != 'semua' ? 'Tidak ada laporan dengan status ini.' : 'Laporan yang Anda ajukan akan muncul di sini.' }}</div>
                    @if($filterStatus == 'semua')
                    <a href="{{ route('laporan.create') }}" class="btn-primary" style="display:inline-flex;">Buat Laporan Pertama</a>
                    @endif
                </div>
                @endforelse
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="sidebar-right">

            {{-- Info akun --}}
            <div class="side-card">
                <div class="side-card-hd">Ringkasan Akun</div>
                <div class="side-card-body">
                    <div class="info-row">
                        <span class="info-key">Nama</span>
                        <span class="info-val">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Total Laporan</span>
                        <span class="info-val">{{ $cTotal }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Selesai Ditangani</span>
                        <span class="info-val" style="color:#6b8c52;">{{ $cSelesai }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Dalam Proses</span>
                        <span class="info-val" style="color:#b07040;">{{ $cDiproses + $cMenunggu }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-key">Bergabung</span>
                        <span class="info-val">{{ auth()->user()->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>

            {{-- Timeline terbaru --}}
            @if($laporans->count() > 0)
            <div class="side-card">
                <div class="side-card-hd">Aktivitas Terbaru</div>
                <div class="side-card-body">
                    @foreach($laporans->take(4) as $lap)
                    @php
                        $dotColor = match($lap->status) {
                            'selesai'  => 'g',
                            'diproses' => 'c',
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
                            <div class="tl-time">{{ $lap->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- CTA --}}
            <div class="dark-card">
                <h4>Ada hal baru untuk dilaporkan?</h4>
                <p>Jangan ragu. Setiap laporan membantu menciptakan lingkungan yang lebih aman.</p>
                <a href="{{ route('laporan.create') }}">＋ Buat Laporan Baru</a>
            </div>

        </div>
    </div>
</div>
</x-app-layout>