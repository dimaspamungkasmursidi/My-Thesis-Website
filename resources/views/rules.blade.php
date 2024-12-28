<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Perpustakaan</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-tertiary">
    <section class="relative overflow-x-hidden">

        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Background Blur Top -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[40rem] md:h-[40rem] top-[-3rem] right-[-14rem] bg-primary/30 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[30rem] h-[40rem] md:w-[30rem] md:h-[30rem] top-[12rem] left-[-8rem] bg-secondary/40 rounded-full blur-3xl -z-10"></div>

        <!-- About Section -->
        <section class="container mx-auto min-h-[50vh] flex flex-col items-center justify-center pt-16 px-4 md:px-20 text-center">
            <div class="mb-8">
                <h1 class="text-5xl font-bold text-center text-primary mb-4">Tentang Perpustakaan</h1>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Perpustakaan Desa Babelan Kota berdiri untuk memberikan akses luas ke berbagai ilmu pengetahuan. Dengan lingkungan yang nyaman dan fasilitas yang memadai, kami menjadi bagian penting dari upaya membangun masyarakat yang literat.
                </p>
            </div>    
            <div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-6 bg-white/30 rounded-lg shadow-lg text-center border border-gray-300">
                        <h3 class="text-xl font-bold text-secondary mb-2">Akses Informasi</h3>
                        <p class="text-gray-600">
                            menyediakan berbagai sumber daya yang memudahkan masyarakat untuk mengakses informasi terkait buku dan lainnya.
                        </p>
                    </div>
                    <div class="p-6 bg-white/30 rounded-lg shadow-lg text-center border border-gray-300">
                        <h3 class="text-xl font-bold text-secondary mb-2">Meningkatkan Literasi</h3>
                        <p class="text-gray-600">
                            menyediakan berbagai sumber bacaan dan materi yang mendukung pengembangan pengetahuan dan keterampilan.
                        </p>
                    </div>
                    <div class="p-6 bg-white/30 rounded-lg shadow-lg text-center border border-gray-300">
                        <h3 class="text-xl font-bold text-secondary mb-2">Fasilitas Pembelajaran</h3>
                        <p class="text-gray-600">
                            Menyediakan fasilitas yang nyaman dan mendukung pembelajaran, seperti ruang baca yang tenang dan koleksi buku yang beragam.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Background Blur Center -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[30rem] md:h-[30rem] top-[85rem] md:top-[40rem] right-[-8rem] md:right-[12rem] bg-secondary/40 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[30rem] h-[30em] md:w-[30rem] md:h-[30rem] top-[75rem] md:top-[55rem] left-[-8rem] md:left-[12rem] bg-primary/20 rounded-full blur-3xl -z-10"></div>

        <!-- How to Borrow -->
        <section class="py-16 px-4 md:px-20">
            <div class="container mx-auto mb-8">
                <h2 class="text-3xl font-bold text-center text-primary mb-2">Panduan Peminjaman Buku</h2>
                <p class="text-lg text-gray-600 leading-relaxed text-center">
                    Pinjam buku jadi makin gampang dan seru! Ikuti langkah mudahnya..
                </p>
            </div>
            
            <div class="flex flex-col-reverse lg:flex-row justify-around items-center gap-6">
                <div class="relative flex flex-col space-y-8">
                    <div class="relative flex items-start p-2 bg-white/20 backdrop-blur-xl border border-gray-300 rounded-xl shadow-lg">
                        <div class="flex-shrink-0 w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">
                            1
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary tracking-wider">Daftar menjadi anggota perpustakaan</h3>
                            <p class="mt-1 text-black">Sebelum pinjam buku, kamu harus daftar sebagai anggota perpustakaan.</p>
                        </div>
                        <div class="absolute left-5 top-10 h-full border-l-2 border-secondary"></div>
                    </div>
                    <div class="relative flex items-start p-2 bg-white/20 backdrop-blur-xl border border-gray-300 rounded-xl shadow-lg">
                        <div class="flex-shrink-0 w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">
                            2
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary tracking-wider">Cari Buku yang Pengen Kamu Pinjam</h3>
                            <p class="mt-1 text-black">Langsung cek halaman <span class="font-medium text-primary"><a href={{ route('allBook') }}>Semua Buku</a></span> dan cari buku yang kamu inginkan.</p>
                        </div>
                        <div class="absolute left-5 top-10 h-full border-l-2 border-secondary"></div>
                    </div>
                    <div class="relative flex items-start p-2 bg-white/20 backdrop-blur-xl border border-gray-300 rounded-xl shadow-lg">
                        <div class="flex-shrink-0 w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">
                            3
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary tracking-wider">Klik Detail Buku</h3>
                            <p class="mt-1 text-black">Udah ketemu? Klik Detail Buku buat liat info lengkapnya!</p>
                        </div>
                        <div class="absolute left-5 top-10 h-full border-l-2 border-secondary"></div>
                    </div>
                    <div class="relative flex items-start p-2 bg-white/20 backdrop-blur-xl border border-gray-300 rounded-xl shadow-lg">
                        <div class="flex-shrink-0 w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">
                            4
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary tracking-wider">Booking Buku</h3>
                            <p class="mt-1 text-black">Setelah itu langsung klik tombol Booking buat cadangkan bukunya.</p>
                        </div>
                        <div class="absolute left-5 top-10 h-full border-l-2 border-secondary"></div>
                    </div>
                    <div class="relative flex items-start p-2 bg-white/20 backdrop-blur-xl border border-gray-300 rounded-xl shadow-lg">
                        <div class="flex-shrink-0 w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-white font-bold">
                            5
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-primary tracking-wider">Buku Siap diambil</h3>
                            <p class="mt-1 text-black">Staf perpustakaan bakal siapin buku kamu, tinggal dateng dan ambil deh!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="pb-16 px-4 md:px-20">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-primary text-center mb-8">Lainnya</h2>
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
        
        <!-- Blur Background Elements -->
        <div class="absolute w-[30rem] h-[40rem] md:w-[40rem] md:h-[40rem] bottom-32 right-[-10rem] bg-secondary/40 rounded-full blur-3xl -z-10"></div>
        <div class="absolute w-[20rem] h-[30em] md:w-[30rem] md:h-[30rem] bottom-0 right-[-12rem] bg-primary/40 rounded-full blur-3xl -z-10"></div>

        @include('layouts.footer')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
