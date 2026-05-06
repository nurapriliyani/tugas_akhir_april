<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

    <!-- TITLE -->
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Login Akun
    </h2>

    <p class="text-center text-sm text-gray-500 mb-6">
        Sistem Pelaporan Komunitas Selendang Puan Dharma Ayu
    </p>

    <!-- STATUS -->
    @if (session('status'))
        <div class="bg-green-100 text-green-600 p-3 rounded mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

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
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

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

        <!-- Remember -->
        <div class="flex items-center">
            <input type="checkbox" name="remember"
                   class="rounded border-gray-300 text-blue-600">

            <label class="ml-2 text-sm text-gray-600">
                Remember me
            </label>
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
            Login
        </button>

    </form>

    <!-- LINK -->
    <p class="text-center text-sm text-gray-500 mt-6">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-blue-600 font-semibold">
            Daftar di sini
        </a>
    </p>

</div>

</body>
</html>