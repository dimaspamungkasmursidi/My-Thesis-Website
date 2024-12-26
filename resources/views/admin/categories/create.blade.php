<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <section class="container mx-auto sm:p-8">
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-4 py-2 rounded-md shadow-md">
            {{ session('success') }}
        </div>
    </section>
    @endif

    <section class="container mx-auto sm:p-8 sm:pt-12">
        <form action="{{ route('categories.store') }}" method="POST" class="bg-gray-800 p-8 sm:rounded-lg shadow-lg space-y-4">
            @csrf
            <!-- Title Section -->
            <div>
                <legend class="text-xl font-semibold text-gray-200 mb-1">Add New Category</legend>
                <p class="text-sm text-gray-400">Add a new category to the library</p>
            </div>

            <!-- Category Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-200">Category Name</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-400 hover:duration-300 hover:ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Add Category
                </button>
            </div>
        </form>
    </section>
</x-app-layout>
