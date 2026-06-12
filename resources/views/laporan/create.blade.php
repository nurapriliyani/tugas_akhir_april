<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}

.topbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;flex-wrap:wrap;gap:12px;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 3px;letter-spacing:-0.3px;}
.page-sub{font-size:12px;color:#9e8e78;margin:0;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e0d8cc;color:#6a5c48;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;}
.back-btn:hover{background:#f8f4ef;}

/* Stepper */
.stepper{display:flex;align-items:center;gap:0;margin-bottom:24px;background:#fff;border-radius:10px;border:1px solid #e0d8cc;padding:14px 20px;}
.step{display:flex;align-items:center;gap:8px;flex:1;}
.step-circle{width:26px;height:26px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0;}
.step-circle.active{background:#2c3325;color:#c8d9b0;}
.step-circle.done{background:#8fa67a;color:#fff;}
.step-circle.idle{background:#f0ece4;color:#b09e88;}
.step-text{font-size:11.5px;font-weight:600;}
.step-text.active{color:#2c2416;}
.step-text.idle{color:#b09e88;}
.step-line{flex:1;height:1px;background:#e8e0d4;margin:0 8px;}

/* Grid layout */
.create-grid{display:grid;grid-template-columns:1fr 280px;gap:16px;align-items:start;}

/* Form card */
.form-card{background:#fff;border-radius:12px;border:1px solid #e0d8cc;overflow:hidden;}
.alert-error{background:#fdf2f2;border-left:3px solid #c47a7a;color:#8a4040;border-radius:0;padding:12px 16px;font-size:12px;line-height:1.7;}
.alert-error li{list-style:none;padding:1px 0;}
.form-body{padding:20px 22px;display:flex;flex-direction:column;gap:14px;}
.field-label{display:block;font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:6px;}
.field-input{width:100%;padding:10px 13px;background:#faf7f3;border:1.5px solid #e0d8cc;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color 0.15s;}
.field-input:focus{border-color:#6b8c52;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
textarea.field-input{resize:vertical;min-height:130px;}
select.field-input{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238a7a60' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:36px;}
.error-msg{font-size:11px;color:#b04040;margin-top:4px;display:block;}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
.upload-zone{background:#f8f4ef;border:1.5px dashed #ddd5c8;border-radius:8px;padding:14px;text-align:center;}
.upload-zone input[type=file]{width:100%;font-size:12px;color:#8a7a60;}
.upload-zone input[type=file]::file-selector-button{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;border-radius:6px;padding:5px 10px;font-size:12px;font-weight:600;cursor:pointer;margin-right:8px;}
.upload-note{font-size:11px;color:#b09e88;margin-top:5px;}
.anonim-row{display:flex;align-items:flex-start;gap:10px;background:#f8f4ef;border:1px solid #ede5da;border-radius:8px;padding:11px 13px;cursor:pointer;}
.anonim-row input[type=checkbox]{width:15px;height:15px;accent-color:#4a6535;cursor:pointer;flex-shrink:0;margin-top:2px;}
.anonim-lbl{font-size:13px;color:#5a4a38;font-weight:600;}
.anonim-desc{font-size:11px;color:#9e8e78;margin-top:2px;line-height:1.5;}
.form-footer{padding:14px 22px;background:#f8f4ef;border-top:1px solid #ede5da;display:flex;gap:10px;}
.btn-submit{flex:1;background:#2c3325;color:#c8d9b0;font-size:13px;font-weight:600;border:none;padding:12px;border-radius:8px;cursor:pointer;letter-spacing:0.3px;font-family:'DM Sans',sans-serif;transition:opacity 0.15s;}
.btn-submit:hover{opacity:0.87;}
.btn-cancel{padding:12px 18px;background:#fff;border:1.5px solid #e0d8cc;color:#8a7a60;font-size:13px;font-weight:600;border-radius:8px;text-decoration:none;display:inline-flex;align-items:center;transition:background 0.15s;}
.btn-cancel:hover{background:#f8f4ef;}

/* Sidebar kanan */
.sidebar-cards{display:flex;flex-direction:column;gap:12px;}
.side-card{background:#fff;border-radius:10px;border:1px solid #e0d8cc;overflow:hidden;}
.side-card-hd{padding:11px 15px;border-bottom:1px solid #f0ece4;font-family:'DM Serif Display',serif;font-size:13px;color:#2c2416;}
.side-card-body{padding:12px 15px;}

.tip-item{display:flex;align-items:flex-start;gap:9px;padding:7px 0;border-bottom:1px solid #f5f0ea;}
.tip-item:last-child{border-bottom:none;}
.tip-ico{width:28px;height:28px;border-radius:7px;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;background:#edf2e8;}
.tip-text{font-size:12px;color:#5a4a38;line-height:1.5;}
.tip-text strong{font-weight:600;color:#2c2416;display:block;margin-bottom:2px;}

.dark-card{background:#2c3325;border-radius:10px;padding:16px;position:relative;overflow:hidden;}
.dark-card::before{content:'';position:absolute;top:-20px;right:-20px;width:80px;height:80px;background:rgba(143,166,122,0.15);border-radius:50%;}
.dark-card h4{font-family:'DM Serif Display',serif;font-size:14px;color:#e8e0d0;margin:0 0 5px;position:relative;}
.dark-card p{font-size:11.5px;color:rgba(255,255,255,0.3);margin:0 0 12px;line-height:1.6;position:relative;}
.dark-card .contact-item{display:flex;align-items:center;gap:8px;padding:7px 0;border-bottom:1px solid rgba(255,255,255,0.06);position:relative;}
.dark-card .contact-item:last-child{border-bottom:none;}
.dark-card .ci-label{font-size:11px;color:rgba(255,255,255,0.3);}
.dark-card .ci-val{font-size:12px;font-weight:600;color:#c8d9b0;}

.faq-item{padding:8px 0;border-bottom:1px solid #f5f0ea;cursor:pointer;}
.faq-item:last-child{border-bottom:none;}
.faq-q{font-size:12.5px;font-weight:600;color:#2c2416;display:flex;justify-content:space-between;align-items:center;}
.faq-q span{font-size:16px;color:#b09e88;font-weight:300;}
.faq-a{font-size:11.5px;color:#8a7a60;line-height:1.6;margin-top:5px;display:none;}
.faq-item.open .faq-a{display:block;}
.faq-item.open .faq-q span{transform:rotate(45deg);display:inline-block;}

@media(max-width:900px){.create-grid{grid-template-columns:1fr;}}
@media(max-width:600px){.grid2{grid-template-columns:1fr;}.pg-wrap{padding:16px;}}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <div>
            <h1 class="page-title">Ajukan Laporan</h1>
            <p class="page-sub">Ceritakan kejadian dengan detail untuk penanganan yang lebih baik</p>
        </div>
        <a href="{{ route('laporan.index') }}" class="back-btn">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Riwayat Laporan
        </a>
    </div>

    {{-- Stepper --}}
    <div class="stepper">
        <div class="step">
            <div class="step-circle active">1</div>
            <span class="step-text active">Isi Formulir</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-circle idle">2</div>
            <span class="step-text idle">Verifikasi Tim</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-circle idle">3</div>
            <span class="step-text idle">Tindak Lanjut</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-circle idle">4</div>
            <span class="step-text idle">Selesai</span>
        </div>
    </div>

    <div class="create-grid">

        {{-- Form --}}
        <div class="form-card">
            @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">

                    <div>
                        <label class="field-label">Jenis Kasus <span style="color:#b04040;">*</span></label>
                        <select name="jenis_kasus" class="field-input" required>
                            <option value="">— Pilih jenis kasus —</option>
                            <option value="kekerasan" {{ old('jenis_kasus')=='kekerasan' ? 'selected' : '' }}>Kekerasan</option>
                            <option value="pelecehan" {{ old('jenis_kasus')=='pelecehan' ? 'selected' : '' }}>Pelecehan</option>
                            <option value="penipuan"  {{ old('jenis_kasus')=='penipuan'  ? 'selected' : '' }}>Penipuan</option>
                            <option value="lainnya"   {{ old('jenis_kasus')=='lainnya'   ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis_kasus')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>

                    <div class="grid2">
                        <div>
                            <label class="field-label">Kategori</label>
                            <input type="text" name="kategori" value="{{ old('kategori') }}"
                                class="field-input" placeholder="Cth: KDRT, Bullying">
                        </div>
                        <div>
                            <label class="field-label">Tanggal Kejadian</label>
                            <input type="date" name="tanggal_kejadian" value="{{ old('tanggal_kejadian') }}"
                                class="field-input">
                        </div>
                    </div>

                    <div>
                        <label class="field-label">Lokasi Kejadian</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                            class="field-input" placeholder="Cth: Jl. Sudirman, Indramayu">
                    </div>

                    <div>
                        <label class="field-label">Kronologi Kejadian <span style="color:#b04040;">*</span></label>
                        <textarea name="kronologi" class="field-input"
                            placeholder="Ceritakan kejadian secara runtut dan detail. Cantumkan waktu, tempat, pelaku, dan saksi jika ada. Semakin lengkap semakin membantu penanganan.">{{ old('kronologi') }}</textarea>
                        @error('kronologi')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label class="field-label">No. WhatsApp / HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                            class="field-input" placeholder="08xx... (untuk konfirmasi tim)">
                    </div>

                    <div>
                        <label class="field-label">Bukti / Lampiran</label>
                        <div class="upload-zone">
                            <input type="file" name="bukti" accept="image/*">
                            <p class="upload-note">JPG, PNG · Maks. 2MB · Opsional namun sangat membantu</p>
                        </div>
                        @error('bukti')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>

                    <label class="anonim-row">
                        <input type="checkbox" name="anonim" {{ old('anonim') ? 'checked' : '' }}>
                        <div>
                            <div class="anonim-lbl">Laporkan sebagai anonim</div>
                            <div class="anonim-desc">Nama Anda tidak akan ditampilkan. Hanya tim internal yang dapat melihat identitas Anda untuk keperluan verifikasi.</div>
                        </div>
                    </label>

                </div>
                <div class="form-footer">
                    <button type="submit" class="btn-submit">🌿 Kirim Laporan Sekarang</button>
                    <a href="{{ route('laporan.index') }}" class="btn-cancel">Batal</a>
                </div>
            </form>
        </div>

        {{-- Sidebar --}}
        <div class="sidebar-cards">

            {{-- Tips --}}
            <div class="side-card">
                <div class="side-card-hd">💡 Tips Laporan Efektif</div>
                <div class="side-card-body">
                    <div class="tip-item">
                        <div class="tip-ico">📝</div>
                        <div class="tip-text"><strong>Detail & Runtut</strong>Ceritakan kronologi dari awal hingga akhir secara berurutan.</div>
                    </div>
                    <div class="tip-item">
                        <div class="tip-ico">📸</div>
                        <div class="tip-text"><strong>Sertakan Bukti</strong>Foto atau dokumen pendukung mempercepat proses verifikasi.</div>
                    </div>
                    <div class="tip-item">
                        <div class="tip-ico">📍</div>
                        <div class="tip-text"><strong>Lokasi Jelas</strong>Alamat lengkap membantu tim menentukan langkah penanganan.</div>
                    </div>
                    <div class="tip-item">
                        <div class="tip-ico">📞</div>
                        <div class="tip-text"><strong>Kontak Aktif</strong>Nomor HP aktif memudahkan tim menghubungi Anda.</div>
                    </div>
                </div>
            </div>

            {{-- Kontak --}}
            <div class="dark-card">
                <h4>Butuh Bantuan Segera?</h4>
                <p>Hubungi kami langsung jika Anda membutuhkan penanganan darurat.</p>
                <div class="contact-item">
                    <span style="font-size:14px;">📞</span>
                    <div><div class="ci-label">Hotline</div><div class="ci-val">0817-7908-0524</div></div>
                </div>
                <div class="contact-item">
                    <span style="font-size:14px;">🕐</span>
                    <div><div class="ci-label">Jam Operasional</div><div class="ci-val">08.00 – 17.00 WIB</div></div>
                </div>
                <a href="https://wa.me/6281779080524?text=Halo%20Selendang%20Puan%2C%20saya%20butuh%20bantuan%20darurat."
                target="_blank" rel="noopener"
                style="margin-top:14px;display:inline-flex;align-items:center;gap:8px;background:#25D366;color:#fff;font-size:13px;font-weight:600;padding:10px 18px;border-radius:8px;text-decoration:none;transition:background 0.15s;position:relative;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.522 5.843L.054 23.215a.75.75 0 00.904.904l5.372-1.468A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.97 0-3.81-.538-5.387-1.473l-.386-.228-3.19.871.871-3.19-.228-.386A9.955 9.955 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                    Chat di WhatsApp
                </a>
            </div>

            {{-- FAQ --}}
            <div class="side-card">
                <div class="side-card-hd">❓ Pertanyaan Umum</div>
                <div class="side-card-body">
                    <div class="faq-item" onclick="this.classList.toggle('open')">
                        <div class="faq-q">Apakah identitas saya aman? <span>+</span></div>
                        <div class="faq-a">Ya, identitas Anda sepenuhnya terlindungi. Jika memilih anonim, nama Anda tidak akan muncul di manapun.</div>
                    </div>
                    <div class="faq-item" onclick="this.classList.toggle('open')">
                        <div class="faq-q">Berapa lama proses verifikasi? <span>+</span></div>
                        <div class="faq-a">Tim kami akan memverifikasi laporan dalam waktu maksimal 1x24 jam pada hari kerja.</div>
                    </div>
                    <div class="faq-item" onclick="this.classList.toggle('open')">
                        <div class="faq-q">Bagaimana cara memantau laporan? <span>+</span></div>
                        <div class="faq-a">Anda dapat memantau status laporan melalui halaman Riwayat Laporan di dashboard Anda.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>