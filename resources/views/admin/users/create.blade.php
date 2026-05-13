<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Tambah Anggota Baru</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full mt-1 border-gray-200 rounded-xl focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Alamat Email</label>
                        <input type="email" name="email" class="w-full mt-1 border-gray-200 rounded-xl focus:ring-blue-500" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase">Password</label>
                            <input type="password" name="password" class="w-full mt-1 border-gray-200 rounded-xl focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase">Role</label>
                            <select name="role" class="w-full mt-1 border-gray-200 rounded-xl focus:ring-blue-500">
                                <option value="user">User Biasa</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex gap-3">
                    <button type="submit" class="flex-1 bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 transition">Simpan User</button>
                    <a href="{{ route('admin.users.index') }}" class="flex-1 bg-gray-100 text-center text-gray-600 font-bold py-3 rounded-xl hover:bg-gray-200 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>