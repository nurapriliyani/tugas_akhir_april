<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.prof-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}
.prof-topbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;flex-wrap:wrap;gap:12px;}
.prof-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 3px;letter-spacing:-0.3px;}
.prof-sub{font-size:12px;color:#9e8e78;margin:0;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e0d8cc;color:#6a5c48;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;}
.back-btn:hover{background:#f8f4ef;}

.prof-hero{background:#2c3325;border-radius:14px;padding:28px 32px;margin-bottom:20px;display:flex;align-items:center;gap:20px;position:relative;overflow:hidden;}
.prof-hero::before{content:'';position:absolute;top:-40px;right:-40px;width:160px;height:160px;background:rgba(143,166,122,.13);border-radius:50%;}
.prof-hero::after{content:'';position:absolute;bottom:-30px;left:120px;width:100px;height:100px;background:rgba(143,166,122,.07);border-radius:50%;}
.prof-avatar{width:64px;height:64px;border-radius:50%;background:#4a6535;display:flex;align-items:center;justify-content:center;font-family:'DM Serif Display',serif;font-size:24px;color:#c8d9b0;flex-shrink:0;border:2px solid rgba(200,217,176,.3);position:relative;z-index:1;}
.prof-hero-info{position:relative;z-index:1;}
.prof-hero-name{font-family:'DM Serif Display',serif;font-size:18px;color:#e8e0d0;margin:0 0 4px;}
.prof-hero-email{font-size:12px;color:rgba(255,255,255,.35);margin:0 0 10px;}
.prof-hero-badges{display:flex;gap:7px;flex-wrap:wrap;}
.ph-badge{font-size:10px;font-weight:600;padding:3px 10px;border-radius:20px;background:rgba(143,166,122,.18);color:#c8d9b0;border:1px solid rgba(143,166,122,.25);}

.prof-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
.prof-card{background:#fff;border-radius:12px;border:1px solid #e0d8cc;overflow:hidden;}
.prof-card.full{grid-column:1/-1;}
.pc-hd{padding:14px 20px;border-bottom:1px solid #ede5da;display:flex;align-items:center;gap:10px;}
.pc-hd-ico{width:32px;height:32px;border-radius:8px;background:#edf2e8;display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0;}
.pc-hd-ico.red{background:#fbeaea;}
.pc-hd h3{font-family:'DM Serif Display',serif;font-size:14px;color:#2c2416;margin:0;}
.pc-hd p{font-size:11px;color:#9e8e78;margin:2px 0 0;}
.pc-body{padding:20px;}

.field-label{display:block;font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:.8px;margin-bottom:6px;}
.field-input{width:100%;padding:10px 13px;background:#faf7f3;border:1.5px solid #e0d8cc;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color .15s;}
.field-input:focus{border-color:#6b8c52;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
.error-msg{font-size:11px;color:#b04040;margin-top:4px;display:block;}
.verify-warn{background:#fdf6ec;border:1px solid #f0d8a8;border-radius:8px;padding:10px 13px;font-size:12px;color:#8a5a1a;margin-top:8px;line-height:1.6;}
.verify-btn{background:none;border:none;padding:0;color:#6b8c52;font-size:12px;font-weight:600;text-decoration:underline;cursor:pointer;font-family:'DM Sans',sans-serif;}
.verify-sent{font-size:12px;color:#4a7a40;font-weight:600;margin-top:6px;}

.btn-save{background:#2c3325;color:#c8d9b0;font-size:13px;font-weight:600;border:none;padding:11px 22px;border-radius:8px;cursor:pointer;font-family:'DM Sans',sans-serif;transition:opacity .15s;display:inline-flex;align-items:center;gap:7px;}
.btn-save:hover{opacity:.87;}
.saved-toast{font-size:12px;color:#5a7a40;font-weight:600;background:#edf2e8;padding:6px 12px;border-radius:20px;}

.btn-danger{background:#fff;color:#b04040;font-size:13px;font-weight:600;border:1.5px solid #e8c4c4;padding:11px 22px;border-radius:8px;cursor:pointer;font-family:'DM Sans',sans-serif;transition:all .15s;display:inline-flex;align-items:center;gap:7px;}
.btn-danger:hover{background:#fbeaea;border-color:#c47a7a;}

/* Modal */
.modal-overlay{position:fixed;inset:0;z-index:200;background:rgba(20,26,17,.5);backdrop-filter:blur(4px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;pointer-events:none;transition:opacity .25s;}
.modal-overlay.open{opacity:1;pointer-events:all;}
.modal-box{background:#fff;border-radius:14px;border:1px solid #e0d8cc;width:100%;max-width:440px;padding:28px;transform:translateY(16px) scale(.98);transition:transform .25s;}
.modal-overlay.open .modal-box{transform:translateY(0) scale(1);}
.modal-box h3{font-family:'DM Serif Display',serif;font-size:17px;color:#2c2416;margin:0 0 8px;}
.modal-box p{font-size:13px;color:#8a7a60;line-height:1.7;margin:0 0 18px;}
.modal-actions{display:flex;gap:10px;justify-content:flex-end;}
.btn-cancel-modal{background:#fff;color:#8a7a60;font-size:13px;font-weight:600;border:1.5px solid #e0d8cc;padding:10px 18px;border-radius:8px;cursor:pointer;font-family:'DM Sans',sans-serif;transition:background .15s;}
.btn-cancel-modal:hover{background:#f8f4ef;}

@media(max-width:700px){.prof-grid{grid-template-columns:1fr;}.prof-card.full{grid-column:1;}.prof-hero{flex-direction:column;text-align:center;align-items:flex-start;}}
</style>

<div class="prof-wrap">
    <div class="prof-topbar">
        <div>
            <h1 class="prof-title">Profil Saya</h1>
            <p class="prof-sub">Kelola informasi akun dan keamanan Anda</p>
        </div>
        <a href="{{ route('dashboard') }}" class="back-btn">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Dashboard
        </a>
    </div>

    {{-- Hero --}}
    <div class="prof-hero">
        <div class="prof-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        <div class="prof-hero-info">
            <div class="prof-hero-name">{{ auth()->user()->name }}</div>
            <div class="prof-hero-email">{{ auth()->user()->email }}</div>
            <div class="prof-hero-badges">
                <span class="ph-badge">🌿 Pelapor Aktif</span>
                <span class="ph-badge">🔒 Akun Terverifikasi</span>
                <span class="ph-badge">📅 Bergabung {{ auth()->user()->created_at->translatedFormat('M Y') }}</span>
            </div>
        </div>
    </div>

    <div class="prof-grid">
        {{-- Info Profil --}}
        <div class="prof-card">
            <div class="pc-hd">
                <div class="pc-hd-ico">👤</div>
                <div><h3>Informasi Profil</h3><p>Perbarui nama dan email akun Anda</p></div>
            </div>
            <div class="pc-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Ubah Password --}}
        <div class="prof-card">
            <div class="pc-hd">
                <div class="pc-hd-ico">🔑</div>
                <div><h3>Ubah Password</h3><p>Gunakan password kuat untuk keamanan</p></div>
            </div>
            <div class="pc-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Hapus Akun --}}
        <div class="prof-card full">
            <div class="pc-hd">
                <div class="pc-hd-ico red">⚠️</div>
                <div><h3>Zona Berbahaya</h3><p>Tindakan di bawah ini bersifat permanen dan tidak dapat dibatalkan</p></div>
            </div>
            <div class="pc-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
</x-app-layout>