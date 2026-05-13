<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">Kelola Pengguna</h2>
            <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-2 px-4 rounded-xl transition">
                + Tambah User
            </a>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Nama & Email</th>
                            <th class="p-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Role</th>
                            <th class="p-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="p-4">
                                <div class="text-sm font-bold text-gray-800">{{ $user->nama }}</div> <!-- Sesuai kolom database kamu -->
                                <div class="text-xs text-gray-400">{{ $user->email }}</div>
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                                    {{ strtoupper($user->role) }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.users.show', $user) }}" class="p-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition text-xs">👁️</a>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition text-xs">✏️</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition text-xs">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4 border-t border-gray-50">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>