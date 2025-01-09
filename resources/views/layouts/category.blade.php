
                    
                    <section class="flex items-center justify-center mb-4 space-x-4">
                        @foreach ($categories as $category)
                            <a href="{{ route('bookCategory', ['category' => $category->id]) }}" 
                            class="text-sm text-gray-600 hover:text-white hover:bg-primary px-4 py-2 rounded-full transition duration-300 ease-in-out 
                            {{ request()->is('bookCategory/'.$category->id) ? 'bg-primary text-white' : 'bg-transparent' }}">
                            {{ $category->name }}
                            </a>
                        @endforeach
                    </section>