<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Rekapitulasi Laporan Pengaduan</title>
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
  .meta { display: flex; justify-content: space-between; font-size: 8.5px; color: #333; line-height: 2; margin-bottom: 18px; padding: 10px 0; border-bottom: 1px solid #ddd; }

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
  .b-menunggu { background: #fff8ee; color: #7a4000; border-color: #dea040; }
  .b-diproses  { background: #eef3fc; color: #1a3a80; border-color: #80a0d8; }
  .b-selesai   { background: #eef6ee; color: #185018; border-color: #60a060; }
  .b-ditolak   { background: #fceaea; color: #801010; border-color: #d07070; }

  /* FOOTER */
  .foot { margin-top: 20px; padding-top: 8px; border-top: 1px solid #ccc; display: flex; justify-content: space-between; font-size: 8px; color: #999; line-height: 1.9; }
</style>
</head>
<body>

<div class="header">
  <div class="org-name">Selendang Puan Dharma Ayu</div>
  <div class="org-sub">Platform Pengaduan &mdash; Indramayu, Jawa Barat &nbsp;|&nbsp; wa.me/6281779080524</div>
  <div class="divider"></div>
  <div class="doc-title">Rekapitulasi Laporan Pengaduan</div>
  <div class="doc-sub">Riwayat seluruh laporan pengaduan yang telah diajukan melalui sistem</div>
</div>

<div class="meta">
  <div>
    Nama Pelapor &nbsp;: <strong>{{ auth()->user()->name }}</strong><br>
    Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ auth()->user()->email }}<br>
    Bergabung &nbsp;&nbsp;&nbsp;&nbsp;: {{ auth()->user()->created_at->translatedFormat('d F Y') }}
  </div>
  <div style="text-align:right;">
    Tanggal Cetak : <strong>{{ now()->translatedFormat('d F Y') }}</strong><br>
    Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ now()->format('H:i') }} WIB<br>
    Total Laporan : <strong>{{ $laporans->count() }} laporan</strong>
  </div>
</div>

@if($laporans->isEmpty())
  <p style="color:#999; font-style:italic; text-align:center; padding:30px 0;">Belum ada laporan yang tersimpan.</p>
@else
<table>
  <thead>
    <tr>
      <th style="width:4%;">#</th>
      <th style="width:10%;">Tanggal</th>
      <th style="width:14%;">Jenis Kasus</th>
      <th style="width:10%;">Kategori</th>
      <th style="width:12%;">Lokasi</th>
      <th style="width:36%;">Kronologi</th>
      <th style="width:8%;">Status</th>
      <th style="width:6%;">Identitas</th>
    </tr>
  </thead>
  <tbody>
    @foreach($laporans as $i => $item)
    @php
      $bc = match($item->status) {
        'menunggu' => 'b-menunggu',
        'diproses'  => 'b-diproses',
        'selesai'   => 'b-selesai',
        'ditolak'   => 'b-ditolak',
        default     => 'b-menunggu',
      };
      $statusLabel = match($item->status) {
        'menunggu' => 'Menunggu',
        'diproses'  => 'Diproses',
        'selesai'   => 'Selesai',
        'ditolak'   => 'Ditolak',
        default     => ucfirst($item->status),
      };
    @endphp
    <tr>
      <td style="color:#aaa; text-align:center;">{{ $i + 1 }}</td>
      <td style="white-space:nowrap;">
        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}<br>
        <span style="color:#aaa; font-size:7.5px;">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</span>
      </td>
      <td><strong>{{ ucfirst($item->jenis_kasus) }}</strong></td>
      <td style="color:#444;">{{ $item->kategori ?: '—' }}</td>
      <td style="color:#444;">
        {{ $item->lokasi ?: '—' }}
        @if($item->tanggal_kejadian)
          <br><span style="color:#aaa; font-size:7.5px;">{{ \Carbon\Carbon::parse($item->tanggal_kejadian)->format('d/m/Y') }}</span>
        @endif
      </td>
      <td style="font-size:8.5px; color:#333; line-height:1.6;">{{ Str::limit($item->kronologi, 160) }}</td>
      <td><span class="badge {{ $bc }}">{{ $statusLabel }}</span></td>
      <td style="text-align:center; color:#555; font-size:8px;">{{ $item->anonim ? 'Anonim' : 'Publik' }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif

<div class="foot">
  <div>Selendang Puan Dharma Ayu &mdash; Indramayu, Jawa Barat &nbsp;&nbsp; &copy; {{ date('Y') }}</div>
  <div style="text-align:right;">Dicetak {{ now()->translatedFormat('d F Y') }}, {{ now()->format('H:i') }} WIB &mdash; {{ $laporans->count() }} laporan</div>
</div>

</body>
</html>