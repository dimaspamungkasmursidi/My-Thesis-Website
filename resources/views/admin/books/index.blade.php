<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Books') }}
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
        <section class="bg-gray-800 p-8 sm:rounded-lg shadow-lg space-y-4">
            <div class="flex justify-start">
                <a href="{{ route('books.creates') }}"
                class="inline-block bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:from-indigo-600 hover:to-purple-500 transition duration-300">
                    Add New Book
                </a>
            </div>

            <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
                <table class="min-w-full bg-gray-900 border-collapse border border-gray-700">
                    <thead class="bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700">
                        <tr>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Title</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Author</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Category</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Year</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Stock</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Image</th>
                            <th class="text-left px-6 py-3 text-gray-100 text-sm font-semibold border-b border-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800">
                        @foreach ($books as $book)
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                                <td class="px-6 py-4 text-gray-200">{{ $book->title }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $book->author }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $book->category }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $book->year }}</td>
                                <td class="px-6 py-4 text-gray-200">{{ $book->stock }}</td>
                                <td class="px-6 py-4">
                                    @if($book->image)
                                        <img src="{{ asset('storage/'. $book->image) }}" alt="Book Image" class="lg:w-20 lg:h-20 rounded-md border-2 border-gray-600">
                                    @else
                                        <span class="text-gray-400">No Image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('books.edit', $book->id) }}"
                                    class="bg-yellow-500 text-black px-4 py-2 rounded-md hover:bg-yellow-400 transition duration-300">
                                        Edit
                                    </a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500 transition duration-300">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</x-app-layout>
