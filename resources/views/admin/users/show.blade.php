<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Detail Pengguna</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100">
                <div class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center text-4xl text-white font-black mx-auto mb-4">
                    {{ substr($user->nama, 0, 1) }}
                </div>
                <h3 class="text-2xl font-black text-gray-800">{{ $user->nama }}</h3>
                <p class="text-gray-400 font-medium">{{ $user->email }}</p>
                
                <div class="mt-8 grid grid-cols-2 gap-4 text-left">
                    <div class="p-4 bg-gray-50 rounded-2xl">
                        <p class="text-[10px] font-bold text-gray-400 uppercase">Level Akses</p>
                        <p class="font-bold text-gray-700 mt-1 italic">{{ strtoupper($user->role) }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-2xl">
                        <p class="text-[10px] font-bold text-gray-400 uppercase">Tanggal Bergabung</p>
                        <p class="font-bold text-gray-700 mt-1 italic">{{ $user->created_at->format('d F Y') }}</p>
                    </div>
                </div>

                <a href="{{ route('admin.users.index') }}" class="mt-8 inline-block w-full bg-gray-900 text-white font-bold py-3 rounded-xl hover:bg-black transition">Tutup Detail</a>
            </div>
        </div>
    </div>
</x-app-layout>