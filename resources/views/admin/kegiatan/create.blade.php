<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.pg-wrap{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;padding:28px;}
.topbar{display:flex;align-items:center;gap:10px;margin-bottom:22px;}
.back-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;border:1px solid #e8e0d4;color:#6a5c48;font-size:12px;font-weight:600;padding:8px 14px;border-radius:7px;text-decoration:none;}
.back-btn:hover{background:#f8f4ef;}
.page-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0;letter-spacing:-0.3px;}

.form-card{background:#fff;border-radius:12px;border:1px solid #e8e0d4;overflow:hidden;max-width:760px;}
.form-body{padding:24px 28px;display:flex;flex-direction:column;gap:20px;}

.field-label{font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:.8px;display:block;margin-bottom:7px;}
.field-input{width:100%;padding:11px 14px;background:#faf7f3;border:1.5px solid #e8e0d4;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:.15s;}
.field-input:focus{border-color:#8fa67a;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
textarea.field-input{resize:vertical;min-height:120px;}

.grid2{display:grid;grid-template-columns:1fr 1fr;gap:16px;}

.upload-zone{background:#f8f4ef;border:1.5px dashed #ddd5c8;border-radius:10px;padding:20px;text-align:center;}
.upload-zone input[type=file]{width:100%;font-size:12.5px;color:#8a7a60;}
.upload-zone input[type=file]::file-selector-button{
    background:#edf2e8;
    color:#4a6535;
    border:1px solid #c8d9b0;
    border-radius:6px;
    padding:6px 12px;
    font-size:12px;
    font-weight:600;
    cursor:pointer;
    margin-right:10px;
}
.upload-note{font-size:11px;color:#b09e88;margin-top:8px;}
.error-msg{font-size:11px;color:#b04040;margin-top:4px;}

.form-footer{
    padding:16px 28px;
    background:#f8f4ef;
    border-top:1px solid #ede5da;
    display:flex;
    gap:10px;
}

.btn-submit{
    flex:1;
    background:#4a6535;
    color:#fff;
    font-size:13px;
    font-weight:700;
    border:none;
    padding:13px;
    border-radius:8px;
    cursor:pointer;
}

.btn-submit:hover{
    background:#3a5228;
}

.btn-cancel{
    padding:13px 22px;
    background:#fff;
    border:1.5px solid #e8e0d4;
    color:#8a7a60;
    font-size:13px;
    font-weight:600;
    border-radius:8px;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
}

.btn-cancel:hover{
    background:#f8f4ef;
}

@media(max-width:600px){
.grid2{
grid-template-columns:1fr;
}
.pg-wrap{
padding:16px;
}
}
</style>

<div class="pg-wrap">

    <div class="topbar">
        <a href="{{ route('admin.kegiatan.index') }}" class="back-btn">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </a>

        <h1 class="page-title">Tambah Agenda Baru</h1>
    </div>

    <div class="form-card">

        <form action="{{ route('admin.kegiatan.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-body">

                <div>
                    <label class="field-label">Nama / Judul Kegiatan</label>

                    <input
                        type="text"
                        name="judul"
                        class="field-input"
                        value="{{ old('judul') }}"
                        placeholder="Contoh : Workshop Pemberdayaan Perempuan"
                        required>

                    @error('judul')
                        <p class="error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid2">

                    <div>
                        <label class="field-label">Tanggal Pelaksanaan</label>

                        <input
                            type="date"
                            name="tanggal"
                            class="field-input"
                            value="{{ old('tanggal') }}"
                            required>

                        @error('tanggal')
                            <p class="error-msg">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="field-label">Lokasi</label>

                        <input
                            type="text"
                            name="lokasi"
                            class="field-input"
                            value="{{ old('lokasi') }}"
                            placeholder="Contoh : Balai Desa"
                            required>

                        @error('lokasi')
                            <p class="error-msg">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- LINK WA --}}
                <div>
                    <label class="field-label">Link Grup WhatsApp</label>

                    <input
                        type="url"
                        name="wa_grup"
                        class="field-input"
                        value="{{ old('wa_grup') }}"
                        placeholder="https://chat.whatsapp.com/xxxxxxxx">

                    <small style="color:#9e8e78">
                        Opsional. Peserta akan diarahkan ke grup ini setelah berhasil mendaftar.
                    </small>

                    @error('wa_grup')
                        <p class="error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="field-label">Deskripsi Kegiatan</label>

                    <textarea
                        name="deskripsi"
                        class="field-input"
                        placeholder="Jelaskan detail kegiatan..."
                        required>{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <p class="error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div>

                    <label class="field-label">Poster / Foto Kegiatan</label>

                    <div class="upload-zone">

                        <input
                            type="file"
                            name="gambar"
                            accept="image/*">

                        <p class="upload-note">
                            JPG / PNG • Maksimal 2MB
                        </p>

                    </div>

                    @error('gambar')
                        <p class="error-msg">{{ $message }}</p>
                    @enderror

                </div>

            </div>

            <div class="form-footer">

                <button type="submit" class="btn-submit">
                    Terbitkan Agenda
                </button>

                <a href="{{ route('admin.kegiatan.index') }}"
                   class="btn-cancel">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>
</x-app-layout>