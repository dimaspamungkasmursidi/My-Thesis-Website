<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Member</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-tertiary">
    <div class="relative min-h-screen flex items-center justify-center px-4 overflow-x-hidden">

            <!-- Blur Background Elements -->
            <div class="absolute w-[40rem] h-[40rem] top-0 left-[0rem] bg-primary/50 rounded-full blur-3xl -z-10"></div>
            <div class="absolute w-[40rem] h-[40rem] bottom-10 right-[0rem] bg-secondary/50 rounded-full blur-3xl -z-10"></div>
            <div class="absolute w-[30rem] h-[30rem] inset-0 bg-green-300/50 rounded-full blur-3xl -z-10 m-auto"></div>

        <div class="max-w-md w-full bg-white/20 border border-gray-200 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login Anggota</h2>

            {{-- Check if the user is logged in --}}
            {{-- @if (Auth::guard('member')->check())
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::guard('member')->user()->name }}!</h1>
            @else
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang!</h1>
                <p class="text-gray-600 mt-4">Silakan login untuk melanjutkan.</p>
            @endif --}}

            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.member') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan Email.." required
                           class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Kata Sandi</label>
                    <input type="password" name="password" id="password" placeholder="********" required
                           class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm">Ingat Akun Saya</label>
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500">
                        Login
                    </button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <span class="text-sm text-gray-600">Belum punya akun?</span>
                <a href="{{ route('register.member') }}" class="text-blue-500 font-medium hover:underline">Daftar di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
