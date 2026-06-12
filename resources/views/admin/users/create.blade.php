<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');

* { box-sizing: border-box; }

.form-wrap {
    font-family: 'DM Sans', sans-serif;
    background: #f5f0e8;
    min-height: 100vh;
    padding: 40px;
}

.form-header { margin-bottom: 32px; }

.form-title {
    font-family: 'DM Serif Display', serif;
    font-size: 36px;
    color: #2c2416;
    margin: 0 0 8px;
    letter-spacing: -0.5px;
}

.form-subtitle {
    font-size: 16px;
    color: #9e8e78;
    margin: 0;
}

.form-container {
    max-width: 800px;
    margin: 0 auto;
}

.form-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e8e0d4;
    padding: 48px;
    box-shadow: 0 2px 8px rgba(44, 36, 22, 0.08);
}

.form-group { margin-bottom: 28px; }
.form-group:last-of-type { margin-bottom: 0; }

.form-label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: #b09e88;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.form-input,
.form-select {
    width: 100%;
    padding: 16px 18px;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    color: #2c2416;
    background: #fff;
    border: 1.5px solid #e8e0d4;
    border-radius: 12px;
    transition: all 0.2s;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    border-color: #6b8c52;
    box-shadow: 0 0 0 4px rgba(107, 140, 82, 0.1);
}

.form-input::placeholder { color: #c8bfb0; }

.form-input.has-error,
.form-select.has-error {
    border-color: #a85a5a;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.form-error {
    font-size: 13px;
    color: #a85a5a;
    margin-top: 8px;
}

.form-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-top: 40px;
}

.btn-submit,
.btn-cancel {
    padding: 16px 24px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: all 0.2s;
    font-family: 'DM Sans', sans-serif;
}

.btn-submit {
    background: #6b8c52;
    color: white;
}

.btn-submit:hover {
    background: #5a7a42;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(107, 140, 82, 0.2);
}

.btn-cancel {
    background: #ede5da;
    color: #6b8c52;
    border: 1.5px solid #e8e0d4;
}

.btn-cancel:hover {
    background: #e8e0d4;
    color: #5a7a42;
    border-color: #6b8c52;
}

.info-box {
    background: #edf2e8;
    border-left: 5px solid #6b8c52;
    padding: 16px 18px;
    border-radius: 10px;
    margin-bottom: 32px;
    font-size: 14px;
    color: #2c3325;
}

.info-box strong {
    display: block;
    margin-bottom: 6px;
    font-size: 15px;
}

.alert-error-box {
    background: #fbeaea;
    border-left: 5px solid #a85a5a;
    padding: 16px 18px;
    border-radius: 10px;
    margin-bottom: 24px;
    font-size: 13px;
    color: #8a3030;
}
.alert-error-box strong { display:block; margin-bottom:6px; font-size:14px; }
.alert-error-box ul { margin:0; padding-left:18px; }
.alert-error-box li { margin-bottom:2px; }

@media (max-width: 768px) {
    .form-wrap { padding: 24px; }
    .form-title { font-size: 28px; }
    .form-card { padding: 32px; }
    .form-row { grid-template-columns: 1fr; gap: 20px; }
    .form-actions { grid-template-columns: 1fr; gap: 12px; }
}

@media (max-width: 480px) {
    .form-wrap { padding: 16px; }
    .form-title { font-size: 24px; }
    .form-card { padding: 24px; }
}
</style>

<div class="form-wrap">
    <div class="form-container">
        <div class="form-header">
            <h1 class="form-title">✨ Tambah Pengguna Baru</h1>
            <p class="form-subtitle">Daftarkan anggota baru ke sistem</p>
        </div>

        <div class="form-card">

            @if($errors->any())
            <div class="alert-error-box">
                <strong>⚠️ Terjadi kesalahan</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="info-box">
                <strong>ℹ️ Informasi</strong>
                Lengkapi semua data berikut untuk membuat akun pengguna baru.
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        class="form-input {{ $errors->has('name') ? 'has-error' : '' }}"
                        placeholder="Contoh: Ahmad Maulana"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label">Alamat Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-input {{ $errors->has('email') ? 'has-error' : '' }}"
                        placeholder="contoh@domain.com"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password & Role Row --}}
                <div class="form-row">
                    {{-- Password --}}
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-input {{ $errors->has('password') ? 'has-error' : '' }}"
                            placeholder="Minimal 8 karakter"
                            required
                        >
                        @error('password')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="form-group">
                        <label class="form-label">Hak Akses</label>
                        <select
                            name="role"
                            class="form-select {{ $errors->has('role') ? 'has-error' : '' }}"
                            required
                        >
                            <option value="">-- Pilih Role --</option>
                            <option value="pelapor" {{ old('role') == 'pelapor' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrasi</option>
                        </select>
                        @error('role')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Actions --}}
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        💾 Simpan Pengguna
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn-cancel">
                        ← Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>