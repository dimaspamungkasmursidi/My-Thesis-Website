<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>My Library</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <header class="bg-gray-800 text-gray-200 py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="#" class="text-2xl font-bold">My Library</a>
            <nav class="space-x-4">
                <a href="#features" class="hover:text-gray-400">Features</a>
                <a href="#books" class="hover:text-gray-400">Books</a>
                <a href="#books" class="hover:text-gray-400">Categories</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gray-900 text-gray-200 py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to My Library</h1>
            <p class="text-lg mb-6">Discover, read, and borrow your favorite books with ease.</p>
            <a href="#books"
               class="bg-gray-700 text-gray-200 py-2 px-4 rounded-lg hover:bg-gray-600">Explore Books</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-12 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
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
    <section id="books" class="py-12 bg-gray-200">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-6 text-center">Featured Books</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Book 1 -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="https://via.placeholder.com/150" alt="Book Image" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-bold">Book Title 1</h3>
                    <p class="text-sm text-gray-600">Author Name</p>
                </div>
                <!-- Book 2 -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="https://via.placeholder.com/150" alt="Book Image" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-bold">Book Title 2</h3>
                    <p class="text-sm text-gray-600">Author Name</p>
                </div>
                <!-- Book 3 -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="https://via.placeholder.com/150" alt="Book Image" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-bold">Book Title 3</h3>
                    <p class="text-sm text-gray-600">Author Name</p>
                </div>
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
