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
.form-body{padding:22px 24px;display:flex;flex-direction:column;gap:16px;}

.field-label{font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:0.8px;display:block;margin-bottom:7px;}
.field-input{width:100%;padding:11px 14px;background:#faf7f3;border:1.5px solid #e8e0d4;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color 0.15s;}
.field-input:focus{border-color:#8fa67a;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
textarea.field-input{resize:vertical;min-height:130px;}
select.field-input{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238a7a60' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;padding-right:36px;}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.error-msg{font-size:11px;color:#b04040;margin-top:4px;}

.form-footer{padding:16px 24px;background:#f8f4ef;border-top:1px solid #ede5da;display:flex;gap:10px;}
.btn-submit{flex:1;background:#4a6535;color:#deecd0;font-size:13px;font-weight:700;border:none;padding:13px;border-radius:8px;cursor:pointer;}
.btn-submit:hover{background:#3a5228;}
.btn-cancel{padding:13px 22px;background:#fff;border:1.5px solid #e8e0d4;color:#8a7a60;font-size:13px;font-weight:600;border-radius:8px;text-decoration:none;display:inline-flex;align-items:center;}
.btn-cancel:hover{background:#f8f4ef;}

@media(max-width:600px){.grid2{grid-template-columns:1fr;}.pg-wrap{padding:16px;}}
</style>

<div class="pg-wrap">
    <div class="topbar">
        <a href="{{ route('admin.laporan.index') }}" class="back-btn">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <h1 class="page-title">Tambah Laporan Manual</h1>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.laporan.store') }}">
            @csrf
            <div class="form-body">

                <div>
                    <label class="field-label">Pelapor</label>
                    <select name="user_id" required class="field-input">
                        <option value="">— Pilih user —</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

                <div class="grid2">
                    <div>
                        <label class="field-label">Jenis Kasus</label>
                        <input type="text" name="jenis_kasus" value="{{ old('jenis_kasus') }}" required class="field-input" placeholder="Contoh: Kekerasan Rumah Tangga">
                        @error('jenis_kasus')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="field-label">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori') }}" class="field-input" placeholder="Contoh: KDRT">
                    </div>
                </div>

                <div class="grid2">
                    <div>
                        <label class="field-label">Lokasi Kejadian</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="field-input" placeholder="Contoh: Indramayu">
                    </div>
                    <div>
                        <label class="field-label">No. WhatsApp / HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="field-input" placeholder="08xx...">
                    </div>
                </div>

                <div>
                    <label class="field-label">Kronologi Kejadian</label>
                    <textarea name="kronologi" required class="field-input" placeholder="Ceritakan kronologi kejadian secara detail...">{{ old('kronologi') }}</textarea>
                    @error('kronologi')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="field-label">Status Awal</label>
                    <select name="status" required class="field-input">
                        <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai"  {{ old('status') == 'selesai'  ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak"  {{ old('status') == 'ditolak'  ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    @error('status')<p class="error-msg">{{ $message }}</p>@enderror
                </div>

            </div>
            <div class="form-footer">
                <button type="submit" class="btn-submit">Simpan Laporan</button>
                <a href="{{ route('admin.laporan.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-app-layout>