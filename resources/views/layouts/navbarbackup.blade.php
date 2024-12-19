<nav class="bg-transparent shadow-md px-4 md:px-20 py-2">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo Section -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12">
            </a>
        </div>

        <!-- Hamburger Button -->
        <button
            id="hamburgerButton"
            class="block md:hidden text-gray-700 focus:outline-none">
            <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
            <svg id="closeIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Navigation Links -->
        <div id="navMenu" class="hidden md:flex flex-col md:flex-row items-center gap-6 md:gap-10 w-full md:w-auto md:static absolute top-16 left-0 bg-white md:bg-transparent shadow-lg md:shadow-none z-50 md:z-auto px-6 md:px-0 py-4 md:py-0">
            <a href="{{ route('home') }}" class="text-gray-700 font-medium hover:text-gray-900">Home</a>
            <a href="{{ route('books.show', 1) }}" class="text-gray-700 font-medium hover:text-gray-900">Books</a>

            @if(Auth::guard('member')->check())
                <div class="relative">
                    <button
                        id="dropdownButton"
                        class="flex items-center space-x-2 bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
                        <span>{{ Auth::guard('member')->user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdownMenu" class="hidden absolute z-50 mt-2 bg-white shadow-lg rounded-lg w-40">
                        <a href="{{ route('member.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout.member') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('register.member') }}" class="bg-blue-500 text-white py-2 px-5 rounded-md hover:bg-blue-600">Daftar</a>
                <a href="{{ route('login.member') }}" class="bg-purple-500 text-white py-2 px-5 rounded-md hover:bg-purple-600">Login</a>
            @endif
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hamburgerButton = document.getElementById('hamburgerButton');
        const hamburgerIcon = document.getElementById('hamburgerIcon');
        const closeIcon = document.getElementById('closeIcon');
        const navMenu = document.getElementById('navMenu');

        // Toggle menu and icons
        hamburgerButton.addEventListener('click', () => {
            const isMenuHidden = navMenu.classList.contains('hidden');
            navMenu.classList.toggle('hidden');
            hamburgerIcon.classList.toggle('hidden', isMenuHidden);
            closeIcon.classList.toggle('hidden', !isMenuHidden);
        });

        // Close menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!hamburgerButton.contains(event.target) && !navMenu.contains(event.target)) {
                navMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });

        // Dropdown menu functionality
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton?.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!dropdownButton?.contains(event.target) && !dropdownMenu?.contains(event.target)) {
                dropdownMenu?.classList.add('hidden');
            }
        });
    });
</script>
