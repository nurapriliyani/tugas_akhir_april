<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Absensi {{ $kegiatan->judul }}</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'DejaVu Sans', sans-serif; font-size: 10px; color: #111; background: #fff; padding: 36px 44px; }

  /* HEADER */
  .header { text-align: center; border-bottom: 2px solid #111; padding-bottom: 14px; margin-bottom: 18px; }
  .org-name { font-size: 13px; font-weight: bold; text-transform: uppercase; letter-spacing: 1.5px; }
  .org-sub { font-size: 8.5px; color: #555; margin-top: 3px; letter-spacing: 0.4px; }
  .divider { height: 1px; background: #888; margin: 10px auto; width: 60%; }
  .doc-title { font-size: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 2px; }
  .doc-sub { font-size: 8.5px; color: #666; }

  /* META */
  .meta { display: flex; justify-content: space-between; font-size: 8.5px; color: #333; line-height: 2; margin-bottom: 10px; padding: 10px 0 10px; border-bottom: 1px solid #ddd; }

  /* CONFIDENTIAL */
  .conf { font-size: 8px; color: #888; border: 1px solid #ddd; padding: 5px 10px; margin-bottom: 16px; letter-spacing: 0.2px; }

  /* TABLE */
  table { width: 100%; border-collapse: collapse; font-size: 9px; }
  thead tr { background: #111; }
  thead th {
    padding: 7px 9px;
    color: #fff;
    font-size: 7.5px;
    font-weight: bold;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    text-align: left;
    white-space: nowrap;
  }
  tbody tr { border-bottom: 1px solid #e8e8e8; }
  tbody tr:nth-child(even) { background: #f9f9f9; }
  tbody td { padding: 9px; vertical-align: middle; line-height: 1.6; }

  .ttd-cell { text-align: center; }
  .ttd-line { display: block; width: 100%; height: 28px; border-bottom: 1px solid #999; }

  /* FOOTER */
  .foot { margin-top: 20px; padding-top: 8px; border-top: 1px solid #ccc; display: flex; justify-content: space-between; font-size: 8px; color: #999; line-height: 1.9; }

  /* SIGN AREA */
  .sign-area { width: 100%; margin-top: 40px; }
  .sign-block { display: inline-block; width: 220px; text-align: center; float: right; font-size: 9px; }
  .sign-role { color: #444; margin-bottom: 46px; line-height: 1.6; }
  .sign-name { font-weight: bold; border-top: 1px solid #111; padding-top: 4px; display: inline-block; min-width: 180px; }
</style>
</head>
<body>

<div class="header">
  <div class="org-name">Selendang Puan Dharma Ayu</div>
  <div class="org-sub">Platform Pengaduan &mdash; Indramayu, Jawa Barat &nbsp;|&nbsp; wa.me/6281779080524</div>
  <div class="divider"></div>
  <div class="doc-title">Daftar Hadir Peserta Kegiatan</div>
  <div class="doc-sub">Dokumen absensi peserta untuk kegiatan yang tercatat dalam sistem</div>
</div>

<div class="meta">
  <div>
    Nama Kegiatan &nbsp;: <strong>{{ $kegiatan->judul }}</strong><br>
    Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}<br>
    Lokasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $kegiatan->lokasi ?: '—' }}
  </div>
  <div style="text-align:right;">
    Tanggal Cetak : <strong>{{ now()->translatedFormat('d F Y') }}</strong><br>
    Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ now()->format('H:i') }} WIB<br>
    Total Peserta &nbsp;: <strong>{{ $peserta->count() }} orang</strong>
  </div>
</div>

@if($peserta->isEmpty())
  <p style="color:#999; font-style:italic; text-align:center; padding:30px 0;">Belum ada peserta yang terdaftar untuk kegiatan ini.</p>
@else
<table>
  <thead>
    <tr>
      <th style="width:4%;">#</th>
      <th style="width:20%;">Nama Peserta</th>
      <th style="width:14%;">Nomor WA</th>
      <th style="width:17%;">Email</th>
      <th style="width:25%;">Tanda Tangan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($peserta as $i => $p)
    <tr>
      <td style="color:#aaa; text-align:center;">{{ $i + 1 }}</td>
      <td><strong>{{ $p->nama }}</strong></td>
      <td style="color:#444;">{{ $p->no_hp }}</td>
      <td style="color:#444;">{{ $p->email ?: '—' }}</td>
      <td class="ttd-cell"><span class="ttd-line"></span></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif

<div class="sign-area">
  <div class="sign-block">
    <div class="sign-role">{{ $kegiatan->lokasi ?: 'Indramayu' }}, {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}<br>Penanggung Jawab Kegiatan</div>
    <div class="sign-name">&nbsp;</div>
  </div>
</div>

<div class="foot">
  <div>Selendang Puan Dharma Ayu &mdash; Indramayu, Jawa Barat &nbsp;&nbsp; &copy; {{ date('Y') }} &mdash; Dokumen Rahasia Internal</div>
  <div style="text-align:right;">Dicetak {{ now()->translatedFormat('d F Y') }}, {{ now()->format('H:i') }} WIB &mdash; {{ $peserta->count() }} peserta</div>
</div>

</body>
</html>