<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Detail Laporan</h2>
    </x-slot>

    <div class="p-6 bg-white">

        <h1 class="text-xl font-bold">
            {{ $laporan->jenis_kasus }}
        </h1>

        <p class="mt-3">
            {{ $laporan->kronologi }}
        </p>

        <div class="mt-4 text-sm text-gray-500">
            Status: {{ $laporan->status }} <br>
            Lokasi: {{ $laporan->lokasi }} <br>
            No HP: {{ $laporan->no_hp }}
        </div>

    </div>
</x-app-layout>