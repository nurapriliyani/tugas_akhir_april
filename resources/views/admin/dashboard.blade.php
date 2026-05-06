<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    👋 Halo, <b>{{ auth()->user()->nama }}</b> (Admin)
                    <br>
                    Selamat datang di sistem pelaporan.
                </div>
            </div>

            <!-- Menu Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Kelola Laporan -->
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-2">📄 Laporan Kasus</h3>
                    <p class="mb-4">Kelola semua laporan yang masuk dari pengguna.</p>
                    <a href="#" class="bg-white text-blue-500 px-4 py-2 rounded">
                        Lihat Laporan
                    </a>
                </div>

                <!-- Kelola Kegiatan -->
                <div class="bg-green-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-2">📅 Kegiatan</h3>
                    <p class="mb-4">Kelola kegiatan komunitas.</p>
                    <a href="#" class="bg-white text-green-500 px-4 py-2 rounded">
                        Kelola Kegiatan
                    </a>
                </div>

                <!-- Kelola User -->
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-2">👥 Pengguna</h3>
                    <p class="mb-4">Manajemen user pelapor dan admin.</p>
                    <a href="#" class="bg-white text-yellow-500 px-4 py-2 rounded">
                        Lihat User
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>