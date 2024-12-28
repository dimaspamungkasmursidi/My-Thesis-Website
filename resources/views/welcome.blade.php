<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>My Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>
<style>
    body {
        overflow-x: hidden;
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fadeIn {
        animation: fadeIn 1s ease-in-out;
    }
    .animate-slideUp {
        animation: slideUp 0.8s ease-in-out;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .slider-container {
        position: relative;
        overflow: hidden;
    }
    .slider-wrapper {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slider-slide {
        flex: 0 0 100%;
    }

    .prev-btn, .next-btn {
        cursor: pointer;
    }
</style>
<body class="bg-tertiary">
    <!-- Header -->
    <section class="relative overflow-x-hidden">
        @include('layouts.navbar')

        <!-- Blur Background Elements -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[40rem] md:h-[40rem] top-[-3rem] right-[-14rem] bg-primary/30 rounded-full blur-3xl -z-10 overflow-x-hidden"></div>
        <div class="absolute w-[20rem] h-[30em] md:w-[30rem] md:h-[30rem] top-[2rem] right-[-12rem] bg-secondary/50 rounded-full blur-3xl -z-10 overflow-x-hidden"></div>

        <!-- Hero Section -->
        <section class="container mx-auto min-h-screen flex flex-col-reverse md:flex-row items-center justify-center px-4 md:px-20 overflow-x-hidden">
            <div class="md:w-1/2">
                <h1 class="hidden md:block text-5xl font-bold text-center md:text-left mb-2">Sistem Informasi Perpustakaan <br> <span class="text-primary">Desa Babelan Kota</span></h1>
                <p class="text-lg text-center md:text-left text-gray-600 leading-relaxed mb-4">Nikmati Kemudahan Mencari Buku. Akses Informasi Koleksi dan Booking Sebelum Berkunjung.</p>
                <form action="">
                    <div class="flex items-center justify-center md:justify-start">
                        <input type="text" placeholder="Cari buku" class="w-full md:w-1/2 px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:border-primary">
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-r-md hover:bg-secondary transition duration-300 ease-in-out">Cari</button>
                    </div>
                </form>
            </div>
            <div class="md:w-1/2 flex-shrink-0">
                <h1 class="md:hidden text-4xl font-bold text-center md:text-left mb-8">Sistem Informasi Perpustakaan <br> <span class="text-primary">Desa Babelan Kota</span></h1>
                <img src="{{ asset('images/hero.png') }}" alt="Cover" class="mb-4 md:mb-0">
            </div>
        </section>

        <!-- Blur Background Elements -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[40rem] md:h-[40rem] top-[45rem] left-[-14rem] md:top-[35rem] md:left-[-14rem] bg-secondary/40 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[20rem] h-[30em] md:w-[30rem] md:h-[30rem] top-[55rem] left-[-12rem] md:top-[45rem] md:left-[-12rem] bg-primary/40 rounded-full blur-3xl -z-10"></div>

        <!-- Latest Books -->
        <div class="container mx-auto px-4 md:px-20">
            <h1 class="text-3xl font-bold text-center mb-6 animate-fadeIn">Update Buku Terbaru!</h1>

            <div class="flex overflow-x-auto gap-4 py-4 -mx-4 px-4 scrollbar-hide">
                @foreach ($books as $book)
                    <div 
                        class="flex-shrink-0 w-52 bg-white/30 border border-gray-300 rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 animate-slideUp"
                    >
                        <div class="relative h-80">
                            <img 
                                src="{{ asset('storage/' . $book->image) }}" 
                                alt="{{ $book->title }}"
                                class="w-full h-full object-cover"
                            >
                            <div class="absolute w-full h-full bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-black/10"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <div class="w-fit">
                                    <p class="bg-white/40 px-2 py-1 mb-2 rounded border border-gray-300 text-white text-sm">
                                        {{ $book->category->name ?? 'Unknown Category' }}
                                    </p>
                                </div>
                                <h2 class="text-white font-semibold text-lg line-clamp-1">{{ $book->title }}</h2>
                                <p class="text-white text-sm">{{ $book->author }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Slider Quotes -->
        <section class="container mx-auto py-16 px-4 md:px-20 text-center">
            <h2 class="text-3xl font-bold">Quotes</h2>
            <div class="relative">
                <!-- Slider Container -->
                <div class="slider-container">
                    <div class="slider-wrapper">
                        <!-- Slide 1 -->
                        <div class="slider-slide flex justify-center items-center py-8">
                            <div class="bg-primary/20 p-8 px-10 rounded-xl shadow-xl max-w-2xl w-full border border-gray-300">
                                <p class="text-lg text-gray-800 italic">"Perpustakaan adalah jendela dunia, dan siapa pun yang mengunjungi akan melihat dunia yang tak terbatas." - Anonymous</p>
                                <div class="mt-4">
                                    <h4 class="font-semibold text-gray-900">Anonymous</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="slider-slide flex justify-center items-center py-8">
                            <div class="bg-primary/20 p-8 px-10 rounded-xl shadow-xl max-w-2xl w-full border border-gray-300">
                                <p class="text-lg text-gray-800 italic">"Buku adalah teman terbaik yang tak akan pernah mengecewakanmu." - Charles W. Eliot</p>
                                <div class="mt-4">
                                    <h4 class="font-semibold text-gray-900">Charles W. Eliot</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="slider-slide flex justify-center items-center py-8">
                            <div class="bg-primary/20 p-8 px-10 rounded-xl shadow-xl max-w-2xl w-full border border-gray-300">
                                <p class="text-lg text-gray-800 italic">"Membaca adalah pelarian yang tidak pernah bisa dihentikan." - Virginia Woolf</p>
                                <div class="mt-4">
                                    <h4 class="font-semibold text-gray-900">Virginia Woolf</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="slider-slide flex justify-center items-center py-8">
                            <div class="bg-primary/20 p-8 px-10 rounded-xl shadow-xl max-w-2xl w-full border border-gray-300">
                                <p class="text-lg text-gray-800 italic">"Perpustakaan adalah tempat terbaik untuk memulai perjalanan tanpa batas." - Oprah Winfrey</p>
                                <div class="mt-4">
                                    <h4 class="font-semibold text-gray-900">Oprah Winfrey</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 5 -->
                        <div class="slider-slide flex justify-center items-center py-8">
                            <div class="bg-primary/20 p-8 px-10 rounded-xl shadow-xl max-w-2xl w-full border border-gray-300">
                                <p class="text-lg text-gray-800 italic">"Buku adalah sumber daya untuk membuat dunia lebih baik." - Barack Obama</p>
                                <div class="mt-4">
                                    <h4 class="font-semibold text-gray-900">Barack Obama</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prev and Next Buttons -->
                    <div class="prev-btn absolute top-1/2 left-0 transform -translate-y-1/2 bg-primary/30 text-black text-2xl py-1 px-2 rounded-full transition-all hover:scale-110">
                    &larr;
                    </div>
                    <div class="next-btn absolute top-1/2 right-0 transform -translate-y-1/2 bg-primary/30 text-black text-2xl py-1 px-2 rounded-full transition-all hover:scale-110">
                    &rarr;
                    </div>
                </div>
            </div>
        </section>

        <!-- Book Suggestions Section -->
        <section id="books" class="pb-20 px-4 md:px-20">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-center">Rekomendasi Buku Keren Buat Kamu</h2>
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
                                    Stock: {{ $book->stock }}
                                </p>
                                <a href="{{ route('books.show', $book->id) }}" class="bg-gradient-to-r from-blue-400 to-primary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400">Detail Buku</a>
                            </div>
                        </div>
                    @empty
                        <!-- No Books Available -->
                        <div class="col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-5 xl:col-span-6 flex flex-col items-center justify-center text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 64 64" enable-background="new 0 0 64 64" class="w-80 h-80 mb-6">
                                <circle cx="32" cy="32" r="23" fill="#fd3c4f"></circle><ellipse cx="32" cy="61" opacity=".3" rx="19" ry="3"></ellipse><path fill="#fff" d="M32,14c2.577,0,4.674-1.957,4.946-4.461C35.352,9.19,33.699,9,32,9 C19.297,9,9,19.297,9,32c0,1.699,0.19,3.352,0.539,4.946C12.044,36.674,14,34.577,14,32C14,22.075,22.075,14,32,14z" opacity=".3"></path><path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M15.047,23.427c1.878-3.699,4.932-6.705,8.666-8.522"></path><path d="M54.461,27.054C51.956,27.326,50,29.423,50,32c0,9.925-8.075,18-18,18 c-2.577,0-4.674,1.957-4.946,4.461C28.648,54.81,30.301,55,32,55c12.703,0,23-10.297,23-23C55,30.301,54.81,28.648,54.461,27.054z" opacity=".15"></path><circle cx="32" cy="32" r="16" fill="#37d0ee"></circle><rect width="8" height="43.841" x="28" y="10.08" fill="#fd3c4f" transform="rotate(45.001 32 32)"></rect>
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-700 mb-2">Oops! Tidak Ada Buku Saat Ini</h3>
                            <p class="text-gray-600 mb-4">
                                Kami sedang memperbarui koleksi buku kami. Harap cek kembali nanti atau hubungi staf perpustakaan untuk informasi lebih lanjut.
                            </p>
                            <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-400 to-primary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400">
                                Kembali ke BerKamu
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="pb-20 px-4 md:px-20">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-center">Pertanyaan yang Sering Ditanyakan (FAQ)</h2>
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="bg-white/30 border border-gray-300 rounded-md">
                        <button @click="open = !open" class="w-full text-left px-6 py-4 flex items-center justify-between gap-4">
                            <h3 class="text-lg font-bold text-primary">Bagaimana cara mendaftar sebagai anggota?</h3>
                            <span :class="open ? 'rotate-90' : ''" class="transition-transform text-2xl">
                            ➯
                            </span>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-4 text-gray-600 leading-relaxed">
                        Daftar jadi anggota gampang banget! Kamu bisa langsung daftar di halaman <a href="{{ route('register.member') }}" class="text-blue-500 underline hover:text-blue-700">pendaftaran anggota</a>, atau kalau butuh bantuan, mampir aja ke perpustakaan. Kami siap bantu!.
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="bg-white/30 border border-gray-300 rounded-md">
                        <button @click="open = !open" class="w-full text-left px-6 py-4 flex items-center justify-between gap-4">
                            <h3 class="text-lg font-bold text-primary">Bagaimana cara meminjam buku?</h3>
                            <span :class="open ? 'rotate-90' : ''" class="transition-transform text-2xl">
                            ➯
                            </span>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-4 text-gray-600 leading-relaxed">
                        Pinjam buku? Mudah banget! Mulai dengan cari buku favorit kamu di <a href="{{ route('allBook') }}" class="text-blue-500 underline hover:text-blue-700">halaman Semua Buku</a>, kalo udah ketemu buku yang kamu cari, klik tombol Detail Buku, terus klik Booking. Setelah itu, staf perpustakaan bakal nyiapin buku kamu. Tinggal datang dan ambil, deh!.
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="bg-white/30 border border-gray-300 rounded-md">
                        <button @click="open = !open" class="w-full text-left px-6 py-4 flex items-center justify-between gap-4">
                            <h3 class="text-lg font-bold text-primary">Berapa lama durasi peminjaman buku?</h3>
                            <span :class="open ? 'rotate-90' : ''" class="transition-transform text-2xl">
                            ➯
                            </span>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-4 text-gray-600 leading-relaxed">
                        Durasi peminjaman buku itu 7 hari, jadi pastikan kamu kembaliin tepat waktu ya! atau kamu juga bisa perpanjang durasi peminjaman dengan mengkonfirmasi ke staf perpustakaan.
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div x-data="{ open: false }" class="bg-white/30 border border-gray-300 rounded-md">
                        <button @click="open = !open" class="w-full text-left px-6 py-4 flex items-center justify-between gap-4">
                            <h3 class="text-lg font-bold text-primary">Apakah ada denda untuk keterlambatan atau kerusakan buku?</h3>
                            <span :class="open ? 'rotate-90' : ''" class="transition-transform text-2xl">
                            ➯
                            </span>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-4 text-gray-600 leading-relaxed">
                        Iya, ada! Denda keterlambatan 2.000 per hari, mulai dari tanggal pengembalian yang ditentukan. Kalau bukunya rusak parah, denda 50% dari harga buku. Jika buku hilang, kamu diminta membeli buku yang sama dan diserahkan ke perpustakaan desa.
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div x-data="{ open: false }" class="bg-white/30 border border-gray-300 rounded-md">
                        <button @click="open = !open" class="w-full text-left px-6 py-4 flex items-center justify-between gap-4">
                            <h3 class="text-lg font-bold text-primary">Apakah ada koleksi buku digital?</h3>
                            <span :class="open ? 'rotate-90' : ''" class="transition-transform text-2xl">
                            ➯
                            </span>
                        </button>
                        <div x-show="open" x-transition class="px-6 pb-4 text-gray-600 leading-relaxed">
                        Saat ini, kami belum menyediakan buku digital. Tapi tenang, kamu bisa cek katalog lengkap kami untuk menemukan berbagai buku fisik yang tersedia di perpustakaan!.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Background Blur Center -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[30rem] md:h-[30rem] bottom-1/2 md:bottom-[30%] left-[-8rem] md:left-[20rem] bg-secondary/40 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[40rem] h-[30em] md:w-[30rem] md:h-[30rem] bottom-[40%] right-[-8rem] md:right-[2rem] bg-primary/30 rounded-full blur-3xl -z-10"></div>
        
        <!-- Blur Background Elements -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[40rem] md:h-[40rem] bottom-32 right-[-10rem] bg-secondary/40 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[20rem] h-[30em] md:w-[30rem] md:h-[30rem] bottom-0 right-[-12rem] bg-primary/40 rounded-full blur-3xl -z-10"></div>

        @include('layouts.footer')
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        // Get elements
        const prevButton = document.querySelector('.prev-btn');
        const nextButton = document.querySelector('.next-btn');
        const sliderWrapper = document.querySelector('.slider-wrapper');
        const slides = document.querySelectorAll('.slider-slide');
        
        let currentIndex = 0;
        
        // Function to show the current slide
        function showSlide(index) {
            if (index < 0) {
                currentIndex = slides.length - 1; // Wrap to the last slide
            } else if (index >= slides.length) {
                currentIndex = 0; // Wrap to the first slide
            }
            
            // Update slider position by moving the wrapper
            const slideWidth = slides[0].clientWidth; // Width of one slide
            sliderWrapper.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }

        // Event listener for the 'previous' button
        prevButton.addEventListener('click', () => {
            currentIndex--;
            showSlide(currentIndex);
        });

        // Event listener for the 'next' button
        nextButton.addEventListener('click', () => {
            currentIndex++;
            showSlide(currentIndex);
        });

        // Initialize the slider
        window.addEventListener('load', () => {
            showSlide(currentIndex);
        });
    </script>
</body>
</html>
