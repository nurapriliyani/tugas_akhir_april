<form method="post" action="{{ route('password.update') }}" style="display:flex;flex-direction:column;gap:14px;">
    @csrf
    @method('put')

    <div>
        <label class="field-label">Password Saat Ini</label>
        <input type="password" id="update_password_current_password" name="current_password"
               class="field-input" autocomplete="current-password" placeholder="••••••••">
        @error('current_password', 'updatePassword')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="field-label">Password Baru</label>
        <input type="password" id="update_password_password" name="password"
               class="field-input" autocomplete="new-password" placeholder="••••••••">
        @error('password', 'updatePassword')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div>
        <label class="field-label">Konfirmasi Password Baru</label>
        <input type="password" id="update_password_password_confirmation" name="password_confirmation"
               class="field-input" autocomplete="new-password" placeholder="••••••••">
        @error('password_confirmation', 'updatePassword')<span class="error-msg">{{ $message }}</span>@enderror
    </div>

    <div style="display:flex;align-items:center;gap:12px;padding-top:4px;">
        <button type="submit" class="btn-save">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            Perbarui Password
        </button>
        @if (session('status') === 'password-updated')
            <span x-data="{show:true}" x-show="show" x-transition x-init="setTimeout(()=>show=false,2500)" class="saved-toast">✓ Password diperbarui!</span>
        @endif
    </div>
</form>