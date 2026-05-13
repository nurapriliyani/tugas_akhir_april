<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Edit Profil: {{ $user->nama }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.updateRole', $user) }}" method="POST" class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                @csrf @method('PATCH')
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $user->nama }}" class="w-full mt-1 border-gray-200 rounded-xl bg-gray-50" readonly>
                        <p class="text-[10px] text-gray-400 mt-1">*Nama hanya bisa diubah oleh user melalui profil pribadi.</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Hak Akses Sistem</label>
                        <select name="role" class="w-full mt-1 border-gray-200 rounded-xl focus:ring-blue-500">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User Biasa</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                        </select>
                    </div>
                </div>
                <div class="mt-8 flex gap-3">
                    <button type="submit" class="flex-1 bg-amber-500 text-white font-bold py-3 rounded-xl hover:bg-amber-600 transition shadow-lg shadow-amber-100">Update Role</button>
                    <a href="{{ route('admin.users.index') }}" class="flex-1 bg-gray-100 text-center text-gray-600 font-bold py-3 rounded-xl hover:bg-gray-200 transition">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>