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

.status-zone{padding:20px 24px;background:#2c3325;border-bottom:1px solid rgba(255,255,255,0.06);}
.status-zone-label{font-size:10px;font-weight:700;color:rgba(255,255,255,0.35);text-transform:uppercase;letter-spacing:0.8px;margin-bottom:10px;}
.status-zone h3{font-family:'DM Serif Display',serif;font-size:15px;color:#e8e0d0;margin:0 0 12px;}
.status-select{width:100%;padding:11px 14px;background:#1e2519;border:1.5px solid rgba(143,166,122,0.3);border-radius:8px;font-size:13px;color:#c8d9b0;font-family:'DM Sans',sans-serif;outline:none;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238fa67a' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:36px;}
.status-select:focus{border-color:#8fa67a;}

.form-body{padding:22px 24px;display:flex;flex-direction:column;gap:16px;}
.field-label{font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:0.8px;display:block;margin-bottom:7px;}
.field-input{width:100%;padding:11px 14px;background:#faf7f3;border:1.5px solid #e8e0d4;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color 0.15s;}
.field-input:focus{border-color:#8fa67a;background:#fff;}
textarea.field-input{resize:vertical;min-height:130px;}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:14px;}

.form-footer{padding:16px 24px;background:#f8f4ef;border-top:1px solid #ede5da;display:flex;gap:10px;}
.btn-submit{flex:1;background:#4a6535;color:#deecd0;font-size:13px;font-weight:700;border:none;padding:13px;border-radius:8px;cursor:pointer;}
.btn-submit:hover{background:#3a5228;}
.btn-cancel{padding:13px 22px;background:#fff;border:1.5px solid #e8e0d4;color:#8a7a60;font-size:13px;font-weight:600;border-radius:8px;text-decoration:none;display:inline-flex;align-items:center;}
.btn-cancel:hover{background:#f8f4ef;}

@media(max-width:600px){.grid2{grid-template-columns:1fr;}.pg-wrap{padding:16px;}}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <a href="{{ route('admin.laporan.show', $laporan->id) }}" class="back-btn">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <h1 class="page-title">Update Laporan #{{ $laporan->id }}</h1>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.laporan.update', $laporan->id) }}">
            @csrf @method('PUT')

            {{-- Status — paling penting, taruh di atas --}}
            <div class="status-zone">
                <div class="status-zone-label">Status Penanganan</div>
                <h3>Tentukan status laporan ini</h3>
                <select name="status" class="status-select">
                    <option value="menunggu" {{ $laporan->status == 'menunggu' ? 'selected' : '' }}>Menunggu — Belum Diproses</option>
                    <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : '' }}>Diproses — Sedang Ditangani</option>
                    <option value="selesai"  {{ $laporan->status == 'selesai'  ? 'selected' : '' }}>Selesai — Kasus Tuntas</option>
                    <option value="ditolak"  {{ $laporan->status == 'ditolak'  ? 'selected' : '' }}>Ditolak — Laporan Ditolak</option>
                </select>
            </div>

            <div class="form-body">
                <div class="grid2">
                    <div>
                        <label class="field-label">Jenis Kasus</label>
                        <input type="text" name="jenis_kasus" value="{{ old('jenis_kasus', $laporan->jenis_kasus) }}" required class="field-input">
                    </div>
                    <div>
                        <label class="field-label">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori', $laporan->kategori) }}" class="field-input">
                    </div>
                </div>

                <div>
                    <label class="field-label">Lokasi Kejadian</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $laporan->lokasi) }}" class="field-input">
                </div>

                <div>
                    <label class="field-label">Kronologi Kejadian</label>
                    <textarea name="kronologi" required class="field-input">{{ old('kronologi', $laporan->kronologi) }}</textarea>
                </div>

                <div>
                    <label class="field-label">No. WhatsApp / HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $laporan->no_hp) }}" class="field-input">
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
                <a href="{{ route('admin.laporan.show', $laporan->id) }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-app-layout>