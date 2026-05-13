<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen"> <!-- Padding dikurangi dari py-12 ke py-6 -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Section - Lebih Slim -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 mb-5 flex items-center justify-between bg-gradient-to-r from-white to-blue-50">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-600 p-3 rounded-xl text-white shadow-blue-200 shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Halo, {{ auth()->user()->nama }}!</h3>
                        <p class="text-xs text-gray-500">Selendang Puan Dharma Ayu Community System</p>
                    </div>
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-widest">Hari Ini</p>
                    <p class="text-sm font-bold text-gray-700">{{ now()->format('d M Y') }}</p>
                </div>
            </div>

            <!-- Stats Grid - Lebih Rapat -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase">Total Laporan</span>
                        <span class="p-2 bg-blue-50 text-blue-600 rounded-lg text-xs">📄</span>
                    </div>
                    <p class="text-2xl font-black text-gray-800 mt-1">{{ $totalLaporan ?? 0 }}</p>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase">Diproses</span>
                        <span class="p-2 bg-amber-50 text-amber-600 rounded-lg text-xs">⏳</span>
                    </div>
                    <p class="text-2xl font-black text-gray-800 mt-1">{{ $totalMenunggu ?? 0 }}</p>
                </div>

                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase">Selesai</span>
                        <span class="p-2 bg-emerald-50 text-emerald-600 rounded-lg text-xs">✅</span>
                    </div>
                    <p class="text-2xl font-black text-gray-800 mt-1">{{ $totalSelesai ?? 0 }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <!-- KIRI: Agenda Kegiatan (Lebih Lebar) -->
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="p-4 border-b border-gray-50 flex justify-between items-center">
                            <h3 class="font-bold text-gray-800 italic">📅 Agenda Komunitas</h3>
                            <a href="#" class="text-xs text-blue-600 font-bold hover:underline">Lihat Semua</a>
                        </div>
                        
                        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($kegiatans as $kegiatan)
                            <div class="group relative overflow-hidden rounded-xl border border-gray-100 hover:border-blue-200 transition">
                                <div class="flex items-center gap-3 p-3">
                                    @if($kegiatan->gambar)
                                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="w-16 h-16 object-cover rounded-lg shadow-sm">
                                    @else
                                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-xl">✨</div>
                                    @endif
                                    <div class="overflow-hidden">
                                        <h4 class="font-bold text-gray-800 truncate text-sm group-hover:text-blue-600 transition">{{ $kegiatan->judul }}</h4>
                                        <p class="text-[10px] text-gray-400 uppercase mt-1">{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</p>
                                        <p class="text-xs text-gray-500 truncate mt-0.5">📍 {{ $kegiatan->lokasi }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-span-2 text-center py-10">
                                <p class="text-sm text-gray-400 italic">Belum ada agenda baru.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- KANAN: Menu Cepat (Lebih Ringkas) -->
                <div class="lg:col-span-4 space-y-4">
                    <div class="bg-gray-900 rounded-2xl p-5 shadow-xl">
                        <h3 class="text-white font-bold text-sm mb-1">Ada Masalah?</h3>
                        <p class="text-gray-400 text-[11px] mb-4">Laporkan aduan Anda secara aman di sini.</p>
                        <a href="{{ route('laporan.create') }}" class="block w-full text-center bg-blue-600 text-white text-xs font-bold py-3 rounded-xl hover:bg-blue-700 transition">
                            BUAT LAPORAN SEKARANG
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                        <h3 class="text-xs font-black text-gray-400 uppercase mb-3 tracking-tighter">Navigasi</h3>
                        <div class="space-y-2">
                            <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 transition border border-transparent hover:border-blue-100 group">
                                <span class="bg-gray-100 group-hover:bg-white p-2 rounded-lg transition text-sm">📂</span>
                                <span class="text-sm font-bold text-gray-600 group-hover:text-blue-600">Riwayat Laporan</span>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 transition border border-transparent hover:border-blue-100 group">
                                <span class="bg-gray-100 group-hover:bg-white p-2 rounded-lg transition text-sm">⚙️</span>
                                <span class="text-sm font-bold text-gray-600 group-hover:text-blue-600">Pengaturan Akun</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>