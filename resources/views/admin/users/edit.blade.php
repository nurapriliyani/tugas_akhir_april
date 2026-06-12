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
        
        .form-header {
            margin-bottom: 32px;
        }
        
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
        
        .form-group {
            margin-bottom: 28px;
        }
        
        .form-group:last-of-type {
            margin-bottom: 0;
        }
        
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
            border-color: #b07040;
            box-shadow: 0 0 0 4px rgba(176, 112, 64, 0.1);
        }
        
        .form-input:disabled {
            background: #f9f7f3;
            color: #9e8e78;
            cursor: not-allowed;
        }
        
        .form-input::placeholder {
            color: #c8bfb0;
        }
        
        .form-error {
            font-size: 13px;
            color: #a85a5a;
            margin-top: 8px;
        }
        
        .form-hint {
            font-size: 13px;
            color: #9e8e78;
            margin-top: 8px;
            font-style: italic;
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
            transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
        }
        
        .btn-submit {
            background: #b07040;
            color: white;
        }
        
        .btn-submit:hover {
            background: #9a6035;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(176, 112, 64, 0.2);
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
        
        .warning-box {
            background: #fef8f0;
            border-left: 5px solid #b07040;
            padding: 16px 18px;
            border-radius: 10px;
            margin-bottom: 32px;
            font-size: 14px;
            color: #7a4f3a;
        }
        
        .warning-box strong {
            display: block;
            margin-bottom: 6px;
            font-size: 15px;
        }
        
        .divider {
            height: 1px;
            background: #ede5da;
            margin: 32px 0;
        }
        
        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #6b8c52;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .form-wrap {
                padding: 24px;
            }
            
            .form-title {
                font-size: 28px;
            }
            
            .form-card {
                padding: 32px;
            }
            
            .form-actions {
                gap: 12px;
            }
        }
        
        @media (max-width: 480px) {
            .form-wrap {
                padding: 16px;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            .form-card {
                padding: 24px;
            }
            
            .form-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="form-wrap">
        {{-- Header --}}
        <div class="form-container">
            <div class="form-header">
                <h1 class="form-title">✏️ Edit Pengguna</h1>
                <p class="form-subtitle">Update informasi & hak akses pengguna</p>
            </div>

            {{-- Form Card --}}
            <div class="form-card">
                <div class="warning-box">
                    <strong>⚠️ Informasi Penting</strong>
                    Anda hanya dapat mengubah hak akses (role) pengguna. Untuk mengubah nama atau email, pengguna harus melakukannya melalui profil pribadi mereka.
                </div>

                <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    {{-- Section: Identitas Pengguna --}}
                    <div class="section-title">📋 Identitas Pengguna</div>

                    {{-- Nama Lengkap (Read-only) --}}
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input 
                            type="text" 
                            class="form-input" 
                            value="{{ $user->nama }}"
                            disabled
                        >
                        <div class="form-hint">Nama hanya dapat diubah oleh pengguna melalui profil pribadi</div>
                    </div>

                    {{-- Email (Read-only) --}}
                    <div class="form-group">
                        <label class="form-label">Alamat Email</label>
                        <input 
                            type="email" 
                            class="form-input" 
                            value="{{ $user->email }}"
                            disabled
                        >
                        <div class="form-hint">Email hanya dapat diubah oleh pengguna melalui profil pribadi</div>
                    </div>

                    <div class="divider"></div>

                    {{-- Section: Hak Akses --}}
                    <div class="section-title">🔐 Hak Akses Sistem</div>

                    {{-- Role --}}
                    <div class="form-group">
                        <label class="form-label">Tingkat Akses</label>
                        <select 
                            name="role" 
                            class="form-select @error('role') border-red-500 @enderror"
                            required
                        >
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                👤 User Biasa - Hanya bisa melihat dan mengelola laporan
                            </option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                👑 Administrator - Akses penuh ke semua fitur dan pengaturan
                            </option>
                        </select>
                        @error('role')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            💾 Update Role
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn-cancel">
                            ← Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>