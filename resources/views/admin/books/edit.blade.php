<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-700/30 border-l-4 border-red-600 text-red-100 p-4 mb-6 rounded-md" role="alert">
            <h2 class="font-bold text-lg mb-2">Terjadi Kesalahan</h2>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-700/30 border-l-4 border-green-500 text-green-300 p-4 mb-6 rounded-md" role="alert">
            <h2 class="font-bold text-lg">Sukses!</h2>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <section class="container mx-auto sm:p-8 sm:pt-12">
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-8 sm:rounded-lg shadow-lg space-y-4">
            @csrf
            @method('PUT')
            <!-- Title Section -->
            <div>
                <legend class="text-xl font-semibold text-gray-200 mb-1">Edit Book</legend>
                <p class="text-sm text-gray-400">Update book details in the library</p>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-200">Book Image</label>
                <input type="file" id="image" name="image"
                    class="mt-1 block w-full text-sm text-gray-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:text-gray-200 file:border-gray-500 file:text-sm file:bg-gray-700 file:hover:bg-gray-600 file:duration-300 file:ease-in-out">
                    @if ($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image Preview"
                        class="w-32 h-32 mt-4 rounded-md object-cover border-2 border-indigo-500">
                    @endif
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-200">Title</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-200">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $book->description }}</textarea>
            </div>
            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-200">Category</label>
                <select id="category_id" name="category_id" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Author -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-200">Author</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Year -->
            <div>
                <label for="year" class="block text-sm font-medium text-gray-200">Year</label>
                <input type="number" id="year" name="year" value="{{ $book->year }}" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Stock -->
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-200">Stock</label>
                <input type="number" id="stock" name="stock" value="{{ $book->stock }}" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-400 hover:duration-300 hover:ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Update Book
                </button>
            </div>
        </form>
    </section>

    <script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const errorText = this.parentNode.querySelector('.error-text');

        // Reset error text
        if (errorText) {
            errorText.remove();
        }

        // Validasi tipe file
        if (!file.type.startsWith('image/')) {
            const error = document.createElement('p');
            error.textContent = 'Please upload a valid image file.';
            error.className = 'error-text text-sm text-red-500 mt-1';
            this.parentNode.appendChild(error);
            this.value = ''; // Reset input jika invalid
            return;
        }

        // Hapus preview lama jika ada
        const existingPreview = this.parentNode.querySelector('img');
        if (existingPreview) {
            existingPreview.remove();
        }

        const preview = document.createElement('img');
        preview.src = URL.createObjectURL(file);
        preview.alt = "Preview";
        preview.className = "w-32 h-32 mt-4 rounded-md object-cover border-2 border-indigo-500";
        this.parentNode.appendChild(preview);
    });
    </script>
</x-app-layout>
