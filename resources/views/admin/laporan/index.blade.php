<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Laporan (Admin)
        </h2>
    </x-slot>

    <div class="p-6 max-w-7xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.laporan.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
               + Tambah Laporan Manual
            </a>
        </div>

        <div class="space-y-4">
            @forelse ($laporan as $item)
                <div class="bg-white p-5 shadow-sm border border-gray-100 rounded-xl">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">{{ $item->jenis_kasus }}</h3>
                            <div class="text-sm text-gray-500 mt-1">
                                Pelapor: 
                                <span class="font-semibold text-gray-700">
                                    {{ $item->user->name ?? 'User Tidak Ditemukan' }}
                                </span>
                                @if($item->anonim)
                                    <span class="ml-2 px-2 py-0.5 bg-red-50 text-red-500 text-xs rounded border border-red-100 italic">
                                        *User memilih Anonim
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- STATUS BADGE (REVISI WARNA) -->
                        <span class="px-3 py-1 text-white text-xs font-bold rounded-full
                            @if($item->status == 'menunggu') bg-yellow-500
                            @elseif($item->status == 'diproses') bg-blue-500
                            @elseif($item->status == 'selesai') bg-green-500
                            @elseif($item->status == 'ditolak') bg-red-600
                            @else bg-gray-400
                            @endif
                        ">
                            {{ strtoupper($item->status_label) }}
                        </span>
                    </div>

                    <p class="text-gray-600 text-sm mt-3 line-clamp-2">
                        {{ $item->kronologi }}
                    </p>

                    <div class="mt-4 pt-4 border-t border-gray-50 flex gap-4">
                        <a href="{{ route('admin.laporan.show', $item->id) }}" 
                           class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                            Detail Laporan
                        </a>
                        <a href="{{ route('admin.laporan.edit', $item->id) }}" 
                           class="text-yellow-600 hover:text-yellow-800 font-medium text-sm">
                            Update Status/Edit
                        </a>
                    </div>
                </div>
            @empty
                <div class="bg-white p-10 rounded-xl shadow-sm text-center">
                    <p class="text-gray-500 italic">Belum ada laporan yang masuk ke sistem.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>