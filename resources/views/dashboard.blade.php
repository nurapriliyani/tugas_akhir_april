<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Komunitas
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome -->
            <div class="bg-white shadow rounded-xl p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800">
                    👋 Selamat datang, {{ auth()->user()->nama }}
                </h3>
                <p class="text-gray-600 mt-1">
                    Sistem Pelaporan Komunitas Selendang Puan Dharma Ayu
                </p>
            </div>

            <!-- QUICK STATS (sementara dummy, nanti bisa dari DB) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                <div class="bg-blue-500 text-white p-6 rounded-xl shadow">
                    <h4 class="text-sm">Total Laporan Saya</h4>
                    <p class="text-3xl font-bold mt-2">0</p>
                </div>

                <div class="bg-green-500 text-white p-6 rounded-xl shadow">
                    <h4 class="text-sm">Diproses</h4>
                    <p class="text-3xl font-bold mt-2">0</p>
                </div>

                <div class="bg-yellow-500 text-white p-6 rounded-xl shadow">
                    <h4 class="text-sm">Selesai</h4>
                    <p class="text-3xl font-bold mt-2">0</p>
                </div>

            </div>

            <!-- FEATURE -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- BUAT LAPORAN -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-bold text-gray-700">📄 Buat Laporan</h3>
                    <p class="text-gray-500 text-sm mt-2">
                        Laporkan kejadian secara aman dan cepat melalui sistem.
                    </p>

                    <a href="{{ route('laporan.create') }}"
                       class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded">
                        Ajukan Laporan
                    </a>
                </div>

                <!-- RIWAYAT LAPORAN -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-bold text-gray-700">📑 Riwayat Laporan</h3>
                    <p class="text-gray-500 text-sm mt-2">
                        Pantau semua laporan yang pernah kamu kirim.
                    </p>

                    <a href="{{ route('laporan.index') }}"
                       class="inline-block mt-4 bg-green-500 text-white px-4 py-2 rounded">
                        Lihat Riwayat
                    </a>
                </div>

            </div>

            <!-- INFO -->
            <div class="bg-white shadow rounded-xl p-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    ℹ️ Tentang Komunitas
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Selendang Puan Dharma Ayu adalah komunitas sosial yang berfokus pada perlindungan,
                    pendampingan, dan penanganan laporan masyarakat secara transparan, aman, dan responsif.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>