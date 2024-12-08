<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <section class="container mx-auto sm:p-8 sm:pt-12">
        <form class="bg-gray-800 p-8 sm:rounded-lg shadow-lg space-y-4">
            <!-- Title Section -->
            <div>
                <legend class="text-xl font-semibold text-gray-200 mb-1">Add New Book</legend>
                <p class="text-sm text-gray-400">Add a new book to the library</p>
            </div>
            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Book Image</label>
                <input type="file" id="image" name="image" required
                    class="mt-1 block w-full text-sm text-gray-800 dark:text-gray-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:text-gray-200 file:border-gray-500 file:text-sm file:bg-gray-700 file:hover:bg-gray-600 file:duration-300 file:ease-in-out">
            </div>
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter book title" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-800 dark:text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Enter book description"
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-800 dark:text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>
            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Category</label>
                <input type="text" id="category" name="category" placeholder="Enter book category" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-800 dark:text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Author -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Author</label>
                <input type="text" id="author" name="author" placeholder="Enter author name"
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-800 dark:text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Year -->
            <div>
                <label for="year" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Year</label>
                <input type="number" id="year" name="year" placeholder="e.g., 2024" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-800 dark:text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Stock -->
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Stock</label>
                <input type="number" id="stock" name="stock" placeholder="Enter stock quantity" required
                    class="mt-1 block w-full rounded-md bg-gray-900 border-gray-500 text-gray-800 dark:text-gray-200 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-400 hover:duration-300 hover:ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Add Book
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
        preview.className = "w-32 h-32 mt-4 rounded-md object-cover";
        preview.style.border = "2px solid #000";
        this.parentNode.appendChild(preview);
    });
    </script>
</x-app-layout>
