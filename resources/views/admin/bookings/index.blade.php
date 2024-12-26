<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Booking List') }}
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
            <span class="font-semibold">There are {{ $pendingCount }} bookings pending for approval!</span>
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
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Book Title</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Member</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">WhatsApp</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Booking Date</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Return Date</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800">
                        @foreach ($bookings as $booking)
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                                <td class="px-6 py-4 text-gray-200">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->book->title }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->member->name }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->member->whatsapp_number }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $booking->return_date ? \Carbon\Carbon::parse($booking->return_date)->translatedFormat('d F Y') : '-' }}</td>
                                <td class="px-6 py-4 space-y-2">
                                @if($booking->status == 'pending')
                                    <div class="flex flex-col space-y-2">
                                        <form action="{{ route('admin.booking.approve', $booking->id) }}" method="POST" class="flex flex-col space-y-2">
                                            @csrf
                                            @method('PUT')
                                            <input 
                                                type="date" 
                                                name="borrow_date" 
                                                class="bg-gray-700 text-gray-200 px-2 py-1 rounded-md border border-gray-600" 
                                                min="{{ date('Y-m-d') }}" 
                                                required>
                                            <input 
                                                type="date" 
                                                name="return_date" 
                                                class="bg-gray-700 text-gray-200 px-2 py-1 rounded-md border border-gray-600" 
                                                min="{{ date('Y-m-d') }}" 
                                                required>
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
                                        <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white p-1 rounded-md hover:bg-red-500 transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256" class="w-8 h-8">
                                                    <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(2.56,2.56)"><path d="M41.14648,13c-2.837,0 -5.14648,2.40052 -5.14648,5.35352v1.64648h-6.72852c-8.487,0 -12.27148,3.62867 -12.27148,11.76367v0.23633v5c0,0.265 0.10497,0.52003 0.29297,0.70703l4.70703,4.70703v2.60547c-2.2791,0.46484 -4,2.48407 -4,4.89844v4c0,2.41436 1.7209,4.43164 4,4.89648v16.49414c0,6.993 5.12963,11.69141 12.76563,11.69141h30.26953c7.755,0 12.96484,-4.69841 12.96484,-11.69141v-16.49414c2.2791,-0.46502 4,-2.483 4,-4.89648v-4c0,-2.41436 -1.7209,-4.4336 -4,-4.89844v-2.68359l4.70117,-4.62305c0.191,-0.188 0.29883,-0.44489 0.29883,-0.71289v-5v-0.23633c0,-8.135 -3.78544,-11.76367 -12.27344,-11.76367h-6.72656v-1.64648c0,-2.953 -2.30948,-5.35352 -5.14648,-5.35352zM41.14648,15h17.70703c1.735,0 3.14648,1.50352 3.14648,3.35352v1.64648h-24v-1.64648c0,-1.85 1.41148,-3.35352 3.14648,-3.35352zM29.27148,22h41.45703c7.023,0 10.04377,2.62 10.25977,9h-61.97461c0.02423,-0.7157 0.08903,-1.37732 0.18555,-2h53.30078c0.276,0 0.5,-0.224 0.5,-0.5c0,-0.276 -0.224,-0.5 -0.5,-0.5h-53.10547c1.01759,-4.20886 4.08236,-6 9.87695,-6zM75.5,28c-0.276,0 -0.5,0.224 -0.5,0.5c0,0.276 0.224,0.5 0.5,0.5h3c0.276,0 0.5,-0.224 0.5,-0.5c0,-0.276 -0.224,-0.5 -0.5,-0.5zM19,33h62v2h-62zM19,36h62v0.58008l-4.70117,4.62305c-0.191,0.188 -0.29883,0.44684 -0.29883,0.71484v4v12v17.39063c0,2.39055 -0.66899,4.25409 -1.73633,5.69141h-48.55859c-1.04802,-1.43733 -1.70508,-3.30081 -1.70508,-5.69141v-17.39062v-12v-3.91797c0,-0.265 -0.10497,-0.52003 -0.29297,-0.70703l-4.70703,-4.70703zM32,39.91797c-1.654,0 -3,1.346 -3,3v17.58203c0,0.276 0.224,0.5 0.5,0.5c0.276,0 0.5,-0.224 0.5,-0.5v-17.58203c0,-1.103 0.897,-2 2,-2c1.103,0 2,0.897 2,2v31c0,1.103 -0.897,2 -2,2c-1.103,0 -2,-0.897 -2,-2v-3.41797c0,-0.276 -0.224,-0.5 -0.5,-0.5c-0.276,0 -0.5,0.224 -0.5,0.5v3.41797c0,1.654 1.346,3 3,3c1.654,0 3,-1.346 3,-3v-31c0,-1.654 -1.346,-3 -3,-3zM44,40c-1.654,0 -3,1.346 -3,3v31c0,1.654 1.346,3 3,3c1.654,0 3,-1.346 3,-3v-31c0,-1.654 -1.346,-3 -3,-3zM56,40c-1.654,0 -3,1.346 -3,3v31c0,1.654 1.346,3 3,3c1.654,0 3,-1.346 3,-3v-31c0,-1.654 -1.346,-3 -3,-3zM68,40c-1.654,0 -3,1.346 -3,3v31c0,1.654 1.346,3 3,3c1.654,0 3,-1.346 3,-3v-31c0,-1.654 -1.346,-3 -3,-3zM44,41c1.103,0 2,0.897 2,2v31c0,1.103 -0.897,2 -2,2c-1.103,0 -2,-0.897 -2,-2v-31c0,-1.103 0.897,-2 2,-2zM56,41c1.103,0 2,0.897 2,2v31c0,1.103 -0.897,2 -2,2c-1.103,0 -2,-0.897 -2,-2v-31c0,-1.103 0.897,-2 2,-2zM68,41c1.103,0 2,0.897 2,2v31c0,1.103 -0.897,2 -2,2c-1.103,0 -2,-0.897 -2,-2v-31c0,-1.103 0.897,-2 2,-2zM22,47.08789v9.6582c-1.164,-0.413 -2,-1.52412 -2,-2.82812v-4c0,-1.304 0.836,-2.41708 2,-2.83008zM78,47.08789c1.164,0.412 2,1.52513 2,2.82813v4c0,1.304 -0.836,2.41513 -2,2.82813zM29.5,62c-0.276,0 -0.5,0.224 -0.5,0.5v3c0,0.276 0.224,0.5 0.5,0.5c0.276,0 0.5,-0.224 0.5,-0.5v-3c0,-0.276 -0.224,-0.5 -0.5,-0.5zM26.5625,82h46.82813c-2.18707,2.13018 -5.41103,3 -8.35547,3h-30.26953c-2.89083,0 -6.05571,-0.8699 -8.20312,-3z"></path></g></g>
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
