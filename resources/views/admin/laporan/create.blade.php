<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Laporan (Admin)</h2>
    </x-slot>

    <div class="p-6 bg-white">

        <form method="POST" action="{{ route('admin.laporan.store') }}">
            @csrf

            <input type="text"
                   name="jenis_kasus"
                   placeholder="Jenis Kasus"
                   class="border w-full mb-2">

            <input type="text"
                   name="kategori"
                   placeholder="Kategori"
                   class="border w-full mb-2">

            <input type="text"
                   name="lokasi"
                   placeholder="Lokasi"
                   class="border w-full mb-2">

            <textarea name="kronologi"
                      placeholder="Kronologi"
                      class="border w-full mb-2"></textarea>

            <input type="text"
                   name="no_hp"
                   placeholder="No HP"
                   class="border w-full mb-2">

            <button class="bg-green-500 text-white px-3 py-2 rounded">
                Simpan
            </button>

        </form>

    </div>
</x-app-layout>