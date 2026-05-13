<x-app-layout>

    <!-- Header yang Lebih Berisi -->

    <x-slot name="header">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div>

                <h2 class="font-bold text-2xl text-gray-800 leading-tight">

                    {{ __('Admin Control Center') }}

                </h2>

                <p class="text-sm text-gray-500 font-medium">Selendang Puan Dharma Ayu • <span class="text-blue-600">{{ auth()->user()->name }}</span></p>

            </div>

           

            <!-- Ringkasan Cepat di Header agar tidak kosong -->

            <div class="flex items-center gap-3 bg-white p-2 rounded-2xl shadow-sm border border-gray-100">

                <div class="px-4 border-r border-gray-100">

                    <p class="text-[10px] uppercase font-bold text-gray-400 tracking-wider">Status Server</p>

                    <p class="text-xs font-bold text-emerald-500 flex items-center gap-1">

                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> Online

                    </p>

                </div>

                <div class="px-4">

                    <p class="text-[10px] uppercase font-bold text-gray-400 tracking-wider">Waktu Sistem</p>

                    <p class="text-xs font-bold text-gray-700">{{ now()->format('H:i') }} WIB</p>

                </div>

            </div>

        </div>

    </x-slot>



    <div class="py-8 bg-[#f8fafc]">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           

            <!-- Statistik Utama (Lebih Rapat & Berwarna) -->

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">

                <!-- Total -->

                <div class="bg-gradient-to-br from-blue-600 to-blue-700 p-5 rounded-2xl shadow-md text-white group hover:scale-[1.02] transition-transform">

                    <div class="flex justify-between items-start">

                        <div>

                            <p class="text-blue-100 text-xs font-bold uppercase">Total Laporan</p>

                            <h3 class="text-3xl font-black mt-1">{{ $totalLaporan }}</h3>

                        </div>

                        <span class="text-2xl opacity-50 group-hover:opacity-100 transition-opacity italic">#01</span>

                    </div>

                </div>



                <!-- Menunggu -->

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:border-amber-300 transition-colors">

                    <p class="text-gray-400 text-xs font-bold uppercase">Menunggu</p>

                    <div class="flex items-center justify-between mt-1">

                        <h3 class="text-3xl font-black text-amber-500">{{ $totalMenunggu }}</h3>

                        <div class="p-2 bg-amber-50 text-amber-600 rounded-lg">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

                        </div>

                    </div>

                </div>



                <!-- Selesai -->

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:border-emerald-300 transition-colors">

                    <p class="text-gray-400 text-xs font-bold uppercase">Selesai</p>

                    <div class="flex items-center justify-between mt-1">

                        <h3 class="text-3xl font-black text-emerald-500">{{ $totalSelesai }}</h3>

                        <div class="p-2 bg-emerald-50 text-emerald-600 rounded-lg">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>

                        </div>

                    </div>

                </div>



                <!-- User -->

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:border-purple-300 transition-colors">

                    <p class="text-gray-400 text-xs font-bold uppercase">Anggota</p>

                    <div class="flex items-center justify-between mt-1">

                        <h3 class="text-3xl font-black text-purple-600">{{ $totalUser }}</h3>

                        <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>

                        </div>

                    </div>

                </div>

            </div>



            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- Panel Utama (Kiri) -->

                <div class="lg:col-span-8 space-y-6">

                    <!-- Quick Actions Section -->

                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">

                        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">

                            <span class="w-1 h-6 bg-blue-600 rounded-full"></span> Navigasi Cepat

                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            <a href="{{ route('admin.laporan.index') }}" class="group p-4 bg-gray-50 hover:bg-blue-600 rounded-2xl transition-all duration-300 border border-gray-100 hover:border-blue-500">

                                <div class="w-10 h-10 bg-white shadow-sm rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">📂</div>

                                <h5 class="font-bold text-gray-800 group-hover:text-white transition-colors">Laporan Masuk</h5>

                                <p class="text-xs text-gray-500 group-hover:text-blue-100 transition-colors">Lihat & kelola aduan.</p>

                            </a>

                           

                             <a href="{{ route('admin.kegiatan.index') }}" class="group p-4 bg-gray-50 hover:bg-emerald-600 rounded-2xl transition-all duration-300 border border-gray-100 hover:border-emerald-500">
                                <div class="w-10 h-10 bg-white shadow-sm rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">📅</div>
                                <h5 class="font-bold text-gray-800 group-hover:text-white transition-colors">Atur Agenda</h5>
                                <p class="text-xs text-gray-500 group-hover:text-emerald-100 transition-colors">Update kegiatan komunitas.</p>
                            </a>

                          <!-- Tombol Kelola User (Gunakan gaya yang sama agar seragam) -->
                            <a href="{{ route('admin.users.index') }}" class="group p-4 bg-gray-50 hover:bg-purple-600 rounded-2xl transition-all duration-300 border border-gray-100 hover:border-purple-500">
                                <div class="w-10 h-10 bg-white shadow-sm rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">👥</div>
                                <h5 class="font-bold text-gray-800 group-hover:text-white transition-colors">Kelola User</h5>
                                <p class="text-xs text-gray-500 group-hover:text-purple-100 transition-colors">Atur akses & anggota.</p>
                            </a>
                        </div>
                    </div>



                    <!-- Placeholder untuk tabel atau aktivitas terbaru -->

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100 font-sans">

                        <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">

                            <h4 class="font-bold text-gray-800 italic">Informasi Pengembangan</h4>

                        </div>

                        <div class="p-8 text-center">

                            <div class="mb-4 inline-block p-4 bg-blue-50 rounded-full text-blue-600">

                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

                            </div>

                            <h5 class="text-xl font-bold text-gray-800">Sistem Siap Digunakan!</h5>

                            <p class="text-gray-500 max-w-sm mx-auto mt-2">Gunakan menu di atas untuk mulai mengelola data laporan, anggota, dan agenda komunitas Selendang Puan.</p>

                        </div>

                    </div>

                </div>



                <!-- Sidebar Info (Kanan) -->

                <div class="lg:col-span-4 space-y-6">

                    <div class="bg-gray-900 rounded-3xl p-6 text-white shadow-xl">

                        <h4 class="font-bold text-lg mb-4 flex items-center gap-2">

                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span> Ringkasan Profil

                        </h4>

                        <div class="flex items-center gap-4 mb-6">

                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center font-bold text-xl uppercase leading-none border-2 border-blue-400">

                                {{ substr(auth()->user()->name, 0, 1) }}

                            </div>

                            <div>

                                <p class="font-bold leading-none">{{ auth()->user()->name }}</p>

                                <p class="text-xs text-gray-400 mt-1 italic">{{ auth()->user()->email }}</p>

                            </div>

                        </div>

                        <div class="space-y-3 pt-4 border-t border-gray-800">

                            <div class="flex justify-between text-sm">

                                <span class="text-gray-400">Role</span>

                                <span class="badge bg-blue-900/50 text-blue-300 px-2 py-0.5 rounded text-xs border border-blue-800">ADMINISTRATOR</span>

                            </div>

                            <div class="flex justify-between text-sm">

                                <span class="text-gray-400">Last Login</span>

                                <span class="text-gray-200">Hari ini</span>

                            </div>

                        </div>

                    </div>



                    <!-- Bantuan -->

                    <div class="bg-gradient-to-br from-purple-600 to-indigo-700 rounded-3xl p-6 text-white shadow-lg shadow-purple-200">

                        <h4 class="font-bold mb-2">Butuh Bantuan?</h4>

                        <p class="text-xs text-purple-100 mb-4 leading-relaxed">Jika sistem mengalami kendala dalam input data atau ekspor laporan, silakan hubungi tim teknis.</p>

                        <button class="w-full bg-white/20 hover:bg-white/30 py-2 rounded-xl text-sm font-bold transition-all border border-white/30 backdrop-blur-sm">

                            Buka Tiket Support

                        </button>

                    </div>

                </div>

            </div>



        </div>

    </div>

</x-app-layout>