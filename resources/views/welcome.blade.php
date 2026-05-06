<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selendang Puan Dharma Ayu - Bersama Melindungi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-text {
            background: linear-gradient(90deg, #4F46E5, #06B6D4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-[#F8FAFC]">

<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">S</div>
            <span class="font-bold text-slate-800 text-lg hidden md:block">Selendang Puan</span>
        </div>
        <div class="flex items-center gap-4">
            <a href="/login" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 px-4 py-2 transition-all">Masuk</a>
            <a href="/register" class="text-sm font-semibold bg-indigo-600 text-white px-6 py-2.5 rounded-full hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all">Buat Laporan</a>
        </div>
    </div>
</nav>

<section class="relative pt-16 pb-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 mb-6">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                </span>
                <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Layanan Pengaduan Aktif</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 leading-tight mb-6">
                Suaramu Adalah <br> <span class="gradient-text">Kekuatan Kami.</span>
            </h1>
            <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-lg">
                Jangan ragu untuk melapor. Yayasan Selendang Puan Dharma Ayu menyediakan wadah aman bagi masyarakat Indramayu untuk menciptakan lingkungan yang adil dan terlindungi.
            </p>
            <div class="flex flex-wrap gap-4">
                <button class="bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold hover:bg-slate-800 transition-all flex items-center gap-2 shadow-xl">
                    Mulai Melapor 
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
                <button class="bg-white border border-slate-200 text-slate-700 px-8 py-4 rounded-2xl font-bold hover:bg-slate-50 transition-all">
                    Panduan Keamanan
                </button>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-indigo-200 rounded-full blur-3xl opacity-30"></div>
            <div class="bg-white rounded-[2.5rem] shadow-2xl p-4 transform rotate-3 border border-slate-100">
                <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?auto=format&fit=crop&q=80&w=800" alt="Support" class="rounded-[2rem] object-cover h-[450px] w-full">
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center mb-16">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Cara Kerja Pelaporan</h2>
        <p class="text-slate-500">Laporan Anda akan diproses dengan kerahasiaan tinggi melalui 3 tahap.</p>
    </div>
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12">
        <div class="text-center group">
            <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                <span class="text-2xl font-bold">1</span>
            </div>
            <h3 class="font-bold text-xl mb-3">Tulis Laporan</h3>
            <p class="text-slate-500 text-sm">Ceritakan kejadian secara detail dan lampirkan bukti jika tersedia.</p>
        </div>
        <div class="text-center group">
            <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-sm">
                <span class="text-2xl font-bold">2</span>
            </div>
            <h3 class="font-bold text-xl mb-3">Verifikasi</h3>
            <p class="text-slate-500 text-sm">Tim kami akan memeriksa kebenaran laporan dalam waktu maksimal 24 jam.</p>
        </div>
        <div class="text-center group">
            <div class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-sm">
                <span class="text-2xl font-bold">3</span>
            </div>
            <h3 class="font-bold text-xl mb-3">Tindak Lanjut</h3>
            <p class="text-slate-500 text-sm">Laporan diteruskan ke pihak terkait untuk penanganan lebih lanjut.</p>
        </div>
    </div>
</section>

<footer class="bg-slate-900 text-slate-400 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <div class="mb-8">
            <h2 class="text-white font-bold text-xl mb-2">Selendang Puan Dharma Ayu</h2>
            <p class="text-sm">Mewujudkan Indramayu yang aman dan ramah bagi semua.</p>
        </div>
        <div class="flex justify-center gap-6 mb-12">
            <a href="#" class="hover:text-white transition-colors">Tentang Kami</a>
            <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
            <a href="#" class="hover:text-white transition-colors">Kontak Darurat</a>
        </div>
        <div class="pt-8 border-t border-slate-800 text-xs tracking-widest uppercase">
            &copy; 2026 Selendang Puan Dharma Ayu. All Rights Reserved.
        </div>
    </div>
</footer>

</body>
</html>