<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Member</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-tertiary">
    <section class="relative flex items-center justify-center px-4 overflow-x-hidden">
        <!-- Blur Background Elements -->
        <div class="absolute w-[40rem] h-[40rem] top-0 left-[0rem] bg-primary/50 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[40rem] h-[40rem] bottom-10 right-[0rem] bg-secondary/50 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[30rem] h-[30rem] inset-0 bg-green-300/50 rounded-full blur-3xl -z-10 m-auto"></div>

        <div class="max-w-md w-full bg-white/20 border border-gray-200 p-8 rounded-lg shadow-xl my-12 overflow-x-hidden">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-4">Daftar Anggota</h2>
            <p class="text-center text-gray-600 mb-4 text-sm">
                Cari informasi buku dengan mudah dan lakukan booking kapan saja!
            </p>

            @if ($errors->any())
            <div class="mb-4">
                <ul class="bg-red-50 text-red-600 text-sm p-4 rounded-lg">
                    @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                            @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('register.member') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="bl ock text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama.." required autofocus
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan Email.." required
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <input type="password" name="password" id="password" placeholder="********" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div class="mb-4">
                    <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" required value="{{ old('whatsapp_number') }}"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400"
                        placeholder="Masukkan Nomor Whatsapp..">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="address" id="address" rows="3" required
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400"
                        placeholder="Masukkan Alamat..">{{ old('address') }}</textarea>
                    </div>

                    <div>
                        <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-2 px-4 rounded-lg shadow-md hover:shadow-lg hover:from-blue-500 hover:to-blue-300 focus:outline-none placeholder:text-gray-400 focus:ring focus:ring-blue-300 transition duration-200">
                        Daftar
                    </button>
                </div>
            </form>

            <p class="text-center text-gray-600 mt-6 text-sm">
                Sudah punya akun?
                <a href="{{ route('login.member') }}" class="text-blue-500 font-medium hover:underline">Login</a>
            </p>
        </div>
    </section>
</body>
</html>
