<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Detail Buku</title>
</head>
<body>
    <section class="py-8 px-4 md:px-20">
        <div class="container mx-auto">
            <div class="">
                <a href="javascript:history.back()" class="flex items-center gap-2 w-fit mb-12 text-gray-500 hover:text-gray-700 font-medium group transition duration-300">
                    <span class="relative text-2xl">
                        <span class="absolute inset-0 text-gray-300 group-hover:text-gray-500 transition duration-300">&larr;</span>
                        <span class="opacity-0 group-hover:opacity-100 transition duration-300">&larr;</span>
                    </span>
                    Kembali
                </a>

                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Book Image -->
                    <div class="flex-shrink-0 flex items-center justify-center relative">
                        {{-- <div class="absolute w-[19rem] h-[19rem] bg-slate-400 blur-md rounded-full -z-50"></div> --}}
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="h-80 md:h-96" style="box-shadow: -10px 10px 30px rgba(0, 0, 0, 0.76);">
                    </div>
                    <!-- Book Details -->
                    <div class="flex-grow">
                        <h1 class="text-4xl font-bold text-gray-800">{{ $book->title }}</h1>
                        <p class="text-sm text-gray-600 mb-4">By <span class="text-gray-700 font-semibold">{{ $book->author }}</span></p>
                        <p class="text-gray-700 leading-relaxed mb-6">{{ $book->description }}</p>
                        <p class="text-sm text-gray-500 mb-4">Category: <span class="text-gray-700 font-semibold">{{ $book->category }}</span></p>
                        <p class="text-sm text-gray-500 mb-4">Published: <span class="text-gray-700 font-semibold">{{ $book->year }}</span></p>
                        <p class="text-sm text-gray-500 mb-4">Stock: <span class="text-gray-700 font-semibold">{{ $book->stock }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
