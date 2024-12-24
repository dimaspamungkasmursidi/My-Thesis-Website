<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>All Books</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<style>
    body {
        overflow-x: hidden;
    }
</style>
<body class="relative bg-tertiary font-sans overflow-x-hidden">
    <!-- Header -->
    @include('layouts.navbar')

    <!-- Popular Books Section -->
    <section class="py-16 px-4 md:px-20">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Booking</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->book->title }}</td>
                        <td>{{ $booking->quantity }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>{{ $booking->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 My Library. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
