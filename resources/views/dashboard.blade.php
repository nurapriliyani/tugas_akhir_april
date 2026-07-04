<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap');
*{box-sizing:border-box;}

html,body{overflow-x:hidden;max-width:100%;}

.db-wrap{font-family:'DM Sans',sans-serif;padding:28px;min-height:100vh;background:#faf8f5;overflow-x:hidden;max-width:100%;}

/* ── Topbar ── */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;}
.greet h1{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 4px;letter-spacing:-0.3px;overflow-wrap:break-word;}
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
.quote-bar{background:#2c3325;border-radius:10px;padding:13px 18px;display:flex;align-items:center;gap:12px;margin-bottom:18px;min-width:0;}
.q-icon{font-size:18px;flex-shrink:0;opacity:.6;}
.q-text{font-family:'DM Serif Display',serif;font-size:13px;font-style:italic;color:#c8d9b0;flex:1;line-height:1.6;margin:0 0 2px;overflow-wrap:break-word;min-width:0;}
.q-attr{font-size:10px;color:rgba(255,255,255,.22);margin:0;}

/* ── Stats ── */
.stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px;margin-bottom:18px;}
.sc{background:#fff;border-radius:10px;padding:15px 17px;border:1px solid #e0d8cc;position:relative;overflow:hidden;min-width:0;}
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
/* FIX UTAMA: minmax(0,1fr) mencegah kolom kiri "memaksa" melebar
   akibat konten panjang (teks laporan/agenda/notifikasi), yang tadinya
   mendorong kolom kanan (240px) keluar dari viewport */
.mid-grid{display:grid;grid-template-columns:minmax(0,1fr) 240px;gap:14px;width:100%;min-width:0;}
.left-col{display:flex;flex-direction:column;gap:12px;min-width:0;}
.right-col{display:flex;flex-direction:column;gap:12px;min-width:0;}

/* ── Card ── */
.card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;min-width:0;}
.card-hd{padding:12px 17px;border-bottom:1px solid #ede5da;display:flex;align-items:center;justify-content:space-between;gap:8px;flex-wrap:wrap;}
.card-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#2c2416;margin:0;}
.card-hd a{font-size:11px;color:#6b8c52;font-weight:600;text-decoration:none;background:#edf2e8;padding:3px 9px;border-radius:20px;white-space:nowrap;}
.badge-new{font-size:10px;background:#edf2e8;color:#6b8c52;padding:2px 8px;border-radius:10px;font-weight:600;}

/* ── Filter tabs ── */
.filter-tabs{display:flex;gap:5px;flex-wrap:wrap;}
.ftab{font-size:10px;font-weight:600;padding:3px 9px;border-radius:20px;border:1px solid #e0d8cc;cursor:pointer;color:#9e8e78;background:#fff;transition:all .15s;white-space:nowrap;}
.ftab.active,.ftab:hover{background:#edf2e8;color:#6b8c52;border-color:#c8d9b0;}

/* ── Progress laporan ── */
.prog-wrap{padding:13px 17px;display:flex;flex-direction:column;gap:14px;min-width:0;}
.lap-prog-item{min-width:0;}
.prog-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:5px;gap:8px;min-width:0;}
.prog-title{font-size:12.5px;font-weight:600;color:#2c2416;overflow-wrap:break-word;word-break:break-word;min-width:0;flex:1;}
.prog-badge{font-size:10px;font-weight:600;padding:2px 8px;border-radius:10px;white-space:nowrap;flex-shrink:0;}
.pb-diproses{background:#f5ede4;color:#b07040;}
.pb-selesai{background:#edf2e8;color:#5a7a40;}
.pb-menunggu{background:#f0eee8;color:#8a7a60;}
.pb-ditolak{background:#fbeaea;color:#b04040;}
.prog-bar-bg{height:5px;background:#ede5da;border-radius:10px;overflow:hidden;}
.prog-bar-fill{height:100%;border-radius:10px;transition:width 1s ease;}
.fill-sage{background:#8fa67a;}.fill-clay{background:#c4905a;}
.fill-stone{background:#b09e88;}.fill-red{background:#c47a7a;}
.prog-meta{font-size:10px;color:#b09e88;margin-top:4px;overflow-wrap:break-word;}
.prog-meta span.done{color:#6b8c52;font-weight:600;}
.prog-date{font-size:10px;color:#b09e88;margin-top:3px;}

/* ── Agenda Card dengan Foto ── */
.agenda-card-wrap{padding:14px 17px;display:flex;flex-direction:column;gap:14px;min-width:0;}
.ag-card{border:1px solid #e8e0d4;border-radius:10px;overflow:hidden;transition:box-shadow .15s;min-width:0;}
.ag-card:hover{box-shadow:0 4px 14px rgba(44,35,22,.08);}
.ag-photo{width:100%;height:170px;object-fit:cover;object-position:center;background:#f3efe6;display:block;}
.ag-photo-placeholder{width:100%;height:80px;background:linear-gradient(135deg,#e8f0e0,#d0e4c0);display:flex;align-items:center;justify-content:center;font-size:28px;opacity:.7;}
.ag-body{padding:11px 13px;min-width:0;}
.ag-meta-row{display:flex;align-items:center;justify-content:space-between;gap:6px;margin-bottom:7px;min-width:0;}
.ag-title{font-size:13px;font-weight:600;color:#2c2416;line-height:1.35;margin-bottom:5px;overflow-wrap:break-word;word-break:break-word;min-width:0;flex:1;}
.ag-info{font-size:11px;color:#9e8e78;margin-bottom:2px;display:flex;align-items:center;gap:5px;overflow-wrap:break-word;}
.ag-badge-soon{background:#fdf6ec;color:#b07040;border:1px solid #f0d8a8;font-size:10px;font-weight:600;padding:2px 8px;border-radius:8px;white-space:nowrap;flex-shrink:0;}
.ag-badge-date{background:#edf2e8;color:#6b8c52;font-size:10px;font-weight:600;padding:2px 8px;border-radius:8px;white-space:nowrap;flex-shrink:0;}
.ag-actions{padding:0 13px 12px;}
.btn-daftar{display:flex;align-items:center;justify-content:center;gap:7px;width:100%;background:#2c3325;color:#c8d9b0;font-size:12px;font-weight:600;padding:9px 14px;border-radius:7px;text-decoration:none;transition:opacity .15s;}
.btn-daftar:hover{opacity:.85;}
.btn-sudah-daftar{display:flex;align-items:center;gap:7px;width:100%;background:#edf2e8;color:#4a6535;font-size:12px;font-weight:600;padding:9px 13px;border-radius:7px;border:1px solid #c8d9b0;flex-wrap:wrap;}
.btn-wa-open{margin-left:auto;background:#25D366;color:#fff;font-size:11px;font-weight:600;padding:5px 11px;border-radius:6px;text-decoration:none;flex-shrink:0;}
.btn-wa-open:hover{background:#1ebe5c;}

/* ── Timeline ── */
.timeline-wrap{padding:13px 17px;display:flex;flex-direction:column;gap:0;min-width:0;}
.tl-item{display:flex;gap:10px;padding-bottom:13px;position:relative;min-width:0;}
.tl-item:last-child{padding-bottom:0;}
.tl-item:not(:last-child)::before{content:'';position:absolute;left:10px;top:22px;bottom:0;width:1px;background:#ede5da;}
.tl-dot{width:22px;height:22px;border-radius:50%;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:10px;position:relative;z-index:1;}
.tl-dot.g{background:#edf2e8;color:#5a7a40;border:1.5px solid #c8d9b0;}
.tl-dot.c{background:#f5ede4;color:#b07040;border:1.5px solid #e8cdb0;}
.tl-dot.r{background:#fbeaea;color:#b04040;border:1.5px solid #f0c4c4;}
.tl-dot.s{background:#f0eee8;color:#8a7a60;border:1.5px solid #e0d8cc;}
.tl-body{flex:1;padding-top:2px;min-width:0;}
.tl-text{font-size:12px;color:#4a3c2c;line-height:1.5;overflow-wrap:break-word;word-break:break-word;}
.tl-time{font-size:10px;color:#b09e88;margin-top:2px;}
.tl-empty{text-align:center;padding:20px 0;color:#b09e88;font-size:12px;font-style:italic;}

/* ── CTA ── */
.cta-c{background:#2c3325;border-radius:10px;padding:18px;position:relative;overflow:hidden;min-width:0;}
.cta-c::before{content:'';position:absolute;top:-28px;right:-28px;width:90px;height:90px;background:rgba(143,166,122,.18);border-radius:50%;}
.cta-c h3{font-family:'DM Serif Display',serif;font-size:14px;color:#e8e0d0;margin:0 0 5px;position:relative;overflow-wrap:break-word;}
.cta-c p{font-size:11.5px;color:rgba(255,255,255,.3);margin:0 0 13px;line-height:1.6;position:relative;overflow-wrap:break-word;}
.cta-c a{display:block;width:100%;background:#8fa67a;color:#fff;font-size:12px;font-weight:600;border:none;padding:10px;border-radius:7px;cursor:pointer;position:relative;text-align:center;text-decoration:none;}
.cta-c a:hover{background:#7a9068;}

/* ── Notifikasi ── */
.notif-item{display:flex;align-items:flex-start;gap:9px;padding:9px 14px;border-bottom:1px solid #f5f0ea;min-width:0;cursor:pointer;transition:background .15s;}
.notif-item:last-child{border-bottom:none;}
.notif-item:hover{background:#f8f4ee;}
.notif-item.notif-unread{background:#f6faf1;}
.notif-item.notif-unread .notif-text{font-weight:600;color:#2c2416;}
.notif-item.notif-unread .notif-dot{box-shadow:0 0 0 3px rgba(107,140,82,.15);}
.notif-dot{width:6px;height:6px;border-radius:50%;margin-top:5px;flex-shrink:0;}
.nd-green{background:#6b8c52;}.nd-clay{background:#b07040;}.nd-stone{background:#a89e8a;}
.notif-text{font-size:12px;color:#4a3c2c;line-height:1.5;flex:1;overflow-wrap:break-word;word-break:break-word;min-width:0;}
.notif-time{font-size:10px;color:#b09e88;margin-top:2px;}

/* ── Kalender ── */
.cal-wrap{padding:13px 14px;min-width:0;}
.cal-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;}
.cal-head h4{font-family:'DM Serif Display',serif;font-size:13px;color:#2c2416;margin:0;}
.cal-grid{display:grid;grid-template-columns:repeat(7,minmax(0,1fr));gap:2px;text-align:center;}
.cal-day-label{font-size:9px;font-weight:600;color:#b09e88;padding:2px 0;text-transform:uppercase;}
.cal-day{font-size:10.5px;color:#6a5c48;padding:3px 1px;border-radius:4px;position:relative;}
.cal-day.other{color:#d0c8bc;}
.cal-day.today{background:#2c3325;color:#c8d9b0;font-weight:600;border-radius:50%;width:20px;height:20px;display:flex;align-items:center;justify-content:center;margin:0 auto;}
.cal-day.has-event::after{content:'';position:absolute;bottom:1px;left:50%;transform:translateX(-50%);width:3px;height:3px;background:#8fa67a;border-radius:50%;}

/* ── Kontak Darurat ── */
.kontak-card{border-radius:10px;border:1px solid #f0d8c0;overflow:hidden;background:#fff9f4;min-width:0;}
.kontak-hd{padding:11px 16px;border-bottom:1px solid #f0d8c0;background:#fff9f4;}
.kontak-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#7c3d10;margin:0;}
.kontak-row{display:flex;align-items:center;gap:9px;padding:9px 15px;border-bottom:1px solid #fae8d4;min-width:0;}
.kontak-row:last-child{border-bottom:none;}
.kontak-ico{width:30px;height:30px;border-radius:7px;background:#fdecd8;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;}
.kontak-name{font-size:12px;font-weight:600;color:#7c3d10;overflow-wrap:break-word;}
.kontak-num{font-size:11px;color:#b07040;overflow-wrap:break-word;}

/* ── Tips ── */
.tips-card{border-radius:10px;border:1px solid #c4ddd2;overflow:hidden;background:#f0f8f4;min-width:0;}
.tips-hd{padding:11px 16px;border-bottom:1px solid #c4ddd2;background:#f0f8f4;}
.tips-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#2a5c42;margin:0;}
.tip-item{display:flex;align-items:flex-start;gap:8px;padding:9px 15px;border-bottom:1px solid #d4ece4;min-width:0;}
.tip-item:last-child{border-bottom:none;}
.tip-dot{width:18px;height:18px;border-radius:50%;background:#c4ddd2;display:flex;align-items:center;justify-content:center;font-size:9px;flex-shrink:0;margin-top:1px;color:#2a5c42;}
.tip-text{font-size:11.5px;color:#2a5c42;line-height:1.5;overflow-wrap:break-word;}

/* ── Chatbot ── */
.chatbot-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;min-width:0;}
.chatbot-head{background:#2c3325;padding:13px 17px;display:flex;align-items:center;gap:10px;position:relative;overflow:hidden;}
.chatbot-head::before{content:'';position:absolute;top:-20px;right:-20px;width:70px;height:70px;background:rgba(143,166,122,.15);border-radius:50%;}
.cb-ico{width:32px;height:32px;border-radius:50%;background:rgba(143,166,122,.2);border:1.5px solid rgba(143,166,122,.35);display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0;position:relative;z-index:1;}
.cb-info{flex:1;position:relative;z-index:1;min-width:0;}
.cb-name{font-family:'DM Serif Display',serif;font-size:13px;color:#e8e0d0;margin:0 0 1px;}
.cb-status{font-size:10px;color:rgba(200,217,176,.55);display:flex;align-items:center;gap:4px;}
.cb-status::before{content:'';width:5px;height:5px;border-radius:50%;background:#8fa67a;flex-shrink:0;}
.cb-msgs{height:240px;overflow-y:auto;overflow-x:hidden;padding:12px 13px 8px;display:flex;flex-direction:column;gap:8px;scroll-behavior:smooth;background:#faf8f5;}
.cb-msgs::-webkit-scrollbar{width:3px;}
.cb-msgs::-webkit-scrollbar-thumb{background:#e0d8cc;border-radius:3px;}
.cb-msg{display:flex;gap:7px;align-items:flex-end;max-width:92%;min-width:0;}
.cb-msg.bot{align-self:flex-start;}
.cb-msg.user{align-self:flex-end;flex-direction:row-reverse;}
.cb-msg-ico{width:24px;height:24px;border-radius:50%;background:#edf2e8;display:flex;align-items:center;justify-content:center;font-size:11px;flex-shrink:0;border:1px solid #d4e8c4;}
.cb-bubble{padding:7px 11px;border-radius:10px;font-size:12px;line-height:1.65;max-width:100%;word-break:break-word;overflow-wrap:break-word;min-width:0;}
.cb-msg.bot  .cb-bubble{background:#fff;color:#3a2e20;border:1px solid #ede5da;border-bottom-left-radius:3px;}
.cb-msg.user .cb-bubble{background:#2c3325;color:#c8d9b0;border-bottom-right-radius:3px;}
.cb-faq-wrap{padding:10px 13px 8px;display:flex;flex-wrap:wrap;gap:5px;background:#faf8f5;border-top:1px solid #f0ebe3;}
.cb-faq-label{width:100%;font-size:10px;font-weight:600;color:#b09e88;letter-spacing:.6px;text-transform:uppercase;margin-bottom:3px;}
.cb-faq-btn{font-size:11px;color:#6b8c52;background:#edf2e8;border:1px solid #c8d9b0;border-radius:20px;padding:4px 10px;cursor:pointer;transition:all .15s;font-family:'DM Sans',sans-serif;}
.cb-faq-btn:hover{background:#dcecd0;color:#4a6a35;}
.cb-input-wrap{padding:9px 11px;border-top:1px solid #ede5da;display:flex;gap:7px;align-items:center;background:#fff;}
.cb-input{flex:1;border:1px solid #e0d8cc;border-radius:18px;padding:7px 13px;font-size:12px;font-family:'DM Sans',sans-serif;color:#2c2416;outline:none;background:#faf8f5;transition:border-color .15s;min-width:0;}
.cb-input:focus{border-color:#8fa67a;}
.cb-input::placeholder{color:#b09e88;}
.cb-input:disabled{opacity:.5;cursor:not-allowed;}
.cb-send{width:30px;height:30px;border-radius:50%;background:#2c3325;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .15s;}
.cb-send:hover{background:#3a4430;}
.cb-send:disabled{opacity:.4;cursor:not-allowed;}
.cb-send svg{width:13px;height:13px;fill:none;stroke:#c8d9b0;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}

/* ── Responsive ── */
@media(max-width:900px){.mid-grid{grid-template-columns:minmax(0,1fr);}}
@media(max-width:600px){.db-wrap{padding:16px;}.stats{grid-template-columns:minmax(0,1fr);}}
</style>

{{-- ── Modal Detail Agenda ── --}}
<div class="modal-overlay" id="agendaModal" onclick="if(event.target===this)closeAgenda()"
     style="position:fixed;inset:0;z-index:300;background:rgba(20,26,17,.48);backdrop-filter:blur(5px);display:flex;align-items:center;justify-content:center;padding:20px;opacity:0;pointer-events:none;transition:opacity .25s;">
    <div style="background:#fff;border-radius:16px;border:1px solid #e0d8cc;width:100%;max-width:460px;box-shadow:0 16px 48px rgba(37,51,32,.14);transform:translateY(18px) scale(.97);transition:transform .25s;overflow:hidden;" id="agendaModalBox">
        <div style="background:#2c3325;padding:22px 24px 20px;position:relative;overflow:hidden;">
            <button onclick="closeAgenda()" style="position:absolute;top:14px;right:14px;width:28px;height:28px;background:rgba(255,255,255,.1);border:none;border-radius:50%;cursor:pointer;color:rgba(255,255,255,.6);font-size:14px;display:flex;align-items:center;justify-content:center;z-index:1;">✕</button>
            <div style="width:48px;height:48px;border-radius:12px;background:rgba(143,166,122,.2);border:1px solid rgba(143,166,122,.3);display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:12px;position:relative;z-index:1;" id="modalIco">🌱</div>
            <div style="font-family:'DM Serif Display',serif;font-size:17px;color:#e8e0d0;margin:0 0 6px;position:relative;z-index:1;line-height:1.3;padding-right:32px;" id="modalTitle">—</div>
            <span style="display:inline-block;font-size:10px;font-weight:600;background:rgba(143,166,122,.25);color:#c8d9b0;padding:3px 10px;border-radius:20px;border:1px solid rgba(143,166,122,.3);position:relative;z-index:1;" id="modalTag">—</span>
        </div>
        <div style="padding:20px 24px;">
            <div style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f0ece4;">
                <div style="width:30px;height:30px;border-radius:8px;background:#edf2e8;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">📅</div>
                <div><div style="font-size:10px;color:#9e8e78;font-weight:600;text-transform:uppercase;letter-spacing:.6px;margin-bottom:2px;">Tanggal</div><div style="font-size:13px;color:#2c2416;font-weight:500;" id="modalTanggal">—</div></div>
            </div>
            <div style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f0ece4;">
                <div style="width:30px;height:30px;border-radius:8px;background:#edf2e8;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">📍</div>
                <div><div style="font-size:10px;color:#9e8e78;font-weight:600;text-transform:uppercase;letter-spacing:.6px;margin-bottom:2px;">Lokasi</div><div style="font-size:13px;color:#2c2416;font-weight:500;" id="modalLokasi">—</div></div>
            </div>
            <div style="background:#f8f4ef;border-radius:9px;padding:13px 15px;font-size:12.5px;color:#5a4a38;line-height:1.75;margin-top:14px;" id="modalDeskripsi"></div>
        </div>
        <div style="padding:0 24px 22px;display:flex;gap:10px;">
            <a id="modalDaftarLink" href="#" class="btn-daftar" style="flex:1;display:inline-flex;align-items:center;justify-content:center;gap:8px;background:#2c3325;color:#c8d9b0;font-size:13px;font-weight:600;padding:11px 16px;border-radius:9px;text-decoration:none;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                Daftar Sekarang
            </a>
            <button onclick="closeAgenda()" style="padding:11px 18px;background:#fff;border:1.5px solid #e0d8cc;color:#8a7a60;font-size:13px;font-weight:600;border-radius:9px;cursor:pointer;font-family:'DM Sans',sans-serif;">Tutup</button>
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
        <div style="min-width:0;">
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

            {{-- ── Agenda Komunitas dengan Foto ── --}}
            <div class="card">
                <div class="card-hd">
                    <h3>Agenda Komunitas</h3>
                    <a href="#">Lihat Semua</a>
                </div>

                <div class="agenda-card-wrap">
                    @forelse($kegiatans as $kegiatan)
                    @php
                        $diffLabel   = \Carbon\Carbon::parse($kegiatan->tanggal)->diffForHumans();
                        $isSoon      = \Carbon\Carbon::parse($kegiatan->tanggal)->isFuture()
                                       && \Carbon\Carbon::parse($kegiatan->tanggal)->diffInDays(now()) <= 7;
                        $sudahDaftar = \App\Models\PendaftaranKegiatan::where('kegiatan_id', $kegiatan->id)
                                        ->where('user_id', auth()->id())->exists();
                    @endphp
                    <div class="ag-card">

                        {{-- Foto --}}
                        @if($kegiatan->gambar)
                            <img src="{{ Storage::url($kegiatan->gambar) }}"
                                 class="ag-photo" alt="{{ $kegiatan->judul }}">
                        @else
                            <div class="ag-photo-placeholder">🌿</div>
                        @endif

                        {{-- Info --}}
                        <div class="ag-body">
                            <div class="ag-meta-row">
                                <div class="ag-title">{{ $kegiatan->judul }}</div>
                                @if($isSoon)
                                    <span class="ag-badge-soon">🔔 Segera</span>
                                @else
                                    <span class="ag-badge-date">{{ $diffLabel }}</span>
                                @endif
                            </div>
                            <div class="ag-info">📅 {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d M Y') }}</div>
                            <div class="ag-info">📍 {{ $kegiatan->lokasi }}</div>
                            @if($kegiatan->deskripsi)
                                <div style="font-size:11.5px;color:#8a7a60;line-height:1.55;margin-top:6px;overflow-wrap:break-word;">
                                    {{ Str::limit($kegiatan->deskripsi, 90) }}
                                </div>
                            @endif
                        </div>

                        {{-- Tombol --}}
                        <div class="ag-actions">
                            @if($sudahDaftar)
                                <div class="btn-sudah-daftar">
                                    <span>✅</span> Sudah Terdaftar
                                    @if($kegiatan->wa_grup)
                                        <a href="{{ $kegiatan->wa_grup }}" target="_blank" rel="noopener" class="btn-wa-open">
                                            Buka Grup WA
                                        </a>
                                    @endif
                                </div>
                            @else
                                <a href="{{ route('kegiatan.daftar', $kegiatan->id) }}" class="btn-daftar">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                                    Daftar Sekarang
                                </a>
                            @endif
                        </div>

                    </div>
                    @empty
                    <div class="tl-empty" style="padding:28px 0;">Belum ada agenda baru.</div>
                    @endforelse
                </div>
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
                    $isUnread  = ! $notif->is_read;
                    $detailUrl = $notif->url ?? '';
                    $bacaUrl   = \Illuminate\Support\Facades\Route::has('notifikasi.baca')
                                    ? route('notifikasi.baca', $notif->id)
                                    : '';
                @endphp
                <div class="notif-item {{ $isUnread ? 'notif-unread' : '' }}"
                     data-id="{{ $notif->id }}"
                     data-url="{{ $detailUrl }}"
                     data-baca-url="{{ $bacaUrl }}"
                     onclick="notifClick(this)">
                    <div class="notif-dot {{ $dotClass }}"></div>
                    <div style="min-width:0;">
                        <div class="notif-text">{!! $notif->pesan !!}</div>
                        <div class="notif-time">{{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}</div>
                    </div>
                </div>
                @empty
                <div class="tl-empty" style="padding:18px;">Tidak ada notifikasi.</div>
                @endforelse
            </div>

            {{-- ── Chatbot ── --}}
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
                            Saya siap menjawab pertanyaan apapun tentang platform ini.
                        </div>
                    </div>
                </div>
                <div class="cb-faq-wrap" id="cbFaqWrap">
                    <div class="cb-faq-label">Mulai dari sini</div>
                    <button class="cb-faq-btn" onclick="cbAsk('Bagaimana cara membuat laporan?')">📝 Cara membuat laporan</button>
                    <button class="cb-faq-btn" onclick="cbAsk('Apakah laporan saya aman dan anonim?')">🔒 Keamanan laporan</button>
                    <button class="cb-faq-btn" onclick="cbAsk('Berapa lama laporan saya diproses?')">⏳ Lama proses</button>
                    <button class="cb-faq-btn" onclick="cbAsk('Apa saja kontak darurat yang bisa dihubungi?')">🆘 Kontak darurat</button>
                </div>
                <div class="cb-input-wrap">
                    <input type="text" class="cb-input" id="cbInput" placeholder="Ketik pertanyaan apapun..."
                           onkeydown="if(event.key==='Enter' && !event.shiftKey)cbSend()"/>
                    <button class="cb-send" id="cbSendBtn" onclick="cbSend()">
                        <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </div>
            </div>

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
const _s = document.createElement('style');
_s.textContent = '@keyframes tdBounce{0%,80%,100%{transform:translateY(0)}40%{transform:translateY(-5px)}}';
document.head.appendChild(_s);

/* Quote */
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

/* Filter laporan */
document.querySelectorAll('.ftab').forEach(tab => {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.ftab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        const filter = this.dataset.filter;
        document.querySelectorAll('.lap-prog-item').forEach(item => {
            if      (filter === 'all')     item.style.display = '';
            else if (filter === 'aktif')   item.style.display = item.dataset.aktif === '1' ? '' : 'none';
            else if (filter === 'selesai') item.style.display = item.dataset.status === 'selesai' ? '' : 'none';
        });
    });
});

/* Modal agenda (opsional, tidak wajib karena sudah ada tombol daftar langsung) */
function openAgenda(judul, tanggal, lokasi, deskripsi, daftarUrl) {
    document.getElementById('modalTitle').textContent   = judul;
    document.getElementById('modalTag').textContent     = tanggal;
    document.getElementById('modalTanggal').textContent = tanggal;
    document.getElementById('modalLokasi').textContent  = lokasi;
    document.getElementById('modalDeskripsi').textContent = deskripsi;
    document.getElementById('modalDaftarLink').href     = daftarUrl;
    const modal = document.getElementById('agendaModal');
    modal.style.opacity = '1'; modal.style.pointerEvents = 'all';
    document.getElementById('agendaModalBox').style.transform = 'translateY(0) scale(1)';
    document.body.style.overflow = 'hidden';
}
function closeAgenda() {
    const modal = document.getElementById('agendaModal');
    modal.style.opacity = '0'; modal.style.pointerEvents = 'none';
    document.getElementById('agendaModalBox').style.transform = 'translateY(18px) scale(.97)';
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAgenda(); });

/* Klik notifikasi: tandai dibaca (AJAX) lalu buka url terkait (laporan/kegiatan/dll) */
function notifClick(el) {
    const bacaUrl = el.dataset.bacaUrl;
    const url     = el.dataset.url;

    el.classList.remove('notif-unread'); // update tampilan langsung, tidak perlu tunggu response

    if (bacaUrl) {
        fetch(bacaUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        }).finally(() => {
            if (url) window.location.href = url;
        });
        return;
    }

    // Route tandai-dibaca belum ada / gagal — tetap arahkan kalau ada url-nya
    if (url) {
        window.location.href = url;
    } else {
        console.warn('Notifikasi ini tidak punya url tujuan (kolom `url` kosong di database).');
    }
}

/* Chatbot */
(function () {
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
        const html = text.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/\n/g,'<br>');
        div.innerHTML = role === 'user'
            ? `<div class="cb-bubble">${html}</div>`
            : `<div class="cb-msg-ico">🌿</div><div class="cb-bubble">${html}</div>`;
        msgsEl.appendChild(div);
        msgsEl.scrollTop = msgsEl.scrollHeight;
    }
    function addTyping() {
        const div = document.createElement('div');
        div.className = 'cb-msg bot'; div.id = 'cbTyping';
        div.innerHTML = `<div class="cb-msg-ico">🌿</div><div class="cb-bubble" style="padding:10px 14px;"><span style="display:flex;gap:4px;"><span style="width:5px;height:5px;background:#b09e88;border-radius:50%;animation:tdBounce 1.2s infinite ease-in-out;display:inline-block;"></span><span style="width:5px;height:5px;background:#b09e88;border-radius:50%;animation:tdBounce 1.2s infinite ease-in-out .2s;display:inline-block;"></span><span style="width:5px;height:5px;background:#b09e88;border-radius:50%;animation:tdBounce 1.2s infinite ease-in-out .4s;display:inline-block;"></span></span></div>`;
        msgsEl.appendChild(div);
        msgsEl.scrollTop = msgsEl.scrollHeight;
    }
    async function doReply(userText) {
        faqWrap.style.display = 'none';
        addMsg('user', userText);
        history.push({ role: 'user', content: userText });
        setLoading(true); addTyping();
        try {
            const res = await fetch('/chatbot', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                body: JSON.stringify({ messages: history }),
            });
            const data = await res.json();
            document.getElementById('cbTyping')?.remove();
            if (data.reply) { addMsg('bot', data.reply); history.push({ role: 'assistant', content: data.reply }); }
            else { addMsg('bot', data.error ?? 'Maaf, terjadi kesalahan. Coba lagi ya.'); }
        } catch (e) {
            document.getElementById('cbTyping')?.remove();
            addMsg('bot', 'Koneksi bermasalah. Pastikan internet kamu aktif dan coba lagi.');
        }
        setLoading(false); inputEl.focus();
    }
    window.cbAsk  = text => doReply(text);
    window.cbSend = () => { const t = inputEl.value.trim(); if (!t || inputEl.disabled) return; inputEl.value = ''; doReply(t); };
})();
</script>
</x-app-layout>