<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-tertiary">
    <section class="relative overflow-x-hidden py-8 px-4 md:px-20">
        <div class="container mx-auto flex items-center justify-between">
            <a href="javascript:history.back()" class="flex items-center gap-2 w-fit text-gray-500 hover:text-gray-700 font-medium group transition duration-300">
                <span class="relative text-2xl">
                    <span class="absolute inset-0 text-gray-300 group-hover:text-gray-500 transition duration-300">&larr;</span>
                    <span class="opacity-0 group-hover:opacity-100 transition duration-300">&larr;</span>
                </span>
                Kembali
            </a>
            <a href="{{ route('home') }}" class="flex items-center gap-2 w-fit text-gray-500 hover:text-gray-700 font-medium group transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 100 100" class="w-16 h-16">
                <circle cx="50" cy="50" r="36.5" fill="#e9f6ff"></circle><path fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M9.404,60.809	c0,0,17.102-11.032,35.577-7.895c16.352,2.777,18.731,0.688,26.511-2.688c5.244-2.275,6.72,3.257,6.072,5.038"></path><path fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M80.94,63.208	c4.093-5.473-1.869-9.132-4.747-7.45c0,0-9.67,5.03-16.258,5.725"></path><path fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M61.261,68.747	c0,0,7.77-0.992,13.859-4.862c5.921-3.763,11.593,2.722,5.131,7.441c-5.925,4.327-13.215,7.726-33.214,10.584	c-18.649,2.665-22.26,5.177-25.056,7.087"></path><path fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M30.748,59.963	c0,0,4.077-0.501,9.27,3.532c3.482,2.326,5.904,1.688,8.419,0.452c4.658-2.29,9.922,3.91,2.595,8.999	c-7.327,5.09-18.281,6.196-18.281,6.196"></path><polyline fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="25.766,25.351 49.416,6.905 73.766,25.351"></polyline><polyline fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="69.05,22.128 69.05,45.681 30.482,45.681 30.482,22.128"></polyline><rect width="7.755" height="10.436" x="38.277" y="23.032" fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></rect><rect width="8.521" height="15.032" x="54.117" y="30.5" fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></rect><line x1="38.277" x2="46.032" y1="26.527" y2="26.527" fill="none" stroke="#231f20" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></line>
                </svg>
            </a>
        </div>

    <div class="flex items-center justify-center overflow-x-hidden">
        <!-- Blur Background Elements -->
        <div class="absolute w-[40rem] h-[40rem] top-0 left-[0rem] bg-primary/50 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[40rem] h-[40rem] bottom-10 right-[0rem] bg-secondary/50 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[30rem] h-[30rem] inset-0 bg-green-300/50 rounded-full blur-3xl -z-10 m-auto"></div>

        <div class="max-w-md w-full bg-white/20 border border-gray-200 p-8 rounded-lg shadow-xl my-12 overflow-x-hidden">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-4">Edit Profil</h2>

            @if (session('success'))
                <div class="bg-green-50 text-green-600 p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('member.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" required
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div class="mb-4">
                    <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $member->whatsapp_number) }}" required
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="address" id="address" rows="3" required
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">{{ old('address', $member->address) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                    <small class="text-gray-500">Kosongkan jika tidak ingin mengubah kata sandi.</small>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none placeholder:text-gray-400">
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-2 px-4 rounded-lg shadow-md hover:shadow-lg hover:from-blue-500 hover:to-blue-300 focus:outline-none focus:ring focus:ring-blue-300 transition duration-200">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
    </section>
</body>
</html>
