<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Daftar Booking') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <section class="container mx-auto sm:px-8 pt-8">
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-4 py-2 rounded-md shadow-md">
            {{ session('success') }}
        </div>
    </section>
    @endif

    <!-- Notification Bell -->
    <section class="container mx-auto sm:p-8 sm:pt-12">
        @php
            $pendingCount = $bookings->where('status', 'pending')->count();
        @endphp
        @if ($pendingCount > 0)
        <div class="flex items-center bg-yellow-500 text-gray-800 p-3 rounded-lg shadow-md animate-pulse">
            <svg class="w-8 h-8 mr-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
            <path d="M 24 3 C 12.413858 3 3 12.413866 3 24 C 3 35.586134 12.413858 45 24 45 C 35.586142 45 45 35.586134 45 24 C 45 12.413866 35.586142 3 24 3 z M 24 5 C 34.505263 5 43 13.494744 43 24 C 43 34.505256 34.505263 43 24 43 C 13.494737 43 5 34.505256 5 24 C 5 13.494744 13.494737 5 24 5 z M 24 12.185547 C 23.159 12.185547 22.474609 12.863313 22.474609 13.695312 C 22.474609 14.535312 23.159 15.220703 24 15.220703 C 24.85 15.220703 25.541016 14.535312 25.541016 13.695312 C 25.541016 12.863312 24.85 12.185547 24 12.185547 z M 24 17.935547 C 23.305 17.935547 22.818359 18.454312 22.818359 19.195312 L 22.818359 33.757812 C 22.818359 34.498812 23.304 35.017578 24 35.017578 C 24.696 35.017578 25.181641 34.498813 25.181641 33.757812 L 25.181641 19.193359 C 25.181641 18.452359 24.695 17.935547 24 17.935547 z"></path>
            </svg>
            <span class="font-semibold">Ada {{ $pendingCount }} booking yang belum diproses!</span>
        </div>
        @endif
    </section>

    <section class="container mx-auto sm:px-8 sm:pb-8">
        <section class="bg-gray-800 p-4 sm:rounded-lg shadow-lg space-y-4">
            <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
                <table class="min-w-full bg-gray-900 border-collapse border border-gray-700">
                    <thead class="bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700">
                        <tr>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">No</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Judul Buku</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Member</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Jumlah</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Tanggal Booking</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Tanggal Pengembalian</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800">
                        @foreach ($bookings as $booking)
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                                <td class="px-6 py-4 text-gray-200">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->book->title }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->member->name }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->quantity }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->return_date ? \Carbon\Carbon::parse($booking->return_date)->translatedFormat('d F Y') : '-' }}</td>
                                <td class="px-6 py-4 space-y-2">
                                    @if($booking->status == 'pending')
                                        <div class="flex flex-col space-y-2">
                                            <form action="{{ route('admin.booking.approve', $booking->id) }}" method="POST" class="flex flex-col space-y-2">
                                                @csrf
                                                @method('PUT')
                                                <input type="date" name="borrow_date" class="bg-gray-700 text-gray-200 px-2 py-1 rounded-md border border-gray-600" required>
                                                <input type="date" name="return_date" class="bg-gray-700 text-gray-200 px-2 py-1 rounded-md border border-gray-600" required>
                                                <button type="submit"
                                                    class="w-full bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-500 transition duration-300">
                                                    Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        class="w-full bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500 transition duration-300">
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                    @php
                                        $statusClasses = match($booking->status) {
                                            'pending' => 'text-yellow-600',
                                            'approved' => 'text-green-600',
                                            default => 'text-red-600',
                                        };
                                    @endphp
                                    <div class="flex items-center space-x-2">
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-500 transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256" class="w-6 h-6">
                                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(2.56,2.56)"><path d="M46,13c-1.64497,0 -3,1.35503 -3,3v2h-10.73437c-1.7547,0 -3.38611,0.92281 -4.28906,2.42773l-1.54297,2.57227h-3.43359c-2.19733,0 -4,1.80267 -4,4c0,2.19733 1.80267,4 4,4h1.07422l3.57422,46.45898c0.23929,3.11679 2.85609,5.54102 5.98242,5.54102h32.73828c3.12633,0 5.74313,-2.42423 5.98242,-5.54102l3.57422,-46.45898h1.07422c2.19733,0 4,-1.80267 4,-4c0,-2.19733 -1.80267,-4 -4,-4h-3.43359l-1.54297,-2.57227c-0.90296,-1.50492 -2.53436,-2.42773 -4.28906,-2.42773h-10.73437v-2c0,-1.64497 -1.35503,-3 -3,-3zM46,15h8c0.56503,0 1,0.43497 1,1v2h-10v-2c0,-0.56503 0.43497,-1 1,-1zM32.26563,20h11.56641c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.57617c1.0553,0 2.02922,0.55195 2.57227,1.45703l1.52734,2.54297h-3.33398c-0.18032,-0.00255 -0.34804,0.09219 -0.43894,0.24794c-0.0909,0.15575 -0.0909,0.34838 0,0.50413c0.0909,0.15575 0.25863,0.25049 0.43894,0.24794h5h3.5c1.11667,0 2,0.88333 2,2c0,1.11667 -0.88333,2 -2,2h-54c-1.11667,0 -2,-0.88333 -2,-2c0,-1.11667 0.88333,-2 2,-2h4h34.5c0.18032,0.00255 0.34804,-0.09219 0.43894,-0.24794c0.0909,-0.15575 0.0909,-0.34838 0,-0.50413c-0.0909,-0.15575 -0.25863,-0.25049 -0.43894,-0.24794h-33.33398l1.52734,-2.54297c0.54305,-0.90508 1.51697,-1.45703 2.57227,-1.45703zM64.5,24c-0.18032,-0.00255 -0.34804,0.09219 -0.43894,0.24794c-0.0909,0.15575 -0.0909,0.34838 0,0.50413c0.0909,0.15575 0.25863,0.25049 0.43894,0.24794h2c0.18032,0.00255 0.34804,-0.09219 0.43894,-0.24794c0.0909,-0.15575 0.0909,-0.34838 0,-0.50413c-0.0909,-0.15575 -0.25863,-0.25049 -0.43894,-0.24794zM26.07813,31h47.84375l-3.56445,46.30664c-0.16071,2.09321 -1.88861,3.69336 -3.98828,3.69336h-32.73828c-2.09967,0 -3.82757,-1.60015 -3.98828,-3.69336zM38,35c-1.65109,0 -3,1.34891 -3,3v35c0,1.65109 1.34891,3 3,3c1.65109,0 3,-1.34891 3,-3v-35c0,-1.65109 -1.34891,-3 -3,-3zM50,35c-1.65109,0 -3,1.34891 -3,3v35c0,1.65109 1.34891,3 3,3c1.65109,0 3,-1.34891 3,-3v-3.5c0.00255,-0.18032 -0.09219,-0.34804 -0.24794,-0.43894c-0.15575,-0.0909 -0.34838,-0.0909 -0.50413,0c-0.15575,0.0909 -0.25049,0.25863 -0.24794,0.43894v3.5c0,1.11091 -0.88909,2 -2,2c-1.11091,0 -2,-0.88909 -2,-2v-35c0,-1.11091 0.88909,-2 2,-2c1.11091,0 2,0.88909 2,2v25.5c-0.00255,0.18032 0.09219,0.34804 0.24794,0.43894c0.15575,0.0909 0.34838,0.0909 0.50413,0c0.15575,-0.0909 0.25049,-0.25863 0.24794,-0.43894v-25.5c0,-1.65109 -1.34891,-3 -3,-3zM62,35c-1.65109,0 -3,1.34891 -3,3v1.5c-0.00255,0.18032 0.09219,0.34804 0.24794,0.43894c0.15575,0.0909 0.34838,0.0909 0.50413,0c0.15575,-0.0909 0.25049,-0.25863 0.24794,-0.43894v-1.5c0,-1.11091 0.88909,-2 2,-2c1.11091,0 2,0.88909 2,2v35c0,1.11091 -0.88909,2 -2,2c-1.11091,0 -2,-0.88909 -2,-2v-25.5c0.00255,-0.18032 -0.09219,-0.34804 -0.24794,-0.43894c-0.15575,-0.0909 -0.34838,-0.0909 -0.50413,0c-0.15575,0.0909 -0.25049,0.25863 -0.24794,0.43894v25.5c0,1.65109 1.34891,3 3,3c1.65109,0 3,-1.34891 3,-3v-35c0,-1.65109 -1.34891,-3 -3,-3zM38,36c1.11091,0 2,0.88909 2,2v35c0,1.11091 -0.88909,2 -2,2c-1.11091,0 -2,-0.88909 -2,-2v-35c0,-1.11091 0.88909,-2 2,-2zM59.49219,41.99219c-0.13261,0.00207 -0.25896,0.05673 -0.35127,0.15197c-0.0923,0.09523 -0.14299,0.22324 -0.14092,0.35584v2c-0.00255,0.18032 0.09219,0.34804 0.24794,0.43894c0.15575,0.0909 0.34838,0.0909 0.50413,0c0.15575,-0.0909 0.25049,-0.25863 0.24794,-0.43894v-2c0.00212,-0.13532 -0.0507,-0.26572 -0.1464,-0.36141c-0.0957,-0.0957 -0.22609,-0.14852 -0.36141,-0.1464z"></path></g></g>
                                                </svg>
                                            </button>
                                        </form>
                                        
                                        <span class="px-3 py-1 text-sm {{ $statusClasses }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</x-app-layout>
