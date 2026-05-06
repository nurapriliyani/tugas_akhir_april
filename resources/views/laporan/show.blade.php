<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detail Laporan</h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="text-lg font-bold mb-4">
                    {{ $laporan->jenis_kasus }}
                </h3>

                <p class="text-sm text-gray-500 mb-2">
                    Status:
                    <span class="font-semibold text-blue-600">
                        {{ $laporan->status_label }}
                    </span>
                </p>

                <p class="text-sm text-gray-500 mb-2">
                    Lokasi: {{ $laporan->lokasi ?? '-' }}
                </p>

                <p class="text-sm text-gray-500 mb-4">
                    Tanggal: {{ $laporan->tanggal_kejadian ?? '-' }}
                </p>

                <hr class="my-4">

                <p class="text-gray-700 whitespace-pre-line">
                    {{ $laporan->kronologi }}
                </p>

                <!-- GAMBAR -->
                @if($laporan->bukti)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-2">Bukti:</p>
                        <img src="{{ asset('storage/' . $laporan->bukti) }}"
                             class="rounded-lg shadow w-full">
                    </div>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>