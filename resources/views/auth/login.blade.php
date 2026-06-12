<x-guest-layout>
<style>
*{box-sizing:border-box;}
.form-title{font-family:'DM Serif Display',serif;font-size:24px;color:#2c2416;margin:0 0 5px;letter-spacing:-0.3px;}
.form-sub{font-size:13px;color:#9e8e78;margin:0 0 26px;line-height:1.6;}

.field-group{margin-bottom:14px;}
.field-label{display:block;font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:7px;}
.field-input{
    width:100%;padding:11px 14px;
    background:#fff;border:1.5px solid #e0d8cc;
    border-radius:8px;font-size:13px;color:#2c2416;
    font-family:'DM Sans',sans-serif;outline:none;
    transition:border-color 0.15s;
}
.field-input:focus{border-color:#6b8c52;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
.error-msg{font-size:11px;color:#b04040;margin-top:5px;display:block;}

.alert-error{
    background:#fdf2f2;border:1px solid #e8c8c8;
    color:#8a4040;border-radius:8px;
    padding:10px 14px;font-size:12px;
    margin-bottom:16px;line-height:1.6;
}
.status-msg{
    background:#edf2e8;border:1px solid #c8d9b0;
    color:#4a6535;border-radius:8px;
    padding:10px 14px;font-size:12px;margin-bottom:16px;
}

.remember-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.remember-label{display:flex;align-items:center;gap:7px;font-size:12px;color:#8a7a60;cursor:pointer;}
.remember-label input[type=checkbox]{width:14px;height:14px;accent-color:#4a6535;cursor:pointer;}
.forgot-link{font-size:12px;color:#6b8c52;font-weight:600;text-decoration:none;}
.forgot-link:hover{color:#4a6535;}

.btn-submit{
    width:100%;background:#2c3325;color:#c8d9b0;
    font-size:13px;font-weight:600;border:none;
    padding:12px;border-radius:8px;cursor:pointer;
    letter-spacing:0.3px;transition:opacity 0.15s;
    margin-bottom:16px;font-family:'DM Sans',sans-serif;
}
.btn-submit:hover{opacity:0.88;}

.divider{display:flex;align-items:center;gap:10px;margin-bottom:14px;}
.divider::before,.divider::after{content:'';flex:1;height:1px;background:#e8e0d4;}
.divider span{font-size:11px;color:#c0b09c;}

.bottom-link{display:block;text-align:center;font-size:13px;color:#9e8e78;}
.bottom-link a{color:#4a6535;font-weight:700;text-decoration:none;}
.bottom-link a:hover{color:#2c3325;}
</style>

<h1 class="form-title">Masuk ke Akun</h1>
<p class="form-sub">Selamat datang kembali. Masukkan kredensial Anda.</p>

@if(session('status'))
    <div class="status-msg">🌿 {{ session('status') }}</div>
@endif

@if($errors->any())
    <div class="alert-error">
        @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="field-group">
        <label class="field-label" for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}"
            class="field-input" placeholder="contoh@email.com"
            required autofocus autocomplete="username">
        @error('email')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div class="field-group">
        <label class="field-label" for="password">Password</label>
        <input id="password" type="password" name="password"
            class="field-input" placeholder="••••••••"
            required autocomplete="current-password">
        @error('password')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div class="remember-row">
        <label class="remember-label">
            <input type="checkbox" name="remember"> Ingat saya
        </label>
        @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
        @endif
    </div>

    <button type="submit" class="btn-submit">Masuk Sekarang</button>

    <div class="divider"><span>atau</span></div>

    <p class="bottom-link">
        Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
    </p>
</form>
</x-guest-layout>