<x-guest-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.form-wrap{font-family:'DM Sans',sans-serif;width:100%;}
.form-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 6px;letter-spacing:-0.3px;}
.form-sub{font-size:13px;color:#9e8e78;margin:0 0 24px;line-height:1.6;}
.field-group{margin-bottom:16px;}
.field-label{display:block;font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:7px;}
.field-input{width:100%;padding:11px 14px;background:#faf7f3;border:1.5px solid #e8e0d4;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color 0.15s;}
.field-input:focus{border-color:#8fa67a;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
.error-msg{font-size:11px;color:#b04040;margin-top:5px;display:block;}
.btn-submit{width:100%;background:#4a6535;color:#deecd0;font-size:13px;font-weight:700;border:none;padding:13px;border-radius:8px;cursor:pointer;letter-spacing:0.3px;transition:background 0.15s;}
.btn-submit:hover{background:#3a5228;}
.secure-note{display:flex;align-items:flex-start;gap:8px;background:#f8f4ef;border:1px solid #ede5da;border-radius:8px;padding:10px 12px;margin-bottom:20px;}
.secure-note span{font-size:15px;flex-shrink:0;}
.secure-note p{font-size:11px;color:#8a7a60;margin:0;line-height:1.6;}
</style>

<div class="form-wrap">
    <h1 class="form-title">Konfirmasi Password</h1>
    <p class="form-sub">Ini adalah area aman. Masukkan password Anda untuk melanjutkan.</p>

    <div class="secure-note">
        <span>🔒</span>
        <p>Sesi Anda perlu dikonfirmasi ulang sebelum mengakses area ini.</p>
    </div>

    @if($errors->any())
        <div style="background:#fbeaea;border:1px solid #f0c8c8;color:#b04040;border-radius:8px;padding:10px 14px;font-size:12px;margin-bottom:16px;">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="field-group">
            <label class="field-label" for="password">Password</label>
            <input id="password" type="password" name="password"
                class="field-input" placeholder="••••••••"
                required autocomplete="current-password">
            @error('password')<span class="error-msg">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn-submit">Konfirmasi & Lanjutkan</button>
    </form>
</div>
</x-guest-layout>