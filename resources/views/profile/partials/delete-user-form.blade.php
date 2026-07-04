<div style="display:flex;align-items:flex-start;gap:16px;flex-wrap:wrap;">
    <div style="flex:1;min-width:220px;">
        <p style="font-size:13px;color:#8a7a60;line-height:1.75;margin:0 0 16px;">
            Setelah akun dihapus, semua data dan laporan Anda akan <strong style="color:#b04040;">dihapus permanen</strong> dan tidak dapat dipulihkan. Pastikan Anda telah menyimpan informasi penting sebelum melanjutkan.
        </p>
        <button onclick="document.getElementById('deleteModal').classList.add('open')" class="btn-danger">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Hapus Akun Saya
        </button>
    </div>
    <div style="background:#fbeaea;border:1px solid #f0c4c4;border-radius:10px;padding:14px 16px;font-size:12px;color:#8a4040;line-height:1.7;max-width:220px;">
        <strong style="display:block;margin-bottom:4px;">Perhatian!</strong>
        Tindakan ini tidak dapat dibatalkan. Semua laporan, riwayat aktivitas, dan data pribadi akan terhapus selamanya.
    </div>
</div>

{{-- Modal Konfirmasi --}}
<div class="modal-overlay" id="deleteModal" onclick="if(event.target===this)this.classList.remove('open')">
    <div class="modal-box">
        <div style="width:44px;height:44px;background:#fbeaea;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:14px;"></div>
        <h3>Hapus akun secara permanen?</h3>
        <p>Semua data Anda akan dihapus dan tidak dapat dipulihkan. Masukkan password untuk konfirmasi.</p>

        <form method="post" action="{{ route('profile.destroy') }}" style="display:flex;flex-direction:column;gap:12px;">
            @csrf
            @method('delete')

            <div>
                <label class="field-label">Password <span style="color:#b04040;">*</span></label>
                <input type="password" name="password" class="field-input" placeholder="Masukkan password Anda" required>
                @error('password', 'userDeletion')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="modal-actions" style="padding-top:4px;">
                <button type="button" class="btn-cancel-modal" onclick="document.getElementById('deleteModal').classList.remove('open')">Batal</button>
                <button type="submit" class="btn-danger">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Ya, Hapus Permanen
                </button>
            </div>
        </form>
    </div>
</div>

@if($errors->userDeletion->isNotEmpty())
<script>document.getElementById('deleteModal').classList.add('open');</script>
@endif