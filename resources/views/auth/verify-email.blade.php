<x-guest-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;}
.form-wrap{font-family:'DM Sans',sans-serif;width:100%;}
.form-title{font-family:'DM Serif Display',serif;font-size:22px;color:#2c2416;margin:0 0 6px;letter-spacing:-0.3px;}
.form-sub{font-size:13px;color:#9e8e78;margin:0 0 22px;line-height:1.7;}
.status-msg{background:#edf2e8;border:1px solid #c8d9b0;color:#4a6535;border-radius:8px;padding:10px 14px;font-size:12px;margin-bottom:18px;line-height:1.6;}
.verify-note{display:flex;align-items:flex-start;gap:8px;background:#f8f4ef;border:1px solid #ede5da;border-radius:8px;padding:12px 14px;margin-bottom:22px;}
.verify-note span{font-size:18px;flex-shrink:0;}
.verify-note p{font-size:12px;color:#8a7a60;margin:0;line-height:1.6;}
.btn-submit{width:100%;background:#4a6535;color:#deecd0;font-size:13px;font-weight:700;border:none;padding:13px;border-radius:8px;cursor:pointer;letter-spacing:0.3px;transition:background 0.15s;margin-bottom:14px;}
.btn-submit:hover{background:#3a5228;}
.logout-btn{display:block;text-align:center;font-size:12px;color:#b09e88;background:none;border:none;cursor:pointer;text-decoration:underline;width:100%;}
.logout-btn:hover{color:#8a7a60;}
</style>

<div class="form-wrap">
    <h1 class="form-title">Verifikasi Email</h1>
    <p class="form-sub">Terima kasih telah mendaftar! Silakan verifikasi email Anda dengan mengklik link yang telah kami kirim.</p>

    @if(session('status') == 'verification-link-sent')
        <div class="status-msg">🌿 Link verifikasi baru telah dikirim ke email Anda.</div>
    @endif

    <div class="verify-note">
        <span>📬</span>
        <p>Cek inbox atau folder spam Anda. Jika belum menerima email, klik tombol di bawah untuk mengirim ulang.</p>
    </div>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn-submit">Kirim Ulang Email Verifikasi</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Keluar dari akun ini</button>
    </form>
</div>
</x-guest-layout>