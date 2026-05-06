<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Laporan Saya
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="text-lg font-bold mb-4">📑 Daftar Laporan</h3>

                <table class="w-full border rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-left text-sm">
                            <th class="p-3">Jenis Kasus</th>
                            <th class="p-3">Kronologi</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($laporans as $laporan)
                            <tr class="border-t hover:bg-gray-50 transition">

                                <!-- KLIK KE DETAIL -->
                                <td class="p-3 font-semibold text-blue-600">
                                    <a href="{{ route('laporan.show', $laporan->id) }}"
                                       class="hover:underline">
                                        {{ $laporan->jenis_kasus }}
                                    </a>
                                </td>

                                <!-- KRONOLOGI -->
                                <td class="p-3 text-sm text-gray-600">
                                    {{ \Illuminate\Support\Str::limit($laporan->kronologi, 50) }}
                                </td>

                                <!-- STATUS -->
                                <td class="p-3">
                                    <span class="
                                        px-2 py-1 rounded text-white text-xs
                                        @if($laporan->status == 'menunggu') bg-yellow-500
                                        @elseif($laporan->status == 'diproses') bg-blue-500
                                        @elseif($laporan->status == 'selesai') bg-green-500
                                        @endif
                                    ">
                                        {{ $laporan->status_label }}
                                    </span>
                                </td>

                                <!-- TANGGAL -->
                                <td class="p-3 text-sm text-gray-500">
                                    {{ $laporan->created_at->format('d-m-Y') }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">
                                    Belum ada laporan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>
</x-app-layout>