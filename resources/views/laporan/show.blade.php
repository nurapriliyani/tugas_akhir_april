<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}

.topbar{display:flex;align-items:center;gap:10px;margin-bottom:22px;flex-wrap:wrap;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e0d8cc;color:#6a5c48;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;transition:background 0.15s;}
.back-btn:hover{background:#f8f4ef;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0;letter-spacing:-0.3px;}

/* Progress stepper full */
.prog-stepper{background:#fff;border-radius:10px;border:1px solid #e0d8cc;padding:16px 22px;margin-bottom:16px;}
.ps-label{font-size:10px;font-weight:700;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:12px;}
.ps-track{display:flex;align-items:center;gap:0;}
.ps-step{display:flex;flex-direction:column;align-items:center;gap:5px;flex:1;}
.ps-circle{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;border:2px solid #e0d8cc;color:#c0b09c;background:#fff;transition:all 0.2s;}
.ps-circle.done{background:#8fa67a;border-color:#8fa67a;color:#fff;}
.ps-circle.current{background:#2c3325;border-color:#2c3325;color:#c8d9b0;}
.ps-circle.reject{background:#c47a7a;border-color:#c47a7a;color:#fff;}
.ps-name{font-size:10px;color:#b09e88;font-weight:600;text-align:center;}
.ps-name.done{color:#6b8c52;}
.ps-name.current{color:#2c2416;}
.ps-line{flex:1;height:2px;background:#e0d8cc;margin-bottom:16px;}
.ps-line.done{background:#8fa67a;}

.show-grid{display:grid;grid-template-columns:1fr 252px;gap:14px;align-items:start;}

.card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;}
.card-hd{padding:13px 18px;border-bottom:1px solid #f0ece4;display:flex;align-items:center;justify-content:space-between;}
.card-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#2c2416;margin:0;}

.detail-header{padding:18px 20px;border-bottom:1px solid #f0ece4;}
.detail-title{font-family:'DM Serif Display',serif;font-size:20px;color:#2c2416;margin:0 0 10px;letter-spacing:-0.3px;}
.tag-row{display:flex;flex-wrap:wrap;gap:6px;}
.tag{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;font-size:11.5px;font-weight:600;}
.tag-sage{background:#edf2e8;color:#4a6535;}
.tag-clay{background:#f5ede4;color:#8a6040;}
.tag-stone{background:#f0ece4;color:#6a5c48;}

.detail-section{padding:15px 20px;border-bottom:1px solid #f0ece4;}
.detail-section:last-child{border-bottom:none;}
.section-label{font-size:10px;font-weight:700;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:9px;}
.section-content{font-size:13.5px;color:#5a4a38;line-height:1.8;}
.bukti-img{width:100%;max-width:400px;border-radius:9px;border:1px solid #e0d8cc;cursor:zoom-in;}
.bukti-empty{display:inline-flex;align-items:center;gap:6px;background:#f8f4ef;color:#b09e88;font-size:12px;padding:8px 13px;border-radius:7px;border:1px dashed #ddd5c8;}

/* Sidebar */
.right-col{display:flex;flex-direction:column;gap:12px;}

.meta-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;padding:16px;}
.meta-group{margin-bottom:12px;padding-bottom:12px;border-bottom:1px solid #f5f0ea;}
.meta-group:last-child{margin-bottom:0;padding-bottom:0;border-bottom:none;}
.meta-label{font-size:9px;font-weight:700;color:#b09e88;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:4px;}
.meta-val{font-size:13px;font-weight:600;color:#2c2416;}
.meta-val.muted{color:#8a7a60;font-weight:400;font-size:12.5px;}

.badge{display:inline-flex;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:700;letter-spacing:0.3px;}
.badge-menunggu{background:#f5ede4;color:#b07040;border:1px solid #e8d8c4;}
.badge-diproses{background:#e8eff2;color:#406080;border:1px solid #c4d8e8;}
.badge-selesai{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;}
.badge-ditolak{background:#fdf2f2;color:#8a4040;border:1px solid #e8c8c8;}
.anonim-tag{display:inline-flex;background:#fdf2f2;color:#8a4040;font-size:10px;font-weight:600;padding:3px 9px;border-radius:10px;border:1px solid #e8c8c8;}

/* Timeline */
.timeline-wrap{padding:14px 16px;}
.tl-item{display:flex;gap:10px;padding:0 0 14px;position:relative;}
.tl-item:last-child{padding-bottom:0;}
.tl-left{display:flex;flex-direction:column;align-items:center;width:16px;flex-shrink:0;}
.tl-dot{width:10px;height:10px;border-radius:50%;border:2px solid;flex-shrink:0;}
.tl-dot.g{background:#6b8c52;border-color:#6b8c52;}
.tl-dot.c{background:#f5f0e8;border-color:#c4905a;}
.tl-dot.s{background:#f5f0e8;border-color:#c0b09c;}
.tl-connector{flex:1;width:1px;background:#e8e0d4;margin-top:3px;}
.tl-content{flex:1;padding-bottom:2px;}
.tl-title{font-size:12.5px;font-weight:600;color:#2c2416;margin-bottom:2px;}
.tl-desc{font-size:11.5px;color:#9e8e78;line-height:1.5;}
.tl-time{font-size:10px;color:#c0b09c;margin-top:3px;}

.dark-card{background:#2c3325;border-radius:10px;padding:16px;position:relative;overflow:hidden;}
.dark-card::before{content:'';position:absolute;top:-20px;right:-20px;width:80px;height:80px;background:rgba(143,166,122,0.15);border-radius:50%;}
.dark-card h4{font-family:'DM Serif Display',serif;font-size:13px;color:#e8e0d0;margin:0 0 5px;position:relative;}
.dark-card p{font-size:11px;color:rgba(255,255,255,0.3);margin:0 0 10px;line-height:1.6;position:relative;}
.contact-row{display:flex;align-items:center;gap:7px;padding:6px 0;border-bottom:1px solid rgba(255,255,255,0.06);position:relative;}
.contact-row:last-child{border-bottom:none;}
.cr-label{font-size:10px;color:rgba(255,255,255,0.28);}
.cr-val{font-size:12px;font-weight:600;color:#c8d9b0;}

@media(max-width:900px){.show-grid{grid-template-columns:1fr;}}
@media(max-width:600px){.pg-wrap{padding:16px;}}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <a href="{{ route('laporan.index') }}" class="back-btn">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <h1 class="page-title">Detail Laporan</h1>
    </div>

    @php
        $pct = match($laporan->status) {
            'menunggu' => 1, 'diproses' => 2,
            'selesai'  => 4, 'ditolak'  => 4,
            default    => 0,
        };
        $badgeClass = match($laporan->status) {
            'diproses' => 'badge-diproses', 'selesai'  => 'badge-selesai',
            'ditolak'  => 'badge-ditolak',  default    => 'badge-menunggu',
        };
        $statusLabel = match($laporan->status) {
            'menunggu' => 'Menunggu', 'diproses' => 'Diproses',
            'selesai'  => 'Selesai',  'ditolak'  => 'Ditolak',
            default    => ucfirst($laporan->status),
        };
        $steps = [
            ['label'=>'Diterima',     'done'=>$pct>=1, 'current'=>$pct==1],
            ['label'=>'Verifikasi',   'done'=>$pct>=2, 'current'=>$pct==2],
            ['label'=>'Tindak Lanjut','done'=>$pct>=3, 'current'=>$pct==3],
            ['label'=>'Selesai',      'done'=>$pct>=4, 'current'=>false],
        ];
    @endphp

    {{-- Progress Stepper --}}
    <div class="prog-stepper">
        <div class="ps-label">Progress Penanganan Laporan</div>
        <div class="ps-track">
            @foreach($steps as $i => $step)
                <div class="ps-step">
                    <div class="ps-circle {{ $step['done'] && $laporan->status != 'ditolak' ? 'done' : ($step['current'] ? 'current' : ($laporan->status == 'ditolak' && $step['done'] ? 'reject' : '')) }}">
                        @if($step['done'] && $laporan->status != 'ditolak')
                            <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        @else
                            {{ $i + 1 }}
                        @endif
                    </div>
                    <span class="ps-name {{ $step['done'] ? 'done' : ($step['current'] ? 'current' : '') }}">{{ $step['label'] }}</span>
                </div>
                @if(!$loop->last)
                    <div class="ps-line {{ $step['done'] ? 'done' : '' }}"></div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="show-grid">

        {{-- Kiri: Detail --}}
        <div class="card">
            <div class="detail-header">
                <h2 class="detail-title">{{ $laporan->jenis_kasus }}</h2>
                <div class="tag-row">
                    @if($laporan->kategori)
                        <span class="tag tag-sage">🏷 {{ $laporan->kategori }}</span>
                    @endif
                    @if($laporan->lokasi)
                        <span class="tag tag-clay">📍 {{ $laporan->lokasi }}</span>
                    @endif
                    @if($laporan->tanggal_kejadian)
                        <span class="tag tag-stone">📅 {{ \Carbon\Carbon::parse($laporan->tanggal_kejadian)->format('d M Y') }}</span>
                    @endif
                    @if($laporan->anonim)
                        <span class="tag" style="background:#fdf2f2;color:#8a4040;">🔒 Anonim</span>
                    @endif
                </div>
            </div>

            <div class="detail-section">
                <div class="section-label">Kronologi Kejadian</div>
                <div class="section-content">{{ $laporan->kronologi }}</div>
            </div>

            @if($laporan->no_hp)
            <div class="detail-section">
                <div class="section-label">No. WhatsApp / HP</div>
                <div class="section-content" style="font-size:13px;">{{ $laporan->no_hp }}</div>
            </div>
            @endif

            <div class="detail-section">
                <div class="section-label">Bukti / Lampiran</div>
                @if($laporan->bukti)
                    <img src="{{ asset('storage/' . $laporan->bukti) }}" class="bukti-img"
                         onclick="this.style.maxWidth=this.style.maxWidth?'':'100%'">
                    <p style="font-size:11px;color:#b09e88;margin-top:6px;">Klik gambar untuk memperbesar</p>
                @else
                    <div class="bukti-empty">🌿 Tidak ada bukti dilampirkan</div>
                @endif
            </div>
        </div>

        {{-- Kanan --}}
        <div class="right-col">

            {{-- Meta --}}
            <div class="meta-card">
                <div class="meta-group">
                    <div class="meta-label">Status Laporan</div>
                    <span class="badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                </div>
                <div class="meta-group">
                    <div class="meta-label">ID Laporan</div>
                    <div class="meta-val">#{{ str_pad($laporan->id, 4, '0', STR_PAD_LEFT) }}</div>
                </div>
                @if($laporan->kategori)
                <div class="meta-group">
                    <div class="meta-label">Kategori</div>
                    <div class="meta-val muted">{{ $laporan->kategori }}</div>
                </div>
                @endif
                @if($laporan->lokasi)
                <div class="meta-group">
                    <div class="meta-label">Lokasi</div>
                    <div class="meta-val muted">{{ $laporan->lokasi }}</div>
                </div>
                @endif
                @if($laporan->tanggal_kejadian)
                <div class="meta-group">
                    <div class="meta-label">Tanggal Kejadian</div>
                    <div class="meta-val muted">{{ \Carbon\Carbon::parse($laporan->tanggal_kejadian)->translatedFormat('d F Y') }}</div>
                </div>
                @endif
                <div class="meta-group">
                    <div class="meta-label">Dilaporkan</div>
                    <div class="meta-val muted">{{ $laporan->created_at->translatedFormat('d F Y, H:i') }}</div>
                </div>
                <div class="meta-group">
                    <div class="meta-label">Terakhir Diperbarui</div>
                    <div class="meta-val muted">{{ $laporan->updated_at->diffForHumans() }}</div>
                </div>
            </div>

            {{-- Timeline --}}
            <div class="card">
                <div class="card-hd"><h3>Riwayat Aktivitas</h3></div>
                <div class="timeline-wrap">
                    <div class="tl-item">
                        <div class="tl-left">
                            <div class="tl-dot g"></div>
                            @if($laporan->status != 'menunggu')<div class="tl-connector"></div>@endif
                        </div>
                        <div class="tl-content">
                            <div class="tl-title">Laporan Diterima</div>
                            <div class="tl-desc">Laporan Anda berhasil masuk ke sistem kami.</div>
                            <div class="tl-time">{{ $laporan->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @if(in_array($laporan->status, ['diproses','selesai','ditolak']))
                    <div class="tl-item">
                        <div class="tl-left">
                            <div class="tl-dot {{ in_array($laporan->status,['selesai','diproses']) ? 'g' : 'c' }}"></div>
                            @if(in_array($laporan->status, ['selesai','ditolak']))<div class="tl-connector"></div>@endif
                        </div>
                        <div class="tl-content">
                            <div class="tl-title">Sedang Diverifikasi</div>
                            <div class="tl-desc">Tim sedang meninjau laporan Anda.</div>
                            <div class="tl-time">{{ $laporan->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endif
                    @if($laporan->status == 'selesai')
                    <div class="tl-item">
                        <div class="tl-left">
                            <div class="tl-dot g"></div>
                        </div>
                        <div class="tl-content">
                            <div class="tl-title">Laporan Selesai Ditangani</div>
                            <div class="tl-desc">Kasus telah ditindaklanjuti oleh tim kami.</div>
                            <div class="tl-time">{{ $laporan->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endif
                    @if($laporan->status == 'ditolak')
                    <div class="tl-item">
                        <div class="tl-left">
                            <div class="tl-dot" style="background:#c47a7a;border-color:#c47a7a;"></div>
                        </div>
                        <div class="tl-content">
                            <div class="tl-title" style="color:#8a4040;">Laporan Ditolak</div>
                            <div class="tl-desc">Hubungi tim kami untuk informasi lebih lanjut.</div>
                            <div class="tl-time">{{ $laporan->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Kontak --}}
            <div class="dark-card">
                <h4>Butuh Bantuan?</h4>
                <p>Hubungi tim kami jika ada pertanyaan terkait laporan ini.</p>
                <div class="contact-row">
                    <span style="font-size:13px;">📞</span>
                    <div><div class="cr-label">Hotline</div><div class="cr-val">0800-xxx-xxxx</div></div>
                </div>
                <div class="contact-row">
                    <span style="font-size:13px;">💬</span>
                    <div><div class="cr-label">WhatsApp</div><div class="cr-val">0812-xxxx-xxxx</div></div>
                </div>
                <div class="contact-row">
                    <span style="font-size:13px;">🕐</span>
                    <div><div class="cr-label">Jam Operasional</div><div class="cr-val">08.00 – 17.00 WIB</div></div>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>