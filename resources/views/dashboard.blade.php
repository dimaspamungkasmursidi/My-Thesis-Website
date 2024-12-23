<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Informasi Statistik -->
            <div class="flex flex-wrap items-center justify-center gap-6">
                <div class="w-full flex gap-6">
                    <!-- Total Admin -->
                    <div class="bg-gray-800 overflow-hidden shadow-md rounded-lg p-6 w-full">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl font-bold text-primary">{{ $totalAdmin }}</div>
                            <div class="mt-2 text-gray-200">Total Admin</div>
                        </div>
                    </div>

                    <!-- Total Members -->
                    <div class="bg-gray-800 overflow-hidden shadow-md rounded-lg p-6 w-full">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl font-bold text-primary">{{ $totalMembers }}</div>
                            <div class="mt-2 text-gray-200">Total Members</div>
                        </div>
                    </div>
                </div>


                <!-- Total Books -->
                <div class="bg-gray-800 overflow-hidden shadow-md rounded-lg p-6 w-full">
                    <div class="flex flex-col items-center">
                        <div class="text-4xl font-bold text-primary">{{ $totalBooks }}</div>
                        <div class="mt-2 text-gray-200">Total Books</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
