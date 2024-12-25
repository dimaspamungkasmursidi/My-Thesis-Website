<footer class="bg-gray-100/20 text-white py-12" style="box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container mx-auto px-4 md:px-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Footer Section 1: Logo & Description -->
            <div class="flex flex-col items-center md:items-start">
                <a href="{{ route('home') }}" class="flex flex-col items-center md:items-start mb-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-28 mr-2 md:mr-0">
                    <span class="text-2xl font-semibold text-center md:text-left text-black">Perpustakaan Desa <br> Babelan Kota</span>
                </a>
                <p class="text-gray-600 text-sm text-center md:text-left">
                    Sistem informasi perpustakaan yang memudahkan pencarian dan peminjaman buku secara online.
                </p>
            </div>

            <!-- Footer Section 2: Links -->
            <div class="flex flex-col items-center">
                <h4 class="text-lg font-semibold text-black mb-4">Navigasi</h4>
                <ul class="flex md:flex-col items-start text-gray-600 text-sm gap-6">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-300">Beranda</a></li>
                    <li><a href="{{ route('allBook') }}" class="hover:text-gray-300">Semua Buku</a></li>
                    <li><a href="{{ route('myBooking') }}" class="hover:text-gray-300">My Booking</a></li>
                </ul>
            </div>

            <!-- Footer Section 3: Maps -->
            <div class="flex flex-col items-center md:items-start justify-center">
                    <h4 class="text-lg font-semibold text-black mb-4">Lokasi Perpustakaan</h4>
                    <div class="w-full h-56 rounded-md shadow-md">
                        <iframe class="w-full h-full rounded-md shadow-md" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.749229115869!2d107.03619937355336!3d-6.164328760409877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6989e999dd2523%3A0x7d0f75ac711dede9!2sPerpustakaan%20Desa%20Babelan%20Kota!5e0!3m2!1sid!2sid!4v1735062014014!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-12 text-center text-gray-600 text-sm border-t pt-4">
            <p>&copy; {{ date('Y') }} Perpustakaan Desa Babelan Kota. All Rights Reserved.</p>
        </div>
    </div>
</footer>
