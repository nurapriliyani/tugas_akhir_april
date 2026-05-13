<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.kegiatan.index') }}" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 hover:bg-gray-50 transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Tambah Agenda Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="p-8 md:p-10">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Judul Kegiatan -->
                        <div>
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Nama / Judul Kegiatan</label>
                            <input type="text" name="judul" value="{{ old('judul') }}" required
                                class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4"
                                placeholder="Contoh: Workshop Pemberdayaan Perempuan">
                            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tanggal -->
                            <div>
                                <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Tanggal Pelaksanaan</label>
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}" required
                                    class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4">
                            </div>

                            <!-- Lokasi -->
                            <div>
                                <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Lokasi / Tempat</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                                    class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4"
                                    placeholder="Contoh: Balai Desa Indramayu">
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Deskripsi Kegiatan</label>
                            <textarea name="deskripsi" rows="5" required
                                class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 shadow-sm p-4"
                                placeholder="Jelaskan detail kegiatan di sini...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="p-6 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                            <label class="block text-sm font-black text-gray-700 uppercase tracking-wider mb-2">Poster / Foto Kegiatan</label>
                            <input type="file" name="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-400 mt-2">*Format: JPG, PNG (Max 2MB). Opsional.</p>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-10 flex gap-4">
                        <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-200 transition-all transform active:scale-95">
                            TERBITKAN AGENDA
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