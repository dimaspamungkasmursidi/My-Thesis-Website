<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>My Library</title>
</head>
<style>
    .hero-section {
        background-image: url('images/bg1.jpg');
    }
    @media screen and (max-width: 768px) {
        .hero-section {
            background-image: url('images/bg2.jpg');
        }
    }
</style>
<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <header class="bg-gray-800 text-gray-200 py-4 px-4 md:px-20 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">Babelan Knowledge Hub</a>
            <nav class="space-x-4">
                <a href="{{ route('register.member') }}" class="text-gray-200 hover:text-gray-400">
                    <button type="button" class="border border-gray-300 rounded-md px-4 py-2">Register</button>
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-screen hero-section">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white py-12 px-4 md:px-20">
            <div>
                <img src="{{ asset('images/logobekasi.svg.png') }}" alt="" class="w-64">
            </div>
          <h1 class="text-4xl md:text-6xl font-bold leading-tight">Sistem Informasi Perpustakaan Desa</h1>
          <p class="mt-4 text-lg md:text-xl max-w-2xl">
            Akses mudah untuk menemukan, meminjam, dan menikmati koleksi buku terbaik di desa Babelan Kota.
            Jadikan membaca sebagai bagian dari kehidupan sehari-hari.
          </p>
          <div class="mt-6 flex">
            <a href="index.html" class="bg-yellow-500 text-black font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-yellow-600 transition duration-300">
              Cari Buku
            </a>
          </div>
        </div>
    </section>


    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to the Home Page!</h1>
        @auth
            <p class="text-xl">Hello, {{ auth()->user()->name }}! You are logged in.</p>
        @else
            <p class="text-xl">Please <a href="{{ route('login.member') }}" class="text-blue-500">login</a> or <a href="{{ route('register.member') }}" class="text-blue-500">register</a>.</p>
        @endauth
    </div>

    <!-- Features Section -->
    <section id="features" class="py-12 px-4 md:px-20 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Why Choose Us?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Wide Collection</h3>
                    <p>Explore a vast library of books from different genres and authors.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">User Friendly</h3>
                    <p>Enjoy a seamless and intuitive user experience.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Easy Access</h3>
                    <p>Borrow or return books anytime, anywhere.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Books Section -->
    <section id="books" class="py-12 px-4 md:px-20">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-6 text-center">Books</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
                @forelse($books as $book)
                    <div class=" flex flex-col items-start justify-between">
                        <div>
                            <div class="flex-shrink-0 overflow-hidden bg-slate-400 p-4 mb-2 flex flex-col items-center justify-center h-52 w-full rounded-md">
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="w-full h-full object-contain object-center">
                            </div>
                            <h3 class="text-md font-bold leading-4 mb-2">{{ $book->title }}</h3>
                            <p class="text-sm text-gray-600 leading-4 line-clamp-2 mb-2">{{ $book->description }}</p>
                        </div>
                        <div>
                            <p class="text-sm leading-4 mb-4 {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                Stock: {{ $book->stock }}
                            </p>
                            <a href="{{ route('books.show', $book->id) }}" class="bg-gray-700 text-gray-200 py-1 px-3 rounded-lg hover:bg-gray-600">Detail Buku</a>
                        </div>
                    </div>
                    @empty
                    <div class="flex flex-col items-center justify-center py-10">
                        <div class="bg-slate-100 p-6 rounded-lg shadow-lg flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <h2 class="text-lg font-semibold text-gray-700 mb-2">Oops! Tidak Ada Buku</h2>
                            <p class="text-sm text-gray-500 mb-4 text-center">Kami tidak dapat menemukan buku di katalog saat ini. Silakan kembali nanti atau gunakan fitur pencarian.</p>
                            <a href="{{ route('home') }}" class="bg-gray-700 text-gray-200 py-2 px-4 rounded-lg hover:bg-gray-600">Kembali ke Beranda</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 My Library. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
