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

.field-label{font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:0.8px;display:block;margin-bottom:7px;}
.field-input{width:100%;padding:11px 14px;background:#faf7f3;border:1.5px solid #e8e0d4;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color 0.15s;}
.field-input:focus{border-color:#8fa67a;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
textarea.field-input{resize:vertical;min-height:120px;}
select.field-input{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238a7a60' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:36px;}

.grid2{display:grid;grid-template-columns:1fr 1fr;gap:16px;}

.current-img{display:flex;align-items:center;gap:12px;background:#f8f4ef;border-radius:8px;padding:10px 12px;margin-bottom:10px;}
.current-img img{width:52px;height:52px;object-fit:cover;border-radius:7px;flex-shrink:0;}
.current-img p{font-size:11px;color:#8a7a60;margin:0;}
.current-img strong{font-size:12px;color:#2c2416;}

.upload-zone{background:#f8f4ef;border:1.5px dashed #ddd5c8;border-radius:10px;padding:20px;text-align:center;}
.upload-zone input[type=file]{width:100%;font-size:12.5px;color:#8a7a60;}
.upload-zone input[type=file]::file-selector-button{background:#edf2e8;color:#4a6535;border:1px solid #c8d9b0;border-radius:6px;padding:6px 12px;font-size:12px;font-weight:600;cursor:pointer;margin-right:10px;}
.upload-note{font-size:11px;color:#b09e88;margin-top:8px;}

.error-msg{font-size:11px;color:#b04040;margin-top:4px;}

.form-footer{padding:16px 28px;background:#f8f4ef;border-top:1px solid #ede5da;display:flex;gap:10px;}
.btn-submit{flex:1;background:#4a6535;color:#deecd0;font-size:13px;font-weight:700;border:none;padding:13px;border-radius:8px;cursor:pointer;letter-spacing:0.3px;}
.btn-submit:hover{background:#3a5228;}
.btn-cancel{padding:13px 22px;background:#fff;border:1.5px solid #e8e0d4;color:#8a7a60;font-size:13px;font-weight:600;border-radius:8px;text-decoration:none;display:inline-flex;align-items:center;}
.btn-cancel:hover{background:#f8f4ef;}

@media(max-width:600px){.grid2{grid-template-columns:1fr;}.pg-wrap{padding:16px;}}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <a href="{{ route('admin.kegiatan.index') }}" class="back-btn">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <h1 class="page-title">Edit Agenda</h1>
    </div>

    <div class="form-card">
        <form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-body">

                <div>
                    <label class="field-label">Nama / Judul Kegiatan</label>
                    <input type="text" name="judul" value="{{ old('judul', $kegiatan->judul) }}" required class="field-input" placeholder="Contoh: Workshop Pemberdayaan Perempuan">
                    @error('judul')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

                <div class="grid2">
                    <div>
                        <label class="field-label">Tanggal Pelaksanaan</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal) }}" required class="field-input">
                        @error('tanggal')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="field-label">Lokasi / Tempat</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}" required class="field-input" placeholder="Contoh: Balai Desa Indramayu">
                        @error('lokasi')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="field-label">Status Kegiatan</label>
                    <select name="status" class="field-input">
                        <option value="aktif" {{ old('status', $kegiatan->status) == 'aktif' ? 'selected' : '' }}>Aktif (Akan Datang)</option>
                        <option value="selesai" {{ old('status', $kegiatan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div>
                    <label class="field-label">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi" required class="field-input" placeholder="Jelaskan detail kegiatan di sini...">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                    @error('deskripsi')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="field-label">Poster / Foto Kegiatan</label>
                    @if($kegiatan->gambar)
                    <div class="current-img">
                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}">
                        <div>
                            <strong>Poster saat ini</strong>
                            <p>Upload baru untuk mengganti, atau biarkan kosong</p>
                        </div>
                    </div>
                    @endif
                    <div class="upload-zone">
                        <input type="file" name="gambar" accept="image/*">
                        <p class="upload-note">JPG, PNG · Maks. 2MB · Kosongkan jika tidak ingin mengubah</p>
                    </div>
                    @error('gambar')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

            </div>
            <div class="form-footer">
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
                <a href="{{ route('admin.kegiatan.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-app-layout>