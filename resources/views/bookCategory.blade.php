<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucfirst($category->name) }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<style>
    body {
        overflow-x: hidden;
    }
</style>
<body class="bg-tertiary">
    <!-- Header -->
    <section class="relative overflow-x-hidden">
    @include('layouts.navbar')


        <!-- Blur Background Elements -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[40rem] md:h-[40rem] top-[-3rem] left-[-14rem] bg-primary/30 rounded-full blur-3xl -z-10 overflow-x-hidden"></div>
        <div class="absolute w-[20rem] h-[30em] md:w-[30rem] md:h-[30rem] top-[5rem] left-[-12rem] bg-secondary/40 rounded-full blur-3xl -z-10 overflow-x-hidden"></div>

        <section class="py-16 px-4 md:px-20">
            <div class="container mx-auto">
                <div class="mb-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold mb-2">Kategori {{ ucfirst($category->name) }}</h2>
                        <p class="hidden md:block text-gray-600 mb-4">
                            Temukan berbagai buku yang kamu cari dengan mudah di koleksi kami. Eksplorasi buku berdasarkan
                            kategori atau tema yang kamu sukai, dan temukan bacaan yang sempurna untuk menginspirasi dan
                            memperkaya pengetahuanmu.
                        </p>
                        <p class="md:hidden text-gray-600 mb-4">
                            Temukan berbagai buku yang kamu cari dengan mudah di koleksi kami. Kamu juga bisa mencari buku berdasarkan kategori.
                        </p>
                    </div>

                    <!-- Search -->
                    <div class="flex items-center justify-center mb-4">
                        <form method="GET" action="{{ route('bookCategory', ['category' => $category->id]) }}" class="flex w-full md:w-1/2">
                            <input 
                                type="text" 
                                name="q"
                                value="{{ request('q') }}" 
                                placeholder="Cari buku berdasarkan judul atau penulis..." 
                                class="w-full bg-white/30 px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:border-primary"
                            >
                            <button 
                                type="submit" 
                                class="px-4 py-2 bg-primary text-white rounded-r-md hover:bg-secondary">
                                Cari
                            </button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="mb-6">
                        <nav class="flex md:justify-center md:items-center overflow-x-auto gap-4 pb-2 scrollbar-hide">
                            <a href="{{ route('allBook') }}" 
                            class="px-4 py-2 rounded-md text-sm font-medium 
                            {{ request()->routeIs('allBook') ? 'bg-primary text-white' : 'bg-white/30 text-gray-600 border hover:bg-primary hover:text-white' }} 
                            transition duration-300 ease-in-out whitespace-nowrap">
                            Semua Buku
                            </a>
                            @foreach ($categories as $category)
                                <a href="{{ route('bookCategory', ['category' => $category->id]) }}" 
                                class="px-4 py-2 rounded-md text-sm font-medium 
                                {{ request()->route('category') == $category->id ? 'bg-primary text-white' : 'bg-white/30 text-gray-600 border hover:bg-primary hover:text-white' }} 
                                transition duration-300 ease-in-out">
                                {{ $category->name }}
                                </a>
                            @endforeach
                        </nav>
                    </div>

                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
                    @forelse($books as $book)
                        <div class="flex flex-col items-start justify-between">
                            <div>
                            <div class="flex-shrink-0 overflow-hidden bg-white/30 border border-gray-300 p-4 mb-2 flex flex-col items-center justify-center h-52 w-full rounded-md">
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" loading="lazy" class="w-full h-full object-contain object-center">
                                </div>
                                <h3 class="text-md font-bold leading-4 mb-2">{{ $book->title }}</h3>
                                <p class="text-sm text-gray-600 leading-4 line-clamp-2 mb-2">{{ $book->description }}</p>
                            </div>
                            <div>
                                <p class="text-sm leading-4 mb-4 {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    Jumlah : {{ $book->stock }}
                                </p>
                                <a href="{{ route('books.show', $book->id) }}" class="bg-gradient-to-r from-blue-400 to-primary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400 shadow-md transition-all duration-300 ease-in-out">Detail Buku</a>
                            </div>
                        </div>
                    @empty
                        <!-- No Books Available -->
                    <div class="col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-5 xl:col-span-6 flex flex-col items-center justify-center text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 64 64" enable-background="new 0 0 64 64" class="w-80 h-80 mb-6">
                            <circle cx="32" cy="32" r="23" fill="#fd3c4f"></circle><ellipse cx="32" cy="61" opacity=".3" rx="19" ry="3"></ellipse><path fill="#fff" d="M32,14c2.577,0,4.674-1.957,4.946-4.461C35.352,9.19,33.699,9,32,9 C19.297,9,9,19.297,9,32c0,1.699,0.19,3.352,0.539,4.946C12.044,36.674,14,34.577,14,32C14,22.075,22.075,14,32,14z" opacity=".3"></path><path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M15.047,23.427c1.878-3.699,4.932-6.705,8.666-8.522"></path><path d="M54.461,27.054C51.956,27.326,50,29.423,50,32c0,9.925-8.075,18-18,18 c-2.577,0-4.674,1.957-4.946,4.461C28.648,54.81,30.301,55,32,55c12.703,0,23-10.297,23-23C55,30.301,54.81,28.648,54.461,27.054z" opacity=".15"></path><circle cx="32" cy="32" r="16" fill="#37d0ee"></circle><rect width="8" height="43.841" x="28" y="10.08" fill="#fd3c4f" transform="rotate(45.001 32 32)"></rect>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Yah, maaf ya! belum ada buku di kategori ini..</h3>
                        <p class="text-gray-600 mb-4">
                        Tenang aja, koleksi buku di kategori ini akan kami tambahkan nanti! Yuk, coba cek kategori lain atau balik lagi nanti buat lihat apa yang baru!.
                        </p>
                        <a href="{{ route('allBook') }}" class="bg-primary text-white py-2 px-5 rounded-lg hover:bg-secondary">
                            Kembali ke <span class="font-bold">Semua Buku</span>
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Blur Background Elements -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[40rem] md:h-[40rem] bottom-32 right-[-10rem] bg-secondary/40 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[20rem] h-[30em] md:w-[30rem] md:h-[30rem] bottom-0 right-[-12rem] bg-primary/40 rounded-full blur-3xl -z-10"></div>

        @include('layouts.footer')
    </section>

</body>
</html>
