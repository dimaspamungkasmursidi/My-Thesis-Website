<nav class="bg-transparent shadow-md px-4 md:px-20 py-2">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" loading="lazy" class="w-12">
            </a>
        </div>

        <!-- Center Section (Menu Links) -->
        <div class="hidden md:flex items-center gap-6">
            <a href="{{ route('home') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('home') ? 'text-primary font-black' : '' }}">
                Beranda
            </a>
            <a href="{{ route('allBook') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('allBook') ? 'text-primary font-black' : '' }}">
                Semua Buku
            </a>
            <a href="{{ route('myBooking') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('myBooking') ? 'text-primary font-black' : '' }}">
                My Booking
            </a>
            <a href="{{ route('rules') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('rules') ? 'text-primary font-black' : '' }}">
                Panduan Perpustakaan
            </a>
        </div>

        <!-- Right Section -->
        <div class="hidden md:flex items-center gap-4">
            @if(Auth::guard(name: 'member')->check())
                <!-- Dropdown for Logged-In Members -->
                <div class="relative">
                    <button id="dropdownButton" class="flex items-center space-x-2 bg-secondary/50 text-black py-2 px-4 rounded-lg hover:bg-primary/50 transition duration-300 ease-in-out">
                        <span id="username">{{ Auth::guard(name: 'member')->user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdownMenu" class="hidden absolute z-50 right-0 mt-2 bg-white shadow-lg rounded-lg w-40">
                        <a href="{{ route('member.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                        <form method="POST" action="{{ route('logout.member') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full bg-red-500 text-left px-4 py-2 text-gray-200 hover:bg-red-400 hover:text-gray-900 rounded-b-lg">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Login and Register Buttons -->
                <a href="{{ route('register.member') }}" class="bg-gradient-to-r from-blue-400 to-primary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400 shadow-md transition-all duration-300 ease-in-out">Daftar</a>
                <a href="{{ route('login.member') }}" class="bg-gradient-to-r from-purple-400 to-secondary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-secondary hover:to-purple-400 shadow-md transition-all duration-300 ease-in-out">Login</a>
            @endif
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobileMenuButton" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="hamburgerIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="closeIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobileMenu" class="hidden md:hidden flex-col gap-4 py-8 px-2 border-t border-t-primary mt-2">
        <div class="flex flex-col gap-4 mb-2">
            <a href="{{ route('home') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('home') ? 'text-primary font-black' : '' }}">
                Beranda
            </a>
            <a href="{{ route('allBook') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('allBook') ? 'text-primary font-black' : '' }}">
                Semua Buku
            </a>
            <a href="{{ route('myBooking') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('myBooking') ? 'text-primary font-black' : '' }}">
                My Booking
            </a>
            <a href="{{ route('rules') }}" 
            class="text-gray-700 font-medium hover:text-primary transition-all duration-300 ease-in-out {{ Request::routeIs('rules') ? 'text-primary font-black' : '' }}">
                Panduan Perpustakaan
            </a>
        </div>
        @if(Auth::guard('member')->check())
            <a href="{{ route('member.edit') }}" class="bg-gradient-to-r from-primary to-blue-400 text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400 shadow-md font-medium hover:text-gray-900">Profil</a>
            <form method="POST" action="{{ route('logout.member') }}" class="block">
                @csrf
                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-400 text-left py-2 px-5 rounded-md text-white font-medium hover:text-gray-900">Logout</button>
            </form>
        @else
        <div>
            <a href="{{ route('register.member') }}" class="bg-gradient-to-r from-blue-400 to-primary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400 shadow-md transition-all duration-300 ease-in-out">Daftar</a>
            <a href="{{ route('login.member') }}" class="bg-gradient-to-r from-purple-400 to-secondary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-secondary hover:to-purple-400 shadow-md transition-all duration-300 ease-in-out">Login</a>
        </div>
        @endif
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const hamburgerIcon = document.getElementById('hamburgerIcon');
        const closeIcon = document.getElementById('closeIcon');

        mobileMenuButton?.addEventListener('click', () => {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
            } else {
                mobileMenu.classList.remove('flex');
                mobileMenu.classList.add('hidden');
            }
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });

    const truncateText = (selector, maxLength) => {
        const element = document.querySelector(selector);

        if (element && element.textContent.length > maxLength) {
            element.textContent = element.textContent.slice(0, maxLength) + '...';
        }
    };

    document.addEventListener('DOMContentLoaded', () => {
        truncateText('#username', 20);
    });
</script>
