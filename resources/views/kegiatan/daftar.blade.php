<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap');
*{box-sizing:border-box;}

.pg-wrap{font-family:'DM Sans',sans-serif;background:#faf8f5;min-height:100vh;padding:28px;}

.topbar{display:flex;align-items:center;gap:10px;margin-bottom:20px;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e0d8cc;color:#8a7a60;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;transition:all .15s;}
.back-btn:hover{background:#f8f4ee;color:#6b8c52;border-color:#c8d9b0;}

/* Hero card kegiatan */
.hero-card{background:#2c3325;border-radius:10px;overflow:hidden;margin-bottom:16px;position:relative;border:1px solid #2c3325;}
.hero-img{width:100%;height:200px;object-fit:cover;display:block;opacity:.55;}
.hero-img-placeholder{width:100%;height:120px;background:linear-gradient(135deg,#3a4430,#2c3325);display:flex;align-items:center;justify-content:center;font-size:48px;opacity:.6;}
.hero-body{padding:20px 24px 24px;position:relative;overflow:hidden;}
.hero-body::before{content:'';position:absolute;top:-30px;right:-30px;width:100px;height:100px;background:rgba(143,166,122,.15);border-radius:50%;pointer-events:none;}
.hero-tag{display:inline-block;background:rgba(143,166,122,.25);border:1px solid rgba(143,166,122,.4);color:#c8d9b0;font-size:10px;font-weight:700;letter-spacing:.8px;text-transform:uppercase;padding:3px 10px;border-radius:20px;margin-bottom:10px;position:relative;z-index:1;}
.hero-title{font-family:'DM Serif Display',serif;font-size:20px;color:#e8e0d0;margin:0 0 14px;line-height:1.35;position:relative;z-index:1;overflow-wrap:break-word;}
.hero-metas{display:flex;flex-wrap:wrap;gap:14px;position:relative;z-index:1;}
.hero-meta{display:flex;align-items:center;gap:7px;font-size:12px;color:rgba(200,217,176,.65);}
.hero-meta strong{color:#c8d9b0;font-weight:500;}

/* Already registered */
.already-box{background:#edf2e8;border:1px solid #c8d9b0;border-radius:10px;padding:22px 24px;text-align:center;margin-bottom:16px;}
.already-ico{font-size:30px;margin-bottom:8px;}
.already-title{font-family:'DM Serif Display',serif;font-size:16px;color:#2c2416;margin-bottom:5px;}
.already-desc{font-size:12.5px;color:#5a7a40;line-height:1.6;max-width:420px;margin:0 auto;}
.btn-wa-big{display:inline-flex;align-items:center;justify-content:center;gap:9px;background:#25D366;color:#fff;font-size:13px;font-weight:700;padding:12px 26px;border-radius:8px;text-decoration:none;margin-top:14px;transition:background .15s;}
.btn-wa-big:hover{background:#1ebe5c;}

/* Form */
.form-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;max-width:600px;}
.form-hd{padding:12px 17px;border-bottom:1px solid #ede5da;background:#faf8f5;}
.form-hd h2{font-family:'DM Serif Display',serif;font-size:15px;color:#2c2416;margin:0 0 3px;}
.form-hd p{font-size:11.5px;color:#9e8e78;margin:0;line-height:1.5;}
.form-body{padding:20px 17px;display:flex;flex-direction:column;gap:16px;}

.field-label{font-size:10px;font-weight:700;color:#9e8e78;text-transform:uppercase;letter-spacing:.7px;display:block;margin-bottom:7px;}
.field-opt{color:#b09e88;font-weight:400;text-transform:none;letter-spacing:0;}
.field-req{color:#c47a7a;}
.field-input{width:100%;padding:10px 13px;background:#faf8f5;border:1px solid #e0d8cc;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color .15s,background .15s;}
.field-input:focus{border-color:#8fa67a;background:#fff;}
.field-input::placeholder{color:#b09e88;}
textarea.field-input{resize:vertical;min-height:88px;}
.field-hint{font-size:11px;color:#b09e88;margin-top:4px;}
.error-msg{font-size:11px;color:#b04040;margin-top:4px;}

.grid2{display:grid;grid-template-columns:1fr 1fr;gap:14px;}

/* Prefill notice */
.prefill-note{background:#edf2e8;border:1px solid #c8d9b0;border-radius:8px;padding:9px 13px;font-size:11.5px;color:#4a6535;display:flex;align-items:center;gap:8px;}

.form-footer{padding:14px 17px;background:#faf8f5;border-top:1px solid #ede5da;display:flex;gap:10px;align-items:center;}
.btn-submit{flex:1;background:#25D366;color:#fff;font-size:13px;font-weight:700;border:none;padding:12px;border-radius:8px;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:background .15s;font-family:'DM Sans',sans-serif;}
.btn-submit:hover{background:#1ebe5c;}
.btn-cancel{padding:12px 18px;background:#fff;border:1px solid #e0d8cc;color:#8a7a60;font-size:13px;font-weight:600;border-radius:8px;text-decoration:none;display:inline-flex;align-items:center;transition:all .15s;}
.btn-cancel:hover{background:#f8f4ee;color:#6b8c52;border-color:#c8d9b0;}

@media(max-width:600px){.grid2{grid-template-columns:1fr;}.pg-wrap{padding:16px;}}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <a href="{{ route('dashboard') }}" class="back-btn">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
    </div>

    {{-- Hero kegiatan --}}
    <div class="hero-card">
        @if($kegiatan->gambar)
            <img src="{{ Storage::url($kegiatan->gambar) }}" class="hero-img" alt="{{ $kegiatan->judul }}">
        @else
            <div class="hero-img-placeholder">🌿</div>
        @endif
        <div class="hero-body">
            <div class="hero-tag">Agenda Komunitas</div>
            <h1 class="hero-title">{{ $kegiatan->judul }}</h1>
            <div class="hero-metas">
                <div class="hero-meta">
                    <span>📅</span>
                    <strong>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('l, d F Y') }}</strong>
                </div>
                <div class="hero-meta">
                    <span>📍</span>
                    <strong>{{ $kegiatan->lokasi }}</strong>
                </div>
                @if($kegiatan->deskripsi)
                <div class="hero-meta" style="width:100%;margin-top:4px;">
                    <span>📝</span>
                    <span>{{ Str::limit($kegiatan->deskripsi, 120) }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Sudah daftar --}}
    @if($sudahDaftar)
    <div class="already-box">
        <div class="already-ico">✅</div>
        <div class="already-title">Kamu sudah terdaftar!</div>
        <div class="already-desc">Pendaftaranmu untuk kegiatan ini sudah tercatat. Silakan bergabung ke grup WhatsApp untuk info selanjutnya.</div>
        @if($kegiatan->wa_grup)
        <a href="{{ $kegiatan->wa_grup }}" target="_blank" rel="noopener" class="btn-wa-big">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.522 5.843L.054 23.215a.75.75 0 00.904.904l5.372-1.468A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.97 0-3.81-.538-5.387-1.473l-.386-.228-3.19.871.871-3.19-.228-.386A9.955 9.955 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
            Bergabung ke Grup WA
        </a>
        @endif
    </div>

    @else

    {{-- Form daftar --}}
    <div class="form-card">
        <div class="form-hd">
            <h2>Formulir Pendaftaran</h2>
            <p>Isi data di bawah untuk mendaftar. Setelah submit, kamu akan diarahkan ke grup WhatsApp.</p>
        </div>

        <form action="{{ route('kegiatan.daftar.store', $kegiatan->id) }}" method="POST">
            @csrf
            <div class="form-body">

                @if(auth()->user())
                <div class="prefill-note">
                    <span>🌿</span>
                    Data diisi otomatis dari akunmu. Silakan ubah jika perlu.
                </div>
                @endif

                <div class="grid2">
                    <div>
                        <label class="field-label">Nama Lengkap <span class="field-req">*</span></label>
                        <input type="text" name="nama" required
                            value="{{ old('nama', auth()->user()->name ?? '') }}"
                            class="field-input" placeholder="Nama lengkap kamu">
                        @error('nama')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="field-label">Nomor WhatsApp <span class="field-req">*</span></label>
                        <input type="text" name="no_hp" required
                            value="{{ old('no_hp', auth()->user()->no_hp ?? '') }}"
                            class="field-input" placeholder="08xxxxxxxxxx">
                        @error('no_hp')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="field-label">Email <span class="field-opt">(opsional)</span></label>
                    <input type="email" name="email"
                        value="{{ old('email', auth()->user()->email ?? '') }}"
                        class="field-input" placeholder="email@kamu.com">
                    @error('email')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="field-label">Catatan / Pertanyaan <span class="field-opt">(opsional)</span></label>
                    <textarea name="catatan" class="field-input" placeholder="Ada yang ingin kamu sampaikan?">{{ old('catatan') }}</textarea>
                    <p class="field-hint">Misal: kebutuhan khusus, pertanyaan, atau pesan untuk panitia.</p>
                    @error('catatan')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

            </div>

            <div class="form-footer">
                <button type="submit" class="btn-submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.522 5.843L.054 23.215a.75.75 0 00.904.904l5.372-1.468A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.97 0-3.81-.538-5.387-1.473l-.386-.228-3.19.871.871-3.19-.228-.386A9.955 9.955 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                    Daftar & Masuk Grup WA
                </button>
                <a href="{{ route('dashboard') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
    @endif

</div>
</x-app-layout>