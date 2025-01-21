<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="icon" href="{{ asset(path: 'images/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="bg-tertiary">
    <section class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">My Bookings</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </section>
</body>
</html>
