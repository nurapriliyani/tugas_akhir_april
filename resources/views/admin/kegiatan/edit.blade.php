<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.kegiatan.index') }}" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 hover:bg-gray-50 transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Edit Agenda Kegiatan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Perhatikan: Action menggunakan route update dan method PUT -->
                <form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data" class="p-8 md:p-10">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- Judul Kegiatan -->
                        <div>
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Nama / Judul Kegiatan</label>
                            <input type="text" name="judul" value="{{ old('judul', $kegiatan->judul) }}" required
                                class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4"
                                placeholder="Contoh: Workshop Pemberdayaan Perempuan">
                            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tanggal -->
                            <div>
                                <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Tanggal Pelaksanaan</label>
                                <input type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal) }}" required
                                    class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4">
                            </div>

                            <!-- Lokasi -->
                            <div>
                                <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Lokasi / Tempat</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}" required
                                    class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4"
                                    placeholder="Contoh: Balai Desa Indramayu">
                            </div>
                        </div>

                        <!-- Status Kegiatan (Tambahan untuk Edit) -->
                        <div>
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Status Kegiatan</label>
                            <select name="status" class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4">
                                <option value="aktif" {{ $kegiatan->status == 'aktif' ? 'selected' : '' }}>Aktif (Akan Datang)</option>
                                <option value="selesai" {{ $kegiatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Deskripsi Kegiatan</label>
                            <textarea name="deskripsi" rows="5" required
                                class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4"
                                placeholder="Jelaskan detail kegiatan di sini...">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="p-6 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Poster / Foto Kegiatan</label>
                            
                            @if($kegiatan->gambar)
                                <div class="mb-4">
                                    <p class="text-xs text-gray-500 mb-2 italic">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="w-32 h-32 object-cover rounded-xl border border-gray-200 shadow-sm">
                                </div>
                            @endif

                            <input type="file" name="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-400 mt-2">*Kosongkan jika tidak ingin mengubah gambar. Max 2MB.</p>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-10 flex gap-4">
                        <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-emerald-200 transition-all transform active:scale-95">
                            SIMPAN PERUBAHAN
                        </button>
                        <a href="{{ route('admin.kegiatan.index') }}" class="px-8 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold py-4 rounded-2xl transition-all">
                            BATAL
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>