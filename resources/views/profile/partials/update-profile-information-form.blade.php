<form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

<form method="post" action="{{ route('profile.update') }}" style="display:flex;flex-direction:column;gap:14px;">
    @csrf
    @method('patch')

    <div>
        <label class="field-label">Nama Lengkap <span style="color:#b04040;">*</span></label>
        <input type="text" id="name" name="name" class="field-input"
               value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
               placeholder="Nama lengkap Anda">
        @error('name')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="field-label">Alamat Email <span style="color:#b04040;">*</span></label>
        <input type="email" id="email" name="email" class="field-input"
               value="{{ old('email', $user->email) }}" required autocomplete="username"
               placeholder="email@domain.com">
        @error('email')<span class="error-msg">{{ $message }}</span>@enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="verify-warn">
                ⚠️ Email Anda belum terverifikasi.
                <button form="send-verification" class="verify-btn">Kirim ulang verifikasi</button>
            </div>
            @if (session('status') === 'verification-link-sent')
                <p class="verify-sent">✓ Link verifikasi telah dikirim ke email Anda.</p>
            @endif
        @endif
    </div>

    <div style="display:flex;align-items:center;gap:12px;padding-top:4px;">
        <button type="submit" class="btn-save">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Simpan Perubahan
        </button>
        @if (session('status') === 'profile-updated')
            <span x-data="{show:true}" x-show="show" x-transition x-init="setTimeout(()=>show=false,2500)" class="saved-toast">✓ Tersimpan!</span>
        @endif
    </div>
</form>