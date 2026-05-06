<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajukan Laporan
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 pb-20">

            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="text-lg font-bold mb-4">📄 Form Laporan</h3>

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORM -->
                <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Jenis Kasus -->
                    <div class="mb-4">
                        <label>Jenis Kasus</label>
                        <select name="jenis_kasus" class="w-full border p-2 rounded">
                            <option value="">-- Pilih Kasus --</option>
                            <option value="kekerasan">Kekerasan</option>
                            <option value="pelecehan">Pelecehan</option>
                            <option value="penipuan">Penipuan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="w-full border p-2 rounded">
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-4">
                        <label>Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" class="w-full border p-2 rounded">
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-4">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="w-full border p-2 rounded">
                    </div>

                    <!-- Kronologi -->
                    <div class="mb-4">
                        <label>Kronologi</label>
                        <textarea name="kronologi" class="w-full border p-2 rounded"></textarea>
                    </div>

                    <!-- Bukti -->
                    <div class="mb-4">
                        <label>Bukti</label>
                        <input type="file" name="bukti">
                    </div>

                    <!-- No HP -->
                    <div class="mb-4">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="w-full border p-2 rounded">
                    </div>

                    <!-- Anonim -->
                    <div class="mb-4">
                        <input type="checkbox" name="anonim">
                        <label>Laporkan sebagai anonim</label>
                    </div>

                    <!-- 🔥 TOMBOL FIX -->
                    <button type="submit"
                        style="background:blue; color:white; padding:12px; width:100%; border-radius:8px;">
                        SIMPAN LAPORAN
                    </button>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>