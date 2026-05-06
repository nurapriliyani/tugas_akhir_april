<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

    <!-- TITLE -->
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Registrasi Akun
    </h2>

    <p class="text-center text-sm text-gray-500 mb-6">
        Sistem Pelaporan Komunitas Selendang Puan Dharma Ayu
    </p>

    <!-- ERROR -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label class="text-sm text-gray-600">Nama</label>
            <input type="text" name="name"
                   value="{{ old('name') }}"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                   placeholder="Masukkan nama"
                   required>
        </div>

        <!-- Email -->
        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                   placeholder="Masukkan email"
                   required>
        </div>

        <!-- Password -->
        <div>
            <label class="text-sm text-gray-600">Password</label>
            <input type="password" name="password"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                   placeholder="Masukkan password"
                   required>
        </div>

        <!-- Confirm -->
        <div>
            <label class="text-sm text-gray-600">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                   placeholder="Ulangi password"
                   required>
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
            Daftar
        </button>

    </form>

    <!-- LOGIN LINK -->
    <p class="text-center text-sm text-gray-500 mt-6">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-600 font-semibold">
            Login di sini
        </a>
    </p>

</div>

</body>
</html>