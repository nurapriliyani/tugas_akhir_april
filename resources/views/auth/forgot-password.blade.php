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
.status-msg{background:#edf2e8;border:1px solid #c8d9b0;color:#4a6535;border-radius:8px;padding:10px 14px;font-size:12px;margin-bottom:16px;line-height:1.6;}
.btn-submit{width:100%;background:#4a6535;color:#deecd0;font-size:13px;font-weight:700;border:none;padding:13px;border-radius:8px;cursor:pointer;letter-spacing:0.3px;transition:background 0.15s;margin-bottom:16px;}
.btn-submit:hover{background:#3a5228;}
.bottom-link{display:block;text-align:center;font-size:13px;color:#9e8e78;}
.bottom-link a{color:#6b8c52;font-weight:700;text-decoration:none;}
.bottom-link a:hover{color:#4a6535;}
</style>

<div class="form-wrap">
    <h1 class="form-title">Lupa Password</h1>
    <p class="form-sub">Masukkan email Anda dan kami akan mengirimkan link untuk mereset password.</p>

    @if(session('status'))
        <div class="status-msg">🌿 {{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div style="background:#fbeaea;border:1px solid #f0c8c8;color:#b04040;border-radius:8px;padding:10px 14px;font-size:12px;margin-bottom:16px;">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="field-group">
            <label class="field-label" for="email">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="field-input" placeholder="contoh@email.com"
                required autofocus autocomplete="username">
            @error('email')<span class="error-msg">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn-submit">Kirim Link Reset Password</button>

        <p class="bottom-link">
            Ingat password? <a href="{{ route('login') }}">Masuk di sini</a>
        </p>
    </form>
</div>
</x-guest-layout>