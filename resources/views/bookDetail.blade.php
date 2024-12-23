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
                <div class="flex items-center justify-between mb-12">
                    <a href="javascript:history.back()" class="flex items-center gap-2 w-fit text-gray-500 hover:text-gray-700 font-medium group transition duration-300">
                        <span class="relative text-2xl">
                            <span class="absolute inset-0 text-gray-300 group-hover:text-gray-500 transition duration-300">&larr;</span>
                            <span class="opacity-0 group-hover:opacity-100 transition duration-300">&larr;</span>
                        </span>
                        Kembali
                    </a>
                    {{-- <button class="bg-gradient-to-r from-blue-400 to-primary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400 shadow-md">Booking</button> --}}
                    {{-- <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_buku" value="{{ $book->id }}">
                        <button type="submit" class="bg-gradient-to-r from-blue-400 to-primary text-white py-2 px-5 rounded-md hover:bg-gradient-to-r hover:from-primary hover:to-blue-400 shadow-md">Booking</button>
                    </form> --}}
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                            {{ session('error') }}
                        </div>
                    @endif


                    @if(Auth::guard('member')->check())
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <input type="number" name="quantity" min="1" value="1" required class="border p-2 hidden">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Booking Buku
                        </button>
                    </form>
                    @else
                        <a href="{{ route('login.member') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Login untuk Booking
                        </a>
                    @endif
                </div>

                <!-- Blur Background Elements -->
                <div class="absolute w-[30rem] h-[20rem] md:w-[30rem] md:h-[30rem] top-[10rem] left-[-14rem] bg-primary/40 rounded-full blur-3xl -z-20 overflow-x-hidden"></div>
                <div class="absolute w-[20rem] h-[30rem] md:w-[30rem] md:h-[30rem] top-[0rem] right-0 bg-secondary/50 rounded-full blur-3xl -z-10 overflow-x-hidden"></div>

                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Book Image -->
                    <div class="flex-shrink-0 flex items-center justify-center mb-2 md:mb-0">
                        {{-- <div class="absolute w-[19rem] h-[19rem] bg-slate-400 blur-md rounded-full -z-50"></div> --}}
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="h-80 md:h-96" style="box-shadow: -10px 10px 30px rgba(0, 0, 0, 0.76);">
                    </div>
                    <!-- Book Details -->
                    <div class="flex-grow">
                        <div class="relative pb-6 border-b-2 border-gray-300">
                            <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $book->title }}</h1>
                            <p class="text-gray-700 leading-relaxed">{{ $book->description }}</p>
                            <!-- Blur Background Elements -->
                            <div class="absolute md:hidden w-[20rem] h-[10rem] right-[-4rem] bg-primary/30 rounded-full blur-3xl -z-10 overflow-x-hidden"></div>
                            <div class="absolute md:hidden w-[10rem] h-[10rem] right-[-4rem] bg-secondary/40 rounded-full blur-3xl -z-10 overflow-x-hidden"></div>
                        </div>
                        <div class="pt-6">
                            <table class="">
                                <tr class="">
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">Penulis</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">:</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">{{ $book->author }}</td>
                                </tr>
                                <tr class="">
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">Tahun</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">:</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">{{ $book->year }}</td>
                                </tr>
                                <tr class="">
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">Kategori</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">:</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">{{ $book->category }}</td>
                                </tr>
                                <tr class="">
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">Stok</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">:</td>
                                    <td class="text-sm font-semibold text-gray-600 px-2 py-1">{{ $book->stock }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
