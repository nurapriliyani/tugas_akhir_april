<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
        
        * { box-sizing: border-box; }
        
        .detail-wrap {
            font-family: 'DM Sans', sans-serif;
            background: #f5f0e8;
            min-height: 100vh;
            padding: 40px;
        }
        
        .page-header {
            margin-bottom: 32px;
        }
        
        .page-title {
            font-family: 'DM Serif Display', serif;
            font-size: 36px;
            color: #2c2416;
            margin: 0 0 8px;
            letter-spacing: -0.5px;
        }
        
        .page-subtitle {
            font-size: 16px;
            color: #9e8e78;
            margin: 0;
        }
        
        .detail-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .detail-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e8e0d4;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(44, 36, 22, 0.08);
        }
        
        .card-header {
            background: linear-gradient(135deg, #8fa67a 0%, #6b8c52 100%);
            padding: 48px 32px;
            text-align: center;
            color: white;
        }
        
        .user-avatar-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 3px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Serif Display', serif;
            font-size: 40px;
            margin: 0 auto 20px;
        }
        
        .user-name-large {
            font-family: 'DM Serif Display', serif;
            font-size: 28px;
            margin: 0 0 8px;
        }
        
        .user-email-large {
            font-size: 15px;
            opacity: 0.9;
            margin: 0;
        }
        
        .card-body {
            padding: 48px;
        }
        
        .detail-section {
            margin-bottom: 32px;
        }
        
        .detail-section:last-child {
            margin-bottom: 0;
        }
        
        .section-label {
            font-size: 12px;
            font-weight: 700;
            color: #b09e88;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: block;
        }
        
        .section-content {
            font-size: 15px;
            color: #2c2416;
            margin-bottom: 20px;
        }
        
        .detail-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 24px;
            padding: 16px 0;
            border-bottom: 1px solid #f2ece4;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-size: 12px;
            font-weight: 700;
            color: #b09e88;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        
        .detail-value {
            font-size: 15px;
            color: #2c2416;
            font-weight: 500;
        }
        
        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 16px;
            border-radius: 10px;
            width: fit-content;
        }
        
        .role-admin {
            background: rgba(144, 96, 184, 0.12);
            color: #7060a8;
            border: 1px solid rgba(144, 96, 184, 0.2);
        }
        
        .role-user {
            background: rgba(107, 140, 82, 0.12);
            color: #6b8c52;
            border: 1px solid rgba(107, 140, 82, 0.2);
        }
        
        .divider {
            height: 1px;
            background: #ede5da;
            margin: 32px 0;
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 40px;
            padding-top: 32px;
            border-top: 1px solid #ede5da;
        }
        
        .btn-action {
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
            gap: 8px;
            transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
        }
        
        .btn-edit {
            background: #f5ede4;
            color: #b07040;
            border: 1.5px solid #ede5da;
        }
        
        .btn-edit:hover {
            background: #ede4d8;
            border-color: #b07040;
            transform: translateY(-2px);
        }
        
        .btn-back {
            background: #edf2e8;
            color: #6b8c52;
            border: 1.5px solid #ede5da;
        }
        
        .btn-back:hover {
            background: #e8e0d4;
            border-color: #6b8c52;
            transform: translateY(-2px);
        }
        
        .info-box {
            background: #f0f4ed;
            border-left: 5px solid #6b8c52;
            padding: 16px 18px;
            border-radius: 10px;
            font-size: 14px;
            color: #2c3325;
            margin-bottom: 32px;
        }
        
        .info-box strong {
            display: block;
            margin-bottom: 6px;
            font-size: 15px;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 14px;
            background: #edf2e8;
            color: #6b8c52;
            border-radius: 20px;
        }
        
        @media (max-width: 768px) {
            .detail-wrap {
                padding: 24px;
            }
            
            .page-title {
                font-size: 28px;
            }
            
            .card-header {
                padding: 32px 24px;
            }
            
            .card-body {
                padding: 32px;
            }
            
            .detail-row {
                grid-template-columns: 120px 1fr;
                gap: 18px;
            }
            
            .user-avatar-large {
                width: 80px;
                height: 80px;
                font-size: 32px;
            }
            
            .user-name-large {
                font-size: 24px;
            }
        }
        
        @media (max-width: 480px) {
            .detail-wrap {
                padding: 16px;
            }
            
            .page-title {
                font-size: 24px;
            }
            
            .card-header {
                padding: 24px 16px;
            }
            
            .card-body {
                padding: 24px;
            }
            
            .detail-row {
                grid-template-columns: 100px 1fr;
                gap: 12px;
            }
            
            .action-buttons {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }
    </style>

    <div class="detail-wrap">
        {{-- Header --}}
        <div class="page-header">
            <h1 class="page-title">👤 Detail Pengguna</h1>
            <p class="page-subtitle">Lihat informasi lengkap pengguna</p>
        </div>

        {{-- Detail Card --}}
        <div class="detail-container">
            <div class="detail-card">
                {{-- Card Header (User Info) --}}
                <div class="card-header">
                    <div class="user-avatar-large">
                        {{ strtoupper(substr($user->nama, 0, 1)) }}
                    </div>
                    <h2 class="user-name-large">{{ $user->nama }}</h2>
                    <p class="user-email-large">{{ $user->email }}</p>
                </div>

                {{-- Card Body (Details) --}}
                <div class="card-body">
                    {{-- Info Box --}}
                    <div class="info-box">
                        <strong>ℹ️ Informasi Profil</strong>
                        Detail lengkap akun pengguna ini.
                    </div>

                    {{-- Section: Akun --}}
                    <div class="detail-section">
                        <span class="section-label">📋 Informasi Akun</span>
                        <div class="detail-row">
                            <span class="detail-label">Nama</span>
                            <span class="detail-value">{{ $user->nama }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Email</span>
                            <span class="detail-value">{{ $user->email }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">ID User</span>
                            <span class="detail-value">#{{ $user->id }}</span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    {{-- Section: Hak Akses --}}
                    <div class="detail-section">
                        <span class="section-label">🔐 Hak Akses</span>
                        <div style="margin-bottom: 16px;">
                            <span class="role-badge {{ $user->role == 'admin' ? 'role-admin' : 'role-user' }}">
                                {{ $user->role == 'admin' ? '👑 Administrator' : '👤 User Biasa' }}
                            </span>
                        </div>
                        @if($user->role == 'admin')
                            <div class="section-content">
                                Pengguna ini memiliki akses penuh ke semua fitur dan pengaturan sistem.
                            </div>
                        @else
                            <div class="section-content">
                                Pengguna ini hanya bisa melihat dan mengelola laporan yang relevan.
                            </div>
                        @endif
                    </div>

                    <div class="divider"></div>

                    {{-- Section: Metadata --}}
                    <div class="detail-section">
                        <span class="section-label">📅 Informasi Sistem</span>
                        <div class="detail-row">
                            <span class="detail-label">Bergabung</span>
                            <span class="detail-value">{{ $user->created_at->translatedFormat('d F Y H:i') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Diperbarui</span>
                            <span class="detail-value">{{ $user->updated_at->translatedFormat('d F Y H:i') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Status</span>
                            <span class="detail-value">
                                <span class="status-badge">✓ Aktif</span>
                            </span>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="action-buttons">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn-action btn-edit">
                            ✏️ Edit User
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="btn-action btn-back">
                            ← Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>