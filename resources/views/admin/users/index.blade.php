<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');

* { box-sizing: border-box; }

.user-wrap {
    font-family: 'DM Sans', sans-serif;
    background: #f5f0e8;
    min-height: 100vh;
    padding: 28px;
}

.page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 16px;
}

.ph-title {
    font-family: 'DM Serif Display', serif;
    font-size: 28px;
    color: #2c2416;
    margin: 0;
    letter-spacing: -0.3px;
}

.btn-group{display:flex;gap:8px;flex-wrap:wrap;}
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:#4a6535;color:#deecd0;font-size:12px;font-weight:600;padding:10px 18px;border-radius:7px;text-decoration:none;border:none;cursor:pointer;transition:opacity 0.15s;}
.btn-primary:hover{opacity:0.87;}

.table-card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e8e0d4;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(44, 36, 22, 0.05);
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead tr {
    border-bottom: 1px solid #ede5da;
}

th {
    text-align: left;
    padding: 14px 18px;
    background: #f9f7f3;
}

th span {
    font-size: 10px;
    font-weight: 700;
    color: #b09e88;
    letter-spacing: 0.8px;
    text-transform: uppercase;
}

tbody tr {
    border-bottom: 1px solid #f2ece4;
    transition: background 0.15s;
}

tbody tr:hover {
    background: #faf8f5;
}

tbody tr:last-child {
    border-bottom: none;
}

td {
    padding: 16px 18px;
}

.user-cell {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #8fa67a, #6b8c52);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-family: 'DM Serif Display', serif;
    font-size: 14px;
    font-weight: 600;
    flex-shrink: 0;
}

.user-info h4 {
    font-size: 13px;
    font-weight: 600;
    color: #2c2416;
    margin: 0 0 3px;
}

.user-info p {
    font-size: 11px;
    color: #9e8e78;
    margin: 0;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 8px;
    white-space: nowrap;
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

.action-group {
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-action {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: 1px solid #ede5da;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-view  { color: #6b8c52; }
.btn-view:hover  { background: #edf2e8; border-color: #6b8c52; }

.btn-edit  { color: #b07040; }
.btn-edit:hover  { background: #f5ede4; border-color: #b07040; }

.btn-delete { color: #a85a5a; }
.btn-delete:hover { background: #fbeaea; border-color: #a85a5a; }

.empty-state {
    text-align: center;
    padding: 48px 24px;
    color: #b09e88;
}

.empty-state-icon  { font-size: 48px; margin-bottom: 16px; }
.empty-state-text  { font-size: 13px; margin-bottom: 24px; }

.pagination {
    display: flex;
    justify-content: center;
    gap: 6px;
    padding: 16px;
    border-top: 1px solid #ede5da;
}

.pagination a,
.pagination span {
    padding: 8px 12px;
    font-size: 12px;
    border-radius: 6px;
    border: 1px solid #ede5da;
    text-decoration: none;
    color: #6b8c52;
    transition: all 0.2s;
}

.pagination a:hover { background: #edf2e8; border-color: #6b8c52; }
.pagination .active { background: #6b8c52; color: white; border-color: #6b8c52; }

@media (max-width: 768px) {
    .user-wrap    { padding: 16px; }
    .page-header  { flex-direction: column; align-items: flex-start; }
    .ph-title     { font-size: 22px; }
    .btn-group    { width: 100%; }
    .btn-primary  { flex: 1; justify-content: center; }
    table         { font-size: 13px; }
    th, td        { padding: 12px; }
    .user-info h4 { font-size: 12px; }
    .action-group { flex-wrap: wrap; }
}
</style>

<div class="user-wrap">
    {{-- Header --}}
    <div class="page-header">
        <h1 class="ph-title">Kelola Pengguna</h1>
        <div class="btn-group">
            <a href="{{ route('admin.users.export.pdf') }}" class="btn-primary" target="_blank">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
                Export PDF
            </a>
            <a href="{{ route('admin.users.create') }}" class="btn-primary">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Tambah Pengguna
            </a>
        </div>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div style="background:#edf2e8; border:1px solid #c8d9b0; color:#4a6535; padding:12px 16px; border-radius:10px; margin-bottom:16px; font-size:13px; font-weight:600; display:flex; align-items:center; gap:10px;">
            <span>🌿</span> {{ session('success') }}
        </div>
    @endif

    {{-- Table Card --}}
    <div class="table-card">
        @if($users->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th><span>Nama &amp; Email</span></th>
                        <th><span>Hak Akses</span></th>
                        <th style="text-align: center;"><span>Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="user-avatar">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div class="user-info">
                                        <h4>{{ $user->name }}</h4>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="role-badge {{ $user->role == 'admin' ? 'role-admin' : 'role-user' }}">
                                    {{ $user->role == 'admin' ? 'Administrasi' : 'User' }}
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <div class="action-group" style="justify-content:center;">
                                    <a href="{{ route('admin.users.show', $user) }}" class="btn-action btn-view" title="Lihat Detail">
                                        👁️
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn-action btn-edit" title="Edit User">
                                        ✏️
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Hapus User">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $users->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <div class="empty-state-text">Belum ada pengguna terdaftar</div>
                <a href="{{ route('admin.users.create') }}" class="btn-primary" style="display:inline-flex;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                    Buat Pengguna Pertama
                </a>
            </div>
        @endif
    </div>
</div>
</x-app-layout>