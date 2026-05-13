<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proses & Edit Laporan #{{ $laporan->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form method="POST" action="{{ route('admin.laporan.update', $laporan->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- SECTION 1: STATUS PENANGANAN (PENTING) -->
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <label class="block font-bold text-gray-700 mb-2 italic text-sm uppercase">Status Penanganan Laporan</label>
                        <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="menunggu" {{ $laporan->status == 'menunggu' ? 'selected' : '' }}>🟡 Menunggu (Belum Diproses)</option>
                            <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : '' }}>🔵 Setujui & Proses (Acc)</option>
                            <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>🟢 Selesai (Kasus Tuntas)</option>
                            <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : '' }}>🔴 Tolak Laporan</option>
                        </select>
                    </div>

                    <!-- SECTION 2: DATA DETAIL -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kasus</label>
                            <input type="text" name="jenis_kasus" value="{{ $laporan->jenis_kasus }}" 
                                   class="border-gray-300 w-full rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <input type="text" name="kategori" value="{{ $laporan->kategori }}" 
                                   class="border-gray-300 w-full rounded-lg shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kejadian</label>
                        <input type="text" name="lokasi" value="{{ $laporan->lokasi }}" 
                               class="border-gray-300 w-full rounded-lg shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kronologi Kejadian</label>
                        <textarea name="kronologi" rows="5" 
                                  class="border-gray-300 w-full rounded-lg shadow-sm">{{ $laporan->kronologi }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp / HP</label>
                        <input type="text" name="no_hp" value="{{ $laporan->no_hp }}" 
                               class="border-gray-300 w-full rounded-lg shadow-sm">
                    </div>

                    <!-- TOMBOL AKSI -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t">
                        <a href="{{ route('admin.laporan.index') }}" class="text-gray-600 hover:underline">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition duration-200">
                            Simpan Perubahan & Update Status
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>