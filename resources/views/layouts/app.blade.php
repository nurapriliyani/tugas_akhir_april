<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Selendang Puan') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *{box-sizing:border-box;margin:0;padding:0;}
        body{font-family:'DM Sans',sans-serif;background:#f5f0e8;display:flex;min-height:100vh;}

        /* ── SIDEBAR ── */
        .sidebar{
            width:220px;flex-shrink:0;
            background:#f5f0e8;
            border-right:1px solid #e0d8cc;
            display:flex;flex-direction:column;
            position:fixed;top:0;left:0;height:100vh;
            z-index:50;
        }
        .sidebar-logo{
            padding:22px 20px 18px;
            border-bottom:1px solid #e0d8cc;
        }
        .logo-mark{
            width:32px;height:32px;
            background:#2c3325;
            border-radius:8px;
            display:flex;align-items:center;justify-content:center;
            color:#c8d9b0;font-family:'DM Serif Display',serif;
            font-size:15px;font-weight:600;
            margin-bottom:10px;
        }
        .logo-name{font-family:'DM Serif Display',serif;font-size:13px;color:#2c2416;line-height:1.3;}
        .logo-sub{font-size:10px;color:#b09e88;letter-spacing:0.4px;margin-top:1px;}

        .nav-section{
            font-size:9px;font-weight:700;color:#c0b09c;
            letter-spacing:1.4px;text-transform:uppercase;
            padding:16px 20px 5px;
        }
        .nav-link{
            display:flex;align-items:center;gap:9px;
            padding:9px 20px;
            color:#8a7a60;font-size:13px;font-weight:500;
            text-decoration:none;
            border-left:2px solid transparent;
            transition:all 0.15s;
            position:relative;
        }
        .nav-link:hover{color:#2c2416;background:rgba(44,35,22,0.04);}
        .nav-link.active{
            color:#2c3325;font-weight:600;
            background:rgba(44,51,37,0.07);
            border-left-color:#6b8c52;
        }
        .nav-link .nav-icon{
            width:30px;height:30px;border-radius:7px;
            display:flex;align-items:center;justify-content:center;
            font-size:13px;flex-shrink:0;
            background:rgba(44,35,22,0.05);
            transition:background 0.15s;
        }
        .nav-link.active .nav-icon{background:#2c3325;font-size:13px;}
        .nav-link.active .nav-icon span{filter:brightness(10);}

        .sidebar-footer{
            margin-top:auto;
            border-top:1px solid #e0d8cc;
            padding:14px 20px;
        }
        .user-row{
            display:flex;align-items:center;gap:9px;
            padding:8px 10px;border-radius:9px;
            cursor:pointer;transition:background 0.15s;
            position:relative;
        }
        .user-row:hover{background:rgba(44,35,22,0.05);}
        .user-avatar{
            width:32px;height:32px;
            background:#2c3325;
            border-radius:50%;
            display:flex;align-items:center;justify-content:center;
            color:#c8d9b0;font-family:'DM Serif Display',serif;
            font-size:13px;font-weight:600;flex-shrink:0;
        }
        .user-name{font-size:12.5px;font-weight:600;color:#2c2416;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
        .user-role{font-size:10px;color:#b09e88;}
        .user-chevron{margin-left:auto;color:#c0b09c;flex-shrink:0;}

        /* Dropdown */
        .user-dropdown{
            position:absolute;bottom:calc(100% + 6px);left:0;right:0;
            background:#fff;border:1px solid #e8e0d4;
            border-radius:10px;overflow:hidden;
            box-shadow:0 4px 20px rgba(44,35,22,0.1);
            display:none;
        }
        .user-dropdown.open{display:block;}
        .user-dropdown a,.user-dropdown button{
            display:flex;align-items:center;gap:8px;
            padding:10px 14px;width:100%;
            color:#5a4a38;font-size:12.5px;font-weight:500;
            text-decoration:none;background:none;border:none;
            cursor:pointer;text-align:left;
            transition:background 0.15s;font-family:'DM Sans',sans-serif;
        }
        .user-dropdown a:hover,.user-dropdown button:hover{background:#f8f4ef;color:#2c2416;}
        .user-dropdown .sep{height:1px;background:#f0ece4;margin:3px 0;}

        /* ── MAIN ── */
        .main-wrapper{
            margin-left:220px;
            flex:1;min-height:100vh;
        }

        /* Mobile */
        .mobile-bar{
            display:none;
            background:#f5f0e8;border-bottom:1px solid #e0d8cc;
            padding:14px 20px;align-items:center;gap:12px;
            position:sticky;top:0;z-index:40;
        }
        .hamburger{
            background:#2c3325;border:none;border-radius:7px;
            padding:7px;cursor:pointer;display:flex;
            align-items:center;justify-content:center;
        }
        .mobile-logo{font-family:'DM Serif Display',serif;font-size:15px;color:#2c2416;}
        .mobile-overlay{
            display:none;position:fixed;inset:0;
            background:rgba(44,35,22,0.3);z-index:45;
        }
        .mobile-overlay.open{display:block;}

        @media(max-width:768px){
            .sidebar{transform:translateX(-100%);transition:transform 0.25s ease;}
            .sidebar.open{transform:translateX(0);}
            .main-wrapper{margin-left:0;}
            .mobile-bar{display:flex;}
        }
    </style>
</head>
<body>

{{-- Mobile overlay --}}
<div class="mobile-overlay" id="overlay" onclick="closeSidebar()"></div>

{{-- SIDEBAR --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('images/logo.JPG') }}" alt="Logo" style="width:38px;height:38px;border-radius:10px;object-fit:cover;">
        <div class="logo-name">Selendang Puan</div>
        <div class="logo-sub">Dharma Ayu</div>
    </div>

    <nav style="padding:10px 0;flex:1;overflow-y:auto;">
        @if(Auth::user()->role === 'admin')
            <div class="nav-section">Menu Admin</div>
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="nav-icon"><span>🏠</span></span> Dashboard
            </a>
            <a href="{{ route('admin.laporan.index') }}"
               class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">
                <span class="nav-icon"><span>📂</span></span> Kelola Laporan
            </a>
            <a href="{{ route('admin.kegiatan.index') }}"
               class="nav-link {{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}">
                <span class="nav-icon"><span>📅</span></span> Kelola Agenda
            </a>
            <a href="{{ route('admin.users.index') }}"
               class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <span class="nav-icon"><span>👥</span></span> Kelola User
            </a>
        @else
            <div class="nav-section">Menu</div>
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="nav-icon"><span>🏠</span></span> Dashboard
            </a>
            <a href="{{ route('laporan.index') }}"
               class="nav-link {{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                <span class="nav-icon"><span>📂</span></span> Laporan Saya
            </a>
            <a href="{{ route('laporan.create') }}"
               class="nav-link {{ request()->routeIs('laporan.create') ? 'active' : '' }}">
                <span class="nav-icon"><span>✏️</span></span> Buat Laporan
            </a>
        @endif

        <div class="nav-section" style="margin-top:8px;">Akun</div>
        <a href="{{ route('profile.edit') }}"
           class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <span class="nav-icon"><span>⚙️</span></span> Pengaturan
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="user-row" onclick="toggleDropdown()" id="userRow">
            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div style="flex:1;min-width:0;">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
            </div>
            <svg class="user-chevron" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
            </svg>

            <div class="user-dropdown" id="userDropdown">
                <a href="{{ route('profile.edit') }}">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profile
                </a>
                <div class="sep"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

{{-- MAIN WRAPPER --}}
<div class="main-wrapper">
    {{-- Mobile topbar --}}
    <div class="mobile-bar">
        <button class="hamburger" onclick="openSidebar()">
            <svg width="16" height="16" fill="none" stroke="white" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <span class="mobile-logo">Selendang Puan</span>
    </div>

    <main>{{ $slot }}</main>
</div>

<script>
function toggleDropdown(){
    document.getElementById('userDropdown').classList.toggle('open');
}
function openSidebar(){
    document.getElementById('sidebar').classList.add('open');
    document.getElementById('overlay').classList.add('open');
}
function closeSidebar(){
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('overlay').classList.remove('open');
}
document.addEventListener('click', function(e){
    if(!e.target.closest('#userRow')){
        document.getElementById('userDropdown').classList.remove('open');
    }
});
</script>
</body>
</html>