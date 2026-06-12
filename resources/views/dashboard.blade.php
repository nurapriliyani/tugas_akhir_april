<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap');
*{box-sizing:border-box;}

.db-wrap{font-family:'DM Sans',sans-serif;padding:28px;min-height:100vh;background:#faf8f5;}

/* ── Topbar ── */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;}
.greet h1{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 4px;letter-spacing:-0.3px;}
.greet h1 i{font-style:italic;color:#6b8c52;}
.greet p{font-size:12px;color:#9e8e78;margin:0;}
.topbar-right{display:flex;align-items:center;gap:8px;flex-wrap:wrap;}
.search-box{display:flex;align-items:center;gap:7px;background:#fff;border:1px solid #e0d8cc;border-radius:8px;padding:8px 12px;}
.search-box input{border:none;outline:none;font-size:12px;color:#2c2416;background:transparent;width:150px;font-family:'DM Sans',sans-serif;}
.search-box input::placeholder{color:#b09e88;}
.search-box svg{width:14px;height:14px;color:#b09e88;flex-shrink:0;}
.btn-lapor{background:#2c3325;color:#c8d9b0;font-size:12px;font-weight:600;border:none;padding:10px 18px;border-radius:7px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;text-decoration:none;white-space:nowrap;transition:opacity .15s;}
.btn-lapor:hover{opacity:.85;}

/* ── Quote ── */
.quote-bar{background:#2c3325;border-radius:10px;padding:13px 18px;display:flex;align-items:center;gap:12px;margin-bottom:18px;}
.q-icon{font-size:18px;flex-shrink:0;opacity:.6;}
.q-text{font-family:'DM Serif Display',serif;font-size:13px;font-style:italic;color:#c8d9b0;flex:1;line-height:1.6;margin:0 0 2px;}
.q-attr{font-size:10px;color:rgba(255,255,255,.22);margin:0;}

/* ── Stats ── */
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:18px;}
.sc{background:#fff;border-radius:10px;padding:15px 17px;border:1px solid #e0d8cc;position:relative;overflow:hidden;}
.sc .blob{position:absolute;top:-12px;right:-12px;width:56px;height:56px;border-radius:50%;opacity:.12;}
.sc.v1 .blob{background:#8fa67a;}
.sc.v2 .blob{background:#c4905a;}
.sc.v3 .blob{background:#6a9e88;}
.sc-label{font-size:10px;font-weight:600;color:#b09e88;letter-spacing:.8px;text-transform:uppercase;margin-bottom:7px;}
.sc-num{font-family:'DM Serif Display',serif;font-size:28px;color:#2c2416;margin-bottom:3px;line-height:1;}
.sc-sub{font-size:11px;font-weight:500;}
.sc-bar{height:3px;background:#ede5da;border-radius:3px;margin-top:10px;overflow:hidden;}
.sc-bar-fill{height:100%;border-radius:3px;}
.sage{color:#6b8c52;}.clay{color:#b07040;}.moss{color:#4a7060;}

/* ── Layout ── */
.mid-grid{display:grid;grid-template-columns:1fr 240px;gap:14px;}
.left-col{display:flex;flex-direction:column;gap:12px;}
.right-col{display:flex;flex-direction:column;gap:12px;}

/* ── Card ── */
.card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;}
.card-hd{padding:12px 17px;border-bottom:1px solid #ede5da;display:flex;align-items:center;justify-content:space-between;}
.card-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#2c2416;margin:0;}
.card-hd a{font-size:11px;color:#6b8c52;font-weight:600;text-decoration:none;background:#edf2e8;padding:3px 9px;border-radius:20px;}
.badge-new{font-size:10px;background:#edf2e8;color:#6b8c52;padding:2px 8px;border-radius:10px;font-weight:600;}

/* ── Filter tabs ── */
.filter-tabs{display:flex;gap:5px;}
.ftab{font-size:10px;font-weight:600;padding:3px 9px;border-radius:20px;border:1px solid #e0d8cc;cursor:pointer;color:#9e8e78;background:#fff;transition:all .15s;}
.ftab.active,.ftab:hover{background:#edf2e8;color:#6b8c52;border-color:#c8d9b0;}

/* ── Progress laporan ── */
.prog-wrap{padding:13px 17px;display:flex;flex-direction:column;gap:14px;}
.prog-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:5px;}
.prog-title{font-size:12.5px;font-weight:600;color:#2c2416;}
.prog-badge{font-size:10px;font-weight:600;padding:2px 8px;border-radius:10px;}
.pb-diproses{background:#f5ede4;color:#b07040;}
.pb-selesai{background:#edf2e8;color:#5a7a40;}
.pb-menunggu{background:#f0eee8;color:#8a7a60;}
.pb-ditolak{background:#fbeaea;color:#b04040;}
.prog-bar-bg{height:5px;background:#ede5da;border-radius:10px;overflow:hidden;}
.prog-bar-fill{height:100%;border-radius:10px;transition:width 1s ease;}
.fill-sage{background:#8fa67a;}.fill-clay{background:#c4905a;}
.fill-stone{background:#b09e88;}.fill-red{background:#c47a7a;}
.prog-meta{font-size:10px;color:#b09e88;margin-top:4px;}
.prog-meta span.done{color:#6b8c52;font-weight:600;}
.prog-date{font-size:10px;color:#b09e88;margin-top:3px;}

/* ── Agenda ── */
.agenda-item{display:flex;align-items:center;gap:10px;padding:11px 17px;border-bottom:1px solid #f5f0ea;cursor:pointer;transition:background .15s;position:relative;}
.agenda-item:last-child{border-bottom:none;}
.agenda-item:hover{background:#faf7f3;}
.agenda-item:hover .agenda-arrow{opacity:1;transform:translateX(0);}
.agenda-arrow{font-size:13px;color:#b09e88;margin-left:auto;flex-shrink:0;opacity:0;transform:translateX(-4px);transition:all .15s;}
.ai-ico{width:38px;height:38px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0;background:#edf2e8;transition:transform .15s;}
.agenda-item:hover .ai-ico{transform:scale(1.08);}
.ai-ttl{font-size:12.5px;font-weight:600;color:#2c2416;margin-bottom:2px;}
.ai-loc{font-size:11px;color:#9e8e78;}
.ai-date-badge{font-size:10px;font-weight:600;color:#6b8c52;background:#edf2e8;padding:3px 8px;border-radius:8px;white-space:nowrap;flex-shrink:0;margin-left:8px;}

/* ── Modal Agenda ── */
.modal-overlay{position:fixed;inset:0;z-index:300;background:rgba(20,26,17,.48);backdrop-filter:blur(5px);display:flex;align-items:center;justify-content:center;padding:20px;opacity:0;pointer-events:none;transition:opacity .25s;}
.modal-overlay.open{opacity:1;pointer-events:all;}
.modal-box{background:#fff;border-radius:16px;border:1px solid #e0d8cc;width:100%;max-width:460px;box-shadow:0 16px 48px rgba(37,51,32,.14);transform:translateY(18px) scale(.97);transition:transform .25s;overflow:hidden;}
.modal-overlay.open .modal-box{transform:translateY(0) scale(1);}
.modal-top{background:#2c3325;padding:22px 24px 20px;position:relative;overflow:hidden;}
.modal-top::before{content:'';position:absolute;top:-30px;right:-30px;width:110px;height:110px;background:rgba(143,166,122,.15);border-radius:50%;}
.modal-top::after{content:'';position:absolute;bottom:-20px;left:40px;width:70px;height:70px;background:rgba(143,166,122,.08);border-radius:50%;}
.modal-close{position:absolute;top:14px;right:14px;width:28px;height:28px;background:rgba(255,255,255,.1);border:none;border-radius:50%;cursor:pointer;color:rgba(255,255,255,.6);font-size:14px;display:flex;align-items:center;justify-content:center;transition:all .15s;z-index:1;}
.modal-close:hover{background:rgba(255,255,255,.18);color:#fff;}
.modal-ico-big{width:48px;height:48px;border-radius:12px;background:rgba(143,166,122,.2);border:1px solid rgba(143,166,122,.3);display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:12px;position:relative;z-index:1;}
.modal-event-title{font-family:'DM Serif Display',serif;font-size:17px;color:#e8e0d0;margin:0 0 6px;position:relative;z-index:1;line-height:1.3;padding-right:32px;}
.modal-event-tag{display:inline-block;font-size:10px;font-weight:600;background:rgba(143,166,122,.25);color:#c8d9b0;padding:3px 10px;border-radius:20px;border:1px solid rgba(143,166,122,.3);position:relative;z-index:1;}
.modal-body{padding:20px 24px;}
.modal-info-row{display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f0ece4;}
.modal-info-row:last-of-type{border-bottom:none;}
.mi-ico{width:30px;height:30px;border-radius:8px;background:#edf2e8;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;}
.mi-label{font-size:10px;color:#9e8e78;font-weight:600;text-transform:uppercase;letter-spacing:.6px;margin-bottom:2px;}
.mi-val{font-size:13px;color:#2c2416;font-weight:500;line-height:1.4;}
.modal-desc{background:#f8f4ef;border-radius:9px;padding:13px 15px;font-size:12.5px;color:#5a4a38;line-height:1.75;margin:14px 0 0;}
.modal-desc:empty{display:none;}
.modal-footer{padding:0 24px 22px;display:flex;gap:10px;}
.btn-modal-wa{flex:1;display:inline-flex;align-items:center;justify-content:center;gap:8px;background:#25D366;color:#fff;font-size:13px;font-weight:600;padding:11px 16px;border-radius:9px;text-decoration:none;transition:background .15s;}
.btn-modal-wa:hover{background:#1ebe5c;}
.btn-modal-close{padding:11px 18px;background:#fff;border:1.5px solid #e0d8cc;color:#8a7a60;font-size:13px;font-weight:600;border-radius:9px;cursor:pointer;font-family:'DM Sans',sans-serif;transition:background .15s;}
.btn-modal-close:hover{background:#f8f4ef;}

/* ── Timeline ── */
.timeline-wrap{padding:13px 17px;display:flex;flex-direction:column;gap:0;}
.tl-item{display:flex;gap:10px;padding-bottom:13px;position:relative;}
.tl-item:last-child{padding-bottom:0;}
.tl-item:not(:last-child)::before{content:'';position:absolute;left:10px;top:22px;bottom:0;width:1px;background:#ede5da;}
.tl-dot{width:22px;height:22px;border-radius:50%;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:10px;position:relative;z-index:1;}
.tl-dot.g{background:#edf2e8;color:#5a7a40;border:1.5px solid #c8d9b0;}
.tl-dot.c{background:#f5ede4;color:#b07040;border:1.5px solid #e8cdb0;}
.tl-dot.r{background:#fbeaea;color:#b04040;border:1.5px solid #f0c4c4;}
.tl-dot.s{background:#f0eee8;color:#8a7a60;border:1.5px solid #e0d8cc;}
.tl-body{flex:1;padding-top:2px;}
.tl-text{font-size:12px;color:#4a3c2c;line-height:1.5;}
.tl-time{font-size:10px;color:#b09e88;margin-top:2px;}
.tl-empty{text-align:center;padding:20px 0;color:#b09e88;font-size:12px;font-style:italic;}

/* ── CTA ── */
.cta-c{background:#2c3325;border-radius:10px;padding:18px;position:relative;overflow:hidden;}
.cta-c::before{content:'';position:absolute;top:-28px;right:-28px;width:90px;height:90px;background:rgba(143,166,122,.18);border-radius:50%;}
.cta-c h3{font-family:'DM Serif Display',serif;font-size:14px;color:#e8e0d0;margin:0 0 5px;position:relative;}
.cta-c p{font-size:11.5px;color:rgba(255,255,255,.3);margin:0 0 13px;line-height:1.6;position:relative;}
.cta-c a{display:block;width:100%;background:#8fa67a;color:#fff;font-size:12px;font-weight:600;border:none;padding:10px;border-radius:7px;cursor:pointer;position:relative;text-align:center;text-decoration:none;}
.cta-c a:hover{background:#7a9068;}

/* ── Notifikasi ── */
.notif-item{display:flex;align-items:flex-start;gap:9px;padding:9px 14px;border-bottom:1px solid #f5f0ea;}
.notif-item:last-child{border-bottom:none;}
.notif-dot{width:6px;height:6px;border-radius:50%;margin-top:5px;flex-shrink:0;}
.nd-green{background:#6b8c52;}.nd-clay{background:#b07040;}.nd-stone{background:#a89e8a;}
.notif-text{font-size:12px;color:#4a3c2c;line-height:1.5;flex:1;}
.notif-time{font-size:10px;color:#b09e88;margin-top:2px;}

/* ── Kalender ── */
.cal-wrap{padding:13px 14px;}
.cal-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;}
.cal-head h4{font-family:'DM Serif Display',serif;font-size:13px;color:#2c2416;margin:0;}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:2px;text-align:center;}
.cal-day-label{font-size:9px;font-weight:600;color:#b09e88;padding:2px 0;text-transform:uppercase;}
.cal-day{font-size:10.5px;color:#6a5c48;padding:3px 1px;border-radius:4px;position:relative;}
.cal-day.other{color:#d0c8bc;}
.cal-day.today{background:#2c3325;color:#c8d9b0;font-weight:600;border-radius:50%;width:20px;height:20px;display:flex;align-items:center;justify-content:center;margin:0 auto;}
.cal-day.has-event::after{content:'';position:absolute;bottom:1px;left:50%;transform:translateX(-50%);width:3px;height:3px;background:#8fa67a;border-radius:50%;}

/* ── Kontak Darurat ── */
.kontak-card{border-radius:10px;border:1px solid #f0d8c0;overflow:hidden;background:#fff9f4;}
.kontak-hd{padding:11px 16px;border-bottom:1px solid #f0d8c0;background:#fff9f4;}
.kontak-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#7c3d10;margin:0;}
.kontak-row{display:flex;align-items:center;gap:9px;padding:9px 15px;border-bottom:1px solid #fae8d4;}
.kontak-row:last-child{border-bottom:none;}
.kontak-ico{width:30px;height:30px;border-radius:7px;background:#fdecd8;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;}
.kontak-name{font-size:12px;font-weight:600;color:#7c3d10;}
.kontak-num{font-size:11px;color:#b07040;}

/* ── Tips ── */
.tips-card{border-radius:10px;border:1px solid #c4ddd2;overflow:hidden;background:#f0f8f4;}
.tips-hd{padding:11px 16px;border-bottom:1px solid #c4ddd2;background:#f0f8f4;}
.tips-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#2a5c42;margin:0;}
.tip-item{display:flex;align-items:flex-start;gap:8px;padding:9px 15px;border-bottom:1px solid #d4ece4;}
.tip-item:last-child{border-bottom:none;}
.tip-dot{width:18px;height:18px;border-radius:50%;background:#c4ddd2;display:flex;align-items:center;justify-content:center;font-size:9px;flex-shrink:0;margin-top:1px;color:#2a5c42;}
.tip-text{font-size:11.5px;color:#2a5c42;line-height:1.5;}

/* ── Chatbot ── */
.chatbot-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;}
.chatbot-head{background:#2c3325;padding:13px 17px;display:flex;align-items:center;gap:10px;position:relative;overflow:hidden;}
.chatbot-head::before{content:'';position:absolute;top:-20px;right:-20px;width:70px;height:70px;background:rgba(143,166,122,.15);border-radius:50%;}
.cb-ico{width:32px;height:32px;border-radius:50%;background:rgba(143,166,122,.2);border:1.5px solid rgba(143,166,122,.35);display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0;position:relative;z-index:1;}
.cb-info{flex:1;position:relative;z-index:1;}
.cb-name{font-family:'DM Serif Display',serif;font-size:13px;color:#e8e0d0;margin:0 0 1px;}
.cb-status{font-size:10px;color:rgba(200,217,176,.55);display:flex;align-items:center;gap:4px;}
.cb-status::before{content:'';width:5px;height:5px;border-radius:50%;background:#8fa67a;flex-shrink:0;}
.cb-msgs{height:240px;overflow-y:auto;padding:12px 13px 8px;display:flex;flex-direction:column;gap:8px;scroll-behavior:smooth;background:#faf8f5;}
.cb-msgs::-webkit-scrollbar{width:3px;}
.cb-msgs::-webkit-scrollbar-thumb{background:#e0d8cc;border-radius:3px;}
.cb-msg{display:flex;gap:7px;align-items:flex-end;max-width:92%;}
.cb-msg.bot{align-self:flex-start;}
.cb-msg.user{align-self:flex-end;flex-direction:row-reverse;}
.cb-msg-ico{width:24px;height:24px;border-radius:50%;background:#edf2e8;display:flex;align-items:center;justify-content:center;font-size:11px;flex-shrink:0;border:1px solid #d4e8c4;}
.cb-bubble{padding:7px 11px;border-radius:10px;font-size:12px;line-height:1.65;max-width:100%;word-break:break-word;}
.cb-msg.bot  .cb-bubble{background:#fff;color:#3a2e20;border:1px solid #ede5da;border-bottom-left-radius:3px;}
.cb-msg.user .cb-bubble{background:#2c3325;color:#c8d9b0;border-bottom-right-radius:3px;}
.cb-faq-wrap{padding:10px 13px 8px;display:flex;flex-wrap:wrap;gap:5px;background:#faf8f5;border-top:1px solid #f0ebe3;}
.cb-faq-label{width:100%;font-size:10px;font-weight:600;color:#b09e88;letter-spacing:.6px;text-transform:uppercase;margin-bottom:3px;}
.cb-faq-btn{font-size:11px;color:#6b8c52;background:#edf2e8;border:1px solid #c8d9b0;border-radius:20px;padding:4px 10px;cursor:pointer;transition:all .15s;font-family:'DM Sans',sans-serif;}
.cb-faq-btn:hover{background:#dcecd0;color:#4a6a35;}
.cb-input-wrap{padding:9px 11px;border-top:1px solid #ede5da;display:flex;gap:7px;align-items:center;background:#fff;}
.cb-input{flex:1;border:1px solid #e0d8cc;border-radius:18px;padding:7px 13px;font-size:12px;font-family:'DM Sans',sans-serif;color:#2c2416;outline:none;background:#faf8f5;transition:border-color .15s;}
.cb-input:focus{border-color:#8fa67a;}
.cb-input::placeholder{color:#b09e88;}
.cb-input:disabled{opacity:.5;cursor:not-allowed;}
.cb-send{width:30px;height:30px;border-radius:50%;background:#2c3325;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .15s;}
.cb-send:hover{background:#3a4430;}
.cb-send:disabled{opacity:.4;cursor:not-allowed;}
.cb-send svg{width:13px;height:13px;fill:none;stroke:#c8d9b0;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}
.cb-error{font-size:11px;color:#b04040;padding:6px 13px 8px;background:#faf8f5;text-align:center;}

/* ── Responsive ── */
@media(max-width:900px){.mid-grid{grid-template-columns:1fr;}}
@media(max-width:600px){.db-wrap{padding:16px;}.stats{grid-template-columns:1fr;}}
</style>

{{-- ── Modal Detail Agenda ── --}}
<div class="modal-overlay" id="agendaModal" onclick="if(event.target===this)closeAgenda()">
    <div class="modal-box">
        <div class="modal-top">
            <button class="modal-close" onclick="closeAgenda()">✕</button>
            <div class="modal-ico-big" id="modalIco">🌱</div>
            <div class="modal-event-title" id="modalTitle">—</div>
            <span class="modal-event-tag" id="modalTag">—</span>
        </div>
        <div class="modal-body">
            <div class="modal-info-row">
                <div class="mi-ico">📅</div>
                <div><div class="mi-label">Tanggal & Waktu</div><div class="mi-val" id="modalTanggal">—</div></div>
            </div>
            <div class="modal-info-row">
                <div class="mi-ico">📍</div>
                <div><div class="mi-label">Lokasi</div><div class="mi-val" id="modalLokasi">—</div></div>
            </div>
            <div class="modal-info-row" id="modalKategoriRow" style="display:none;">
                <div class="mi-ico">🏷️</div>
                <div><div class="mi-label">Kategori</div><div class="mi-val" id="modalKategori">—</div></div>
            </div>
            <div class="modal-desc" id="modalDeskripsi"></div>
        </div>
        <div class="modal-footer">
            <a id="modalWaLink" href="#" target="_blank" rel="noopener" class="btn-modal-wa">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.522 5.843L.054 23.215a.75.75 0 00.904.904l5.372-1.468A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.97 0-3.81-.538-5.387-1.473l-.386-.228-3.19.871.871-3.19-.228-.386A9.955 9.955 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                Saya Berminat
            </a>
            <button class="btn-modal-close" onclick="closeAgenda()">Tutup</button>
        </div>
    </div>
</div>

<div class="db-wrap">

    {{-- ── Topbar ── --}}
    <div class="topbar">
        <div class="greet">
            <h1>Halo, <i>{{ auth()->user()->name }}</i> 🌿</h1>
            <p>{{ now()->translatedFormat('l, d F Y') }} &nbsp;·&nbsp; Semoga harimu tenang dan bermakna</p>
        </div>
        <div class="topbar-right">
            <form method="GET" action="{{ route('laporan.index') }}" style="display:flex;">
                <div class="search-box">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/></svg>
                    <input type="text" name="search" placeholder="Cari laporan..." value="{{ request('search') }}">
                </div>
            </form>
            <a href="{{ route('laporan.create') }}" class="btn-lapor">＋ Buat Laporan</a>
        </div>
    </div>

    {{-- ── Quote ── --}}
    <div class="quote-bar">
        <div class="q-icon">🌱</div>
        <div>
            <p class="q-text" id="quoteText"></p>
            <p class="q-attr" id="quoteAttr"></p>
        </div>
    </div>

    {{-- ── Stats ── --}}
    @php
        $pctTotal    = $totalLaporan > 0 ? 100 : 0;
        $pctMenunggu = $totalLaporan > 0 ? round(($totalMenunggu / $totalLaporan) * 100) : 0;
        $pctSelesai  = $totalLaporan > 0 ? round(($totalSelesai  / $totalLaporan) * 100) : 0;
    @endphp
    <div class="stats">
        <div class="sc v1"><div class="blob"></div>
            <div class="sc-label">Total Laporan</div>
            <div class="sc-num">{{ $totalLaporan ?? 0 }}</div>
            <div class="sc-sub sage">Semua laporan</div>
            <div class="sc-bar"><div class="sc-bar-fill" style="width:{{ $pctTotal }}%;background:#8fa67a;"></div></div>
        </div>
        <div class="sc v2"><div class="blob"></div>
            <div class="sc-label">Diproses</div>
            <div class="sc-num">{{ $totalMenunggu ?? 0 }}</div>
            <div class="sc-sub clay">Sedang ditangani</div>
            <div class="sc-bar"><div class="sc-bar-fill" style="width:{{ $pctMenunggu }}%;background:#c4905a;"></div></div>
        </div>
        <div class="sc v3"><div class="blob"></div>
            <div class="sc-label">Selesai</div>
            <div class="sc-num">{{ $totalSelesai ?? 0 }}</div>
            <div class="sc-sub moss">Ditindaklanjuti</div>
            <div class="sc-bar"><div class="sc-bar-fill" style="width:{{ $pctSelesai }}%;background:#6a9e88;"></div></div>
        </div>
    </div>

    <div class="mid-grid">
        <div class="left-col">

            {{-- ── Status Laporan ── --}}
            <div class="card">
                <div class="card-hd">
                    <h3>Status Laporan Saya</h3>
                    <div class="filter-tabs">
                        <span class="ftab active" data-filter="all">Semua</span>
                        <span class="ftab" data-filter="aktif">Aktif</span>
                        <span class="ftab" data-filter="selesai">Selesai</span>
                    </div>
                </div>
                <div class="prog-wrap" id="laporanList">
                    @forelse($laporanTerbaru ?? [] as $laporan)
                    @php
                        $pct = match($laporan->status) {
                            'menunggu' => 25, 'diproses' => 60,
                            'selesai'  => 100, 'ditolak'  => 100, default => 10,
                        };
                        $fillClass  = match($laporan->status) {
                            'selesai' => 'fill-sage', 'diproses' => 'fill-clay',
                            'ditolak' => 'fill-red',  default    => 'fill-stone',
                        };
                        $badgeClass = match($laporan->status) {
                            'selesai' => 'pb-selesai', 'diproses' => 'pb-diproses',
                            'ditolak' => 'pb-ditolak', default    => 'pb-menunggu',
                        };
                        $statusLabel = match($laporan->status) {
                            'menunggu' => 'Menunggu', 'diproses' => 'Diproses',
                            'selesai'  => 'Selesai',  'ditolak'  => 'Ditolak',
                            default    => ucfirst($laporan->status),
                        };
                        $isAktif = in_array($laporan->status, ['menunggu','diproses']);
                    @endphp
                    <div class="lap-prog-item"
                         data-status="{{ $laporan->status }}"
                         data-aktif="{{ $isAktif ? '1' : '0' }}">
                        <div class="prog-top">
                            <div class="prog-title">{{ Str::limit($laporan->jenis_kasus, 42) }}</div>
                            <span class="prog-badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                        </div>
                        <div class="prog-bar-bg">
                            <div class="prog-bar-fill {{ $fillClass }}" style="width:{{ $pct }}%"></div>
                        </div>
                        <div class="prog-meta">
                            <span class="{{ $pct >= 25  ? 'done' : '' }}">Diterima</span> →
                            <span class="{{ $pct >= 60  ? 'done' : '' }}">Verifikasi</span> →
                            <span class="{{ $pct >= 80  ? 'done' : '' }}">Tindak Lanjut</span> →
                            <span class="{{ $pct >= 100 ? 'done' : '' }}">Selesai</span>
                        </div>
                        <div class="prog-date">Dilaporkan {{ $laporan->created_at->diffForHumans() }}</div>
                    </div>
                    @empty
                    <div class="tl-empty" style="padding:24px 0;">
                        Belum ada laporan. <a href="{{ route('laporan.create') }}" style="color:#6b8c52;font-weight:600;">Buat sekarang</a>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- ── Agenda Komunitas ── --}}
            <div class="card">
                <div class="card-hd">
                    <h3>Agenda Komunitas</h3>
                    <a href="#">Lihat Semua</a>
                </div>
                @php $icons = ['🌱','🍂','🌾','🌿','🌺']; @endphp
                @forelse($kegiatans as $kegiatan)
                @php
                    $diffLabel = \Carbon\Carbon::parse($kegiatan->tanggal)->diffForHumans();
                    $isSoon = \Carbon\Carbon::parse($kegiatan->tanggal)->isFuture()
                              && \Carbon\Carbon::parse($kegiatan->tanggal)->diffInDays(now()) <= 7;
                @endphp
                <div class="agenda-item"
                     onclick="openAgenda(
                         '{{ $icons[$loop->index % count($icons)] }}',
                         '{{ addslashes($kegiatan->judul) }}',
                         '{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('l, d F Y') }}',
                         '{{ addslashes($kegiatan->lokasi) }}',
                         '{{ addslashes($kegiatan->deskripsi ?? '') }}',
                         '{{ addslashes($kegiatan->kategori ?? '') }}',
                         '{{ $diffLabel }}',
                         '{{ addslashes($kegiatan->judul) }}'
                     )">
                    <div class="ai-ico">{{ $icons[$loop->index % count($icons)] }}</div>
                    <div style="flex:1;min-width:0;">
                        <div class="ai-ttl">{{ $kegiatan->judul }}</div>
                        <div class="ai-loc">📍 {{ $kegiatan->lokasi }} &nbsp;·&nbsp; {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d M Y') }}</div>
                    </div>
                    @if($isSoon)
                        <span class="ai-date-badge" style="background:#fdf6ec;color:#b07040;border:1px solid #f0d8a8;">🔔 Segera</span>
                    @else
                        <span class="ai-date-badge">{{ $diffLabel }}</span>
                    @endif
                    <span class="agenda-arrow">›</span>
                </div>
                @empty
                <div class="tl-empty" style="padding:28px;">Belum ada agenda baru.</div>
                @endforelse
            </div>

            {{-- ── Riwayat Aktivitas ── --}}
            <div class="card">
                <div class="card-hd"><h3>Riwayat Aktivitas</h3></div>
                <div class="timeline-wrap">
                    @forelse($notifikasi ?? [] as $notif)
                    @php
                        $dotClass = match($notif->type ?? '') {
                            'selesai' => 'g', 'diproses' => 'c', 'ditolak' => 'r', default => 's',
                        };
                        $dotIcon = match($notif->type ?? '') {
                            'selesai' => '✓', 'diproses' => '→', 'ditolak' => '✕', default => '•',
                        };
                    @endphp
                    <div class="tl-item">
                        <div class="tl-dot {{ $dotClass }}">{{ $dotIcon }}</div>
                        <div class="tl-body">
                            <div class="tl-text">{!! $notif->pesan !!}</div>
                            <div class="tl-time">{{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="tl-empty">Belum ada aktivitas tercatat.</div>
                    @endforelse
                </div>
            </div>

        </div>{{-- /left-col --}}

        <div class="right-col">

            {{-- ── CTA ── --}}
            <div class="cta-c">
                <h3>Ada yang ingin kamu ceritakan?</h3>
                <p>Laporanmu dijaga kerahasiaannya dan ditangani sepenuh hati oleh tim kami.</p>
                <a href="{{ route('laporan.create') }}">Buat Laporan Sekarang</a>
            </div>

            {{-- ── Notifikasi ── --}}
            <div class="card">
                <div class="card-hd">
                    <h3>Notifikasi</h3>
                    @if(isset($notifikasiCount) && $notifikasiCount > 0)
                        <span class="badge-new">{{ $notifikasiCount }} baru</span>
                    @endif
                </div>
                @forelse($notifikasi ?? [] as $notif)
                @php
                    $dotClass = match($notif->type ?? '') {
                        'selesai' => 'nd-green', 'diproses' => 'nd-clay', default => 'nd-stone',
                    };
                @endphp
                <div class="notif-item">
                    <div class="notif-dot {{ $dotClass }}"></div>
                    <div>
                        <div class="notif-text">{!! $notif->pesan !!}</div>
                        <div class="notif-time">{{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</div>
                    </div>
                </div>
                @empty
                <div class="tl-empty" style="padding:18px;">Tidak ada notifikasi.</div>
                @endforelse
            </div>

            {{-- ══════════════════════════════════
                 CHATBOT — Groq AI (gratis)
                 ══════════════════════════════════ --}}
            <div class="chatbot-card">
                <div class="chatbot-head">
                    <div class="cb-ico">🌿</div>
                    <div class="cb-info">
                        <div class="cb-name">Asisten Selendang Puan</div>
                        <div class="cb-status" id="cbStatusText">Siap membantu kamu</div>
                    </div>
                </div>

                <div class="cb-msgs" id="cbMsgs">
                    <div class="cb-msg bot">
                        <div class="cb-msg-ico">🌿</div>
                        <div class="cb-bubble">
                            Halo, <strong>{{ auth()->user()->name }}</strong>! 👋<br>
                            Saya siap menjawab pertanyaan apapun tentang platform ini. Silakan tanya bebas atau pilih topik di bawah.
                        </div>
                    </div>
                </div>

                <div class="cb-faq-wrap" id="cbFaqWrap">
                    <div class="cb-faq-label">Mulai dari sini</div>
                    <button class="cb-faq-btn" onclick="cbAsk('Bagaimana cara membuat laporan?')">📝 Cara membuat laporan</button>
                    <button class="cb-faq-btn" onclick="cbAsk('Apakah laporan saya aman dan anonim?')">🔒 Keamanan laporan</button>
                    <button class="cb-faq-btn" onclick="cbAsk('Berapa lama laporan saya diproses?')">⏳ Lama proses</button>
                    <button class="cb-faq-btn" onclick="cbAsk('Apa saja kontak darurat yang bisa dihubungi?')">🆘 Kontak darurat</button>
                    <button class="cb-faq-btn" onclick="cbAsk('Apa saja jenis laporan yang bisa dibuat?')">📋 Jenis laporan</button>
                </div>

                <div class="cb-input-wrap">
                    <input type="text" class="cb-input" id="cbInput"
                           placeholder="Ketik pertanyaan apapun..."
                           onkeydown="if(event.key==='Enter' && !event.shiftKey)cbSend()"/>
                    <button class="cb-send" id="cbSendBtn" onclick="cbSend()">
                        <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </div>
            </div>
            {{-- /chatbot --}}

            {{-- ── Kalender ── --}}
            <div class="card">
                <div class="cal-wrap">
                    <div class="cal-head">
                        <h4>{{ now()->translatedFormat('F Y') }}</h4>
                        <span>🗓</span>
                    </div>
                    <div class="cal-grid">
                        @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $d)
                            <div class="cal-day-label">{{ $d }}</div>
                        @endforeach
                        @php
                            $start      = now()->startOfMonth();
                            $totalDays  = now()->daysInMonth;
                            $startDow   = ($start->dayOfWeek + 6) % 7;
                            $prevDays   = $start->copy()->subMonth()->daysInMonth;
                            $eventDates = $kegiatans->map(fn($k) => \Carbon\Carbon::parse($k->tanggal)->day)->toArray();
                        @endphp
                        @for($i = $startDow - 1; $i >= 0; $i--)
                            <div class="cal-day other">{{ $prevDays - $i }}</div>
                        @endfor
                        @for($d = 1; $d <= $totalDays; $d++)
                            @php $cls = $d === (int)now()->format('j') ? 'today' : (in_array($d, $eventDates) ? 'has-event' : ''); @endphp
                            <div class="cal-day {{ $cls }}">{{ $d }}</div>
                        @endfor
                        @php $filled = $startDow + $totalDays; $rem = $filled % 7 === 0 ? 0 : 7 - ($filled % 7); @endphp
                        @for($d = 1; $d <= $rem; $d++)
                            <div class="cal-day other">{{ $d }}</div>
                        @endfor
                    </div>
                </div>
            </div>

            {{-- ── Kontak Darurat ── --}}
            <div class="kontak-card">
                <div class="kontak-hd"><h3>🆘 Kontak Darurat</h3></div>
                <div class="kontak-row">
                    <div class="kontak-ico">📞</div>
                    <div><div class="kontak-name">Hotline SAPA</div><div class="kontak-num">119 ext 8</div></div>
                </div>
                <div class="kontak-row">
                    <div class="kontak-ico">💬</div>
                    <div><div class="kontak-name">Komnas Perempuan</div><div class="kontak-num">(021) 390-3963</div></div>
                </div>
                <div class="kontak-row">
                    <div class="kontak-ico">🏛️</div>
                    <div><div class="kontak-name">LBH APIK Jakarta</div><div class="kontak-num">(021) 788-42580</div></div>
                </div>
                <div style="padding:12px 15px;">
                    <a href="https://wa.me/6281779080524?text=Halo%20Selendang%20Puan%2C%20saya%20butuh%20bantuan%20darurat."
                       target="_blank" rel="noopener"
                       style="display:flex;align-items:center;justify-content:center;gap:8px;width:100%;background:#25D366;color:#fff;font-size:12px;font-weight:600;padding:9px 14px;border-radius:8px;text-decoration:none;"
                       onmouseover="this.style.background='#1ebe5c'" onmouseout="this.style.background='#25D366'">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.522 5.843L.054 23.215a.75.75 0 00.904.904l5.372-1.468A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.97 0-3.81-.538-5.387-1.473l-.386-.228-3.19.871.871-3.19-.228-.386A9.955 9.955 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                        Chat di WhatsApp
                    </a>
                </div>
            </div>

            {{-- ── Tips Keamanan ── --}}
            <div class="tips-card">
                <div class="tips-hd"><h3>Tips Keamanan</h3></div>
                <div class="tip-item">
                    <div class="tip-dot">🔒</div>
                    <div class="tip-text">Laporan bersifat anonim — identitasmu terlindungi sepenuhnya.</div>
                </div>
                <div class="tip-item">
                    <div class="tip-dot">📸</div>
                    <div class="tip-text">Simpan bukti (foto, pesan) di tempat aman sebelum melapor.</div>
                </div>
                <div class="tip-item">
                    <div class="tip-dot">👥</div>
                    <div class="tip-text">Ceritakan ke orang terpercaya agar kamu tidak sendirian.</div>
                </div>
            </div>

        </div>{{-- /right-col --}}
    </div>{{-- /mid-grid --}}
</div>

<script>
/* ── Animasi typing bounce ── */
const _s = document.createElement('style');
_s.textContent = '@keyframes tdBounce{0%,80%,100%{transform:translateY(0)}40%{transform:translateY(-5px)}}';
document.head.appendChild(_s);

/* ── Quote harian ── */
const quotes = [
    {t:'"Keberanian untuk bersuara adalah langkah pertama menuju perubahan."',a:'— Inspirasi Harian'},
    {t:'"Setiap laporan adalah benih keberanian yang kamu tanam untuk masa depan."',a:'— Selendang Puan'},
    {t:'"Diam bukan pilihan ketika keadilan bisa diperjuangkan."',a:'— Inspirasi Harian'},
    {t:'"Perempuan yang berani bersuara mengubah dunia satu cerita pada satu waktu."',a:'— Selendang Puan'},
    {t:'"Kamu tidak sendiri. Kami ada bersamamu."',a:'— Selendang Puan Dharma Ayu'},
];
const q = quotes[new Date().getDate() % quotes.length];
document.getElementById('quoteText').textContent = q.t;
document.getElementById('quoteAttr').textContent = q.a;

/* ── Filter tabs laporan ── */
document.querySelectorAll('.ftab').forEach(tab => {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.ftab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        const filter = this.dataset.filter;
        document.querySelectorAll('.lap-prog-item').forEach(item => {
            if      (filter === 'all')    item.style.display = '';
            else if (filter === 'aktif')  item.style.display = item.dataset.aktif === '1'          ? '' : 'none';
            else if (filter === 'selesai') item.style.display = item.dataset.status === 'selesai'  ? '' : 'none';
        });
    });
});

/* ── Modal Agenda ── */
function openAgenda(ico, judul, tanggal, lokasi, deskripsi, kategori, diffLabel, judulWa) {
    document.getElementById('modalIco').textContent       = ico;
    document.getElementById('modalTitle').textContent     = judul;
    document.getElementById('modalTag').textContent       = diffLabel;
    document.getElementById('modalTanggal').textContent   = tanggal;
    document.getElementById('modalLokasi').textContent    = lokasi;
    document.getElementById('modalDeskripsi').textContent = deskripsi;
    const katRow = document.getElementById('modalKategoriRow');
    if (kategori) { document.getElementById('modalKategori').textContent = kategori; katRow.style.display = 'flex'; }
    else            katRow.style.display = 'none';
    const msg = encodeURIComponent('Halo Selendang Puan, saya tertarik untuk mengikuti kegiatan "' + judulWa + '" yang diadakan pada ' + tanggal + ' di ' + lokasi + '. Boleh saya mendapatkan informasi lebih lanjut?');
    document.getElementById('modalWaLink').href = 'https://wa.me/6281779080524?text=' + msg;
    document.getElementById('agendaModal').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeAgenda() {
    document.getElementById('agendaModal').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAgenda(); });

/* ══════════════════════════════════════════════
   CHATBOT — Groq AI via Laravel proxy
   ══════════════════════════════════════════════ */
(function () {
    // Riwayat percakapan (dikirim ke backend setiap request)
    const history = [];

    const msgsEl     = document.getElementById('cbMsgs');
    const inputEl    = document.getElementById('cbInput');
    const sendBtn    = document.getElementById('cbSendBtn');
    const faqWrap    = document.getElementById('cbFaqWrap');
    const statusText = document.getElementById('cbStatusText');

    function setLoading(on) {
        inputEl.disabled = on;
        sendBtn.disabled = on;
        statusText.textContent = on ? 'Sedang mengetik...' : 'Siap membantu kamu';
    }

    function addMsg(role, text) {
        const div = document.createElement('div');
        div.className = 'cb-msg ' + (role === 'user' ? 'user' : 'bot');
        // Ubah newline jadi <br> untuk keterbacaan
        const html = text.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/\n/g,'<br>');
        div.innerHTML = role === 'user'
            ? `<div class="cb-bubble">${html}</div>`
            : `<div class="cb-msg-ico">🌿</div><div class="cb-bubble">${html}</div>`;
        msgsEl.appendChild(div);
        msgsEl.scrollTop = msgsEl.scrollHeight;
        return div;
    }

    function addTyping() {
        const div = document.createElement('div');
        div.className = 'cb-msg bot';
        div.id = 'cbTyping';
        div.innerHTML = `<div class="cb-msg-ico">🌿</div>
            <div class="cb-bubble" style="padding:10px 14px;">
                <span style="display:flex;gap:4px;">
                    <span style="width:5px;height:5px;background:#b09e88;border-radius:50%;animation:tdBounce 1.2s infinite ease-in-out;display:inline-block;"></span>
                    <span style="width:5px;height:5px;background:#b09e88;border-radius:50%;animation:tdBounce 1.2s infinite ease-in-out .2s;display:inline-block;"></span>
                    <span style="width:5px;height:5px;background:#b09e88;border-radius:50%;animation:tdBounce 1.2s infinite ease-in-out .4s;display:inline-block;"></span>
                </span>
            </div>`;
        msgsEl.appendChild(div);
        msgsEl.scrollTop = msgsEl.scrollHeight;
    }

    async function doReply(userText) {
        faqWrap.style.display = 'none';
        addMsg('user', userText);
        history.push({ role: 'user', content: userText });

        setLoading(true);
        addTyping();

        try {
            const res = await fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ messages: history }),
            });

            const data = await res.json();
            document.getElementById('cbTyping')?.remove();

            if (data.reply) {
                addMsg('bot', data.reply);
                history.push({ role: 'assistant', content: data.reply });
            } else {
                addMsg('bot', data.error ?? 'Maaf, terjadi kesalahan. Coba lagi ya.');
            }
        } catch (e) {
            document.getElementById('cbTyping')?.remove();
            addMsg('bot', 'Koneksi bermasalah. Pastikan internet kamu aktif dan coba lagi.');
        }

        setLoading(false);
        inputEl.focus();
    }

    window.cbAsk = function (text) { doReply(text); };

    window.cbSend = function () {
        const text = inputEl.value.trim();
        if (!text || inputEl.disabled) return;
        inputEl.value = '';
        doReply(text);
    };
})();
</script>
</x-app-layout>