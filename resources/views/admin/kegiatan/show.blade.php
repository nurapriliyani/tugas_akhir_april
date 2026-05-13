<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.kegiatan.index') }}" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 hover:bg-gray-50 transition">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Detail Agenda') }}
                </h2>
            </div>
            
            <div class="flex gap-2">
                <a href="{{ route('admin.kegiatan.edit', $kegiatan->id) }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-xl transition shadow-sm">
                    EDIT AGENDA
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Kolom Kiri: Poster/Gambar -->
                <div class="md:col-span-1">
                    <div class="bg-white p-4 rounded-3xl shadow-sm border border-gray-100">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Poster Kegiatan</label>
                        @if($kegiatan->gambar)
                            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="w-full h-auto rounded-2xl shadow-inner object-cover">
                        @else
                            <div class="aspect-square bg-gray-100 rounded-2xl flex flex-col items-center justify-center text-gray-400 border-2 border-dashed border-gray-200">
                                <span class="text-4xl mb-2">🖼️</span>
                                <p class="text-xs">Tidak ada gambar</p>
                            </div>
                        @endif

                        <div class="mt-6 space-y-4">
                            <div>
                                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Status</label>
                                <span class="inline-flex mt-1 px-3 py-1 rounded-full text-xs font-bold {{ $kegiatan->status == 'aktif' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ strtoupper($kegiatan->status) }}
                                </span>
                            </div>
                            <div>
                                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Dibuat Pada</label>
                                <p class="text-sm font-bold text-gray-700">{{ $kegiatan->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Detail Informasi -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-8 border-b border-gray-50">
                            <h3 class="text-3xl font-black text-gray-900 mb-4">{{ $kegiatan->judul }}</h3>
                            
                            <div class="flex flex-wrap gap-4 text-sm">
                                <div class="flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-xl font-bold">
                                    <span>📅</span> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d F Y') }}
                                </div>
                                <div class="flex items-center gap-2 px-4 py-2 bg-purple-50 text-purple-700 rounded-xl font-bold">
                                    <span>📍</span> {{ $kegiatan->lokasi }}
                                </div>
                            </div>
                        </div>

                        <div class="p-8">
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-4">Deskripsi Kegiatan</label>
                            <div class="prose max-w-none text-gray-600 leading-relaxed">
                                {!! nl2br(e($kegiatan->deskripsi)) !!}
                            </div>
                        </div>

                        <div class="p-8 bg-gray-50 flex justify-end gap-3">
                            <form action="{{ route('admin.kegiatan.destroy', $kegiatan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-3 bg-white border border-red-100 text-red-600 hover:bg-red-50 font-bold rounded-2xl transition">
                                    HAPUS AGENDA
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>