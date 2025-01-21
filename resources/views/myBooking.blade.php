<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Booking</title>
    <link rel="icon" href="{{ asset(path: 'images/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-tertiary">
    <section class="relative overflow-x-hidden overflow-y-hidden">
    <!-- Header -->
    @include('layouts.navbar')

    <section class="py-16 px-4 md:px-20">

        <section class="flex items-center justify-center overflow-x-hidden">
            <!-- Blur Background Elements -->
            <div class="absolute w-[40rem] h-[40rem] top-0 left-[0rem] bg-primary/50 rounded-full blur-3xl -z-10"></div>
            <div class="absolute w-[40rem] h-[40rem] bottom-10 right-[0rem] bg-secondary/50 rounded-full blur-3xl -z-10"></div>
            <div class="absolute w-[30rem] h-[30rem] inset-0 bg-green-300/50 rounded-full blur-3xl -z-10 m-auto"></div>


            <section class="relative overflow-x-hidden">
                <section class="">
                    <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Riwayat Peminjaman Buku</h1>

                    <div class="overflow-x-auto bg-white/20 border border-gray-200 shadow-xl rounded-lg">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead class="text-black">
                                <tr>
                                    <th class="text-left px-6 py-3 font-semibold border-b">No</th>
                                    <th class="text-left px-6 py-3 font-semibold border-b">Judul Buku</th>
                                    <th class="text-left px-6 py-3 font-semibold border-b">Status</th>
                                    <th class="text-left px-6 py-3 font-semibold border-b">Tanggal Pinjam</th>
                                    <th class="text-left px-6 py-3 font-semibold border-b">Tanggal Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white/20">
                                @foreach ($bookings as $booking)
                                    @php
                                        $statusClasses = match($booking->status) {
                                            'pending' => 'bg-yellow-100 text-yellow-600',
                                            'approved' => 'bg-green-100 text-green-600',
                                            default => 'bg-red-100 text-red-600',
                                        };
                                    @endphp
                                    <tr class="hover:bg-gray-100 transition duration-200">
                                        <td class="px-6 py-4 border-b text-gray-800">{{ $loop->iteration + ($bookings->currentPage() - 1) * $bookings->perPage() }}</td>
                                        <td class="px-6 py-4 border-b text-gray-800">{{ $booking->book->title }}</td>
                                        <td class="px-6 py-4 border-b">
                                            <span class="px-3 py-1 text-sm font-medium rounded-md {{ $statusClasses }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 border-b text-gray-800">
                                            {{ $booking->borrow_date ? \Carbon\Carbon::parse($booking->borrow_date)->translatedFormat('d F Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 border-b text-gray-800">
                                            {{ $booking->return_date ? \Carbon\Carbon::parse($booking->return_date)->translatedFormat('d F Y') : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-6">
                        {{ $bookings->links('pagination::tailwind') }}
                    </div>

                </section>
            </section>
        </section>
    </section>
    @include('layouts.footer')
    </section>


    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
