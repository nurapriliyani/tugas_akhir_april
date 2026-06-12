<x-guest-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.form-wrap{font-family:'DM Sans',sans-serif;width:100%;}
.form-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 6px;letter-spacing:-0.3px;}
.form-sub{font-size:13px;color:#9e8e78;margin:0 0 24px;line-height:1.6;}
.field-group{margin-bottom:15px;}
.field-label{display:block;font-size:10px;font-weight:700;color:#8a7a60;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:7px;}
.field-input{width:100%;padding:11px 14px;background:#faf7f3;border:1.5px solid #e8e0d4;border-radius:8px;font-size:13px;color:#2c2416;font-family:'DM Sans',sans-serif;outline:none;transition:border-color 0.15s;}
.field-input:focus{border-color:#8fa67a;background:#fff;}
.field-input::placeholder{color:#c0b09c;}
.error-msg{font-size:11px;color:#b04040;margin-top:5px;display:block;}
.btn-submit{width:100%;background:#4a6535;color:#deecd0;font-size:13px;font-weight:700;border:none;padding:13px;border-radius:8px;cursor:pointer;letter-spacing:0.3px;transition:background 0.15s;}
.btn-submit:hover{background:#3a5228;}
</style>

<div class="form-wrap">
    <h1 class="form-title">Reset Password</h1>
    <p class="form-sub">Masukkan password baru Anda di bawah ini.</p>

    @if($errors->any())
        <div style="background:#fbeaea;border:1px solid #f0c8c8;color:#b04040;border-radius:8px;padding:10px 14px;font-size:12px;margin-bottom:16px;">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="field-group">
            <label class="field-label" for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                class="field-input" placeholder="contoh@email.com"
                required autocomplete="username">
            @error('email')<span class="error-msg">{{ $message }}</span>@enderror
        </div>

        <div class="field-group">
            <label class="field-label" for="password">Password Baru</label>
            <input id="password" type="password" name="password"
                class="field-input" placeholder="Minimal 8 karakter"
                required autocomplete="new-password">
            @error('password')<span class="error-msg">{{ $message }}</span>@enderror
        </div>

        <div class="field-group">
            <label class="field-label" for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="field-input" placeholder="Ulangi password baru"
                required autocomplete="new-password">
            @error('password_confirmation')<span class="error-msg">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn-submit">Reset Password</button>
    </form>
</div>
</x-guest-layout>