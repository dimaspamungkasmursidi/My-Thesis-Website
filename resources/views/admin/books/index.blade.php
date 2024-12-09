<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
    <h1>Book Create</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="my-5">
    <a href="{{ route('books.create') }}" class="border bg-purple-600 px-4 py-2 rounded-md my-8">Add New Book</a>
    </div>

    <table class="table-auto border-2">
        <thead>
            <tr>
                <th class="border-2 border-black">Title</th>
                <th class="border-2 border-black">Author</th>
                <th class="border-2 border-black">Category</th>
                <th class="border-2 border-black">Year</th>
                <th class="border-2 border-black">Stock</th>
                <th class="border-2 border-black">Image</th>
                <th class="border-2 border-black">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($books as $book)

            <tr>
                <td class="border-2 border-black px-8 py-2">{{ $book->title }}</td>
                <td class="border-2 border-black px-8 py-2">{{ $book->author }}</td>
                <td class="border-2 border-black px-8 py-2">{{ $book->category }}</td>
                <td class="border-2 border-black px-8 py-2">{{ $book->year }}</td>
                <td class="border-2 border-black px-8 py-2">{{ $book->stock }}</td>
                <td class="border-2 border-black px-8 py-2">
                    @if($book->image)
                    <img src="{{ asset('storage/'. $book->image) }}" alt="Book Image" width="100">
                    @else
                    No Image
                    @endif
                </td>
                <td class="border-2 border-black px-8 py-2">

                    <a href="{{ route('books.edit', $book->id) }}" class="border bg-yellow-400 px-4 py-2 rounded-md my-8">Edit</a>
                    
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border bg-red-600 px-4 py-2 rounded-md my-8" onclick="return confirm('Are you sure want to delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>


</x-app-layout>