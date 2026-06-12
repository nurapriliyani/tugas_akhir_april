<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Rekapitulasi Agenda Kegiatan — Admin</title>
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
  tbody td { padding: 7px 9px; vertical-align: top; line-height: 1.6; }

  .badge { display: inline-block; padding: 2px 8px; border-radius: 2px; font-size: 7.5px; font-weight: bold; border: 1px solid; }
  .b-aktif   { background: #eef6ee; color: #185018; border-color: #60a060; }
  .b-selesai { background: #f0ece4; color: #6a5a40; border-color: #c8b898; }

  /* FOOTER */
  .foot { margin-top: 20px; padding-top: 8px; border-top: 1px solid #ccc; display: flex; justify-content: space-between; font-size: 8px; color: #999; line-height: 1.9; }
</style>
</head>
<body>

<div class="header">
  <div class="org-name">Selendang Puan Dharma Ayu</div>
  <div class="org-sub">Platform Pengaduan &mdash; Indramayu, Jawa Barat &nbsp;|&nbsp; wa.me/6281779080524</div>
  <div class="divider"></div>
  <div class="doc-title">Rekapitulasi Agenda Kegiatan Komunitas</div>
  <div class="doc-sub">Dokumen rekapitulasi seluruh agenda kegiatan yang tercatat dalam sistem untuk keperluan internal</div>
</div>

<div class="meta">
  <div>
    Dicetak oleh &nbsp;: <strong>{{ auth()->user()->name ?? 'Admin' }}</strong><br>
    Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Administrator<br>
    Periode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: s.d. {{ now()->translatedFormat('d F Y') }}
  </div>
  <div style="text-align:right;">
    Tanggal Cetak : <strong>{{ now()->translatedFormat('d F Y') }}</strong><br>
    Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ now()->format('H:i') }} WIB<br>
    Total Agenda &nbsp;: <strong>{{ $kegiatan->count() }} agenda</strong>
  </div>
</div>

<div class="conf">
  &#9888;&nbsp; DOKUMEN RAHASIA &amp; INTERNAL — Dilarang disebarluaskan tanpa izin pihak berwenang.
</div>

@if($kegiatan->isEmpty())
  <p style="color:#999; font-style:italic; text-align:center; padding:30px 0;">Belum ada agenda kegiatan yang tersimpan dalam sistem.</p>
@else
<table>
  <thead>
    <tr>
      <th style="width:4%;">#</th>
      <th style="width:28%;">Judul Kegiatan</th>
      <th style="width:11%;">Tanggal</th>
      <th style="width:22%;">Lokasi</th>
      <th style="width:27%;">Deskripsi</th>
      <th style="width:8%;">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kegiatan as $i => $item)
    @php
      $bc          = $item->status === 'aktif' ? 'b-aktif' : 'b-selesai';
      $statusLabel = $item->status === 'aktif' ? 'Mendatang' : 'Selesai';
    @endphp
    <tr>
      <td style="color:#aaa; text-align:center;">{{ $i + 1 }}</td>
      <td><strong>{{ $item->judul }}</strong></td>
      <td style="white-space:nowrap; color:#444;">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
      <td style="color:#444;">{{ $item->lokasi ?: '—' }}</td>
      <td style="font-size:8.5px; color:#333; line-height:1.6;">{{ Str::limit($item->deskripsi, 130) }}</td>
      <td><span class="badge {{ $bc }}">{{ $statusLabel }}</span></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif

<div class="foot">
  <div>Selendang Puan Dharma Ayu &mdash; Indramayu, Jawa Barat &nbsp;&nbsp; &copy; {{ date('Y') }} &mdash; Dokumen Rahasia Internal</div>
  <div style="text-align:right;">Dicetak {{ now()->translatedFormat('d F Y') }}, {{ now()->format('H:i') }} WIB &mdash; {{ $kegiatan->count() }} agenda</div>
</div>

</body>
</html>