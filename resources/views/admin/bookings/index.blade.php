<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Daftar Booking') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Member</th>
                                <th class="px-4 py-2">Buku</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $booking->member->name }}</td>
                                    <td class="border px-4 py-2">{{ $booking->buku->title }}</td>
                                    <td class="border px-4 py-2">{{ ucfirst($booking->status) }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('admin.bookings.update', $booking->id_booking) }}" method="POST">
                                            @csrf
                                            <select name="status" class="rounded">
                                                <option value="approved">Approved</option>
                                                <option value="rejected">Rejected</option>
                                            </select>
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Member</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal Booking</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->book->title }}</td>
                    <td>{{ $booking->member->name }}</td>
                    <td>{{ $booking->quantity }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>{{ $booking->created_at->format('d M Y') }}</td>
                    <td>
                        @if($booking->status == 'pending')
                        <form action="{{ route('admin.booking.approve', $booking->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('PUT')
                            <input type="date" name="borrow_date" required>
                            <input type="date" name="return_date" required>
                            <button type="submit" class="bg-pink-600">Approve</button>
                        </form>
                        <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-red-600">Reject</button>
                        </form>
                        
                        @else
                        <span class="text-gray-500">Booking di proses</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
