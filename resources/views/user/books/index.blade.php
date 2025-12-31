<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">All Books</h2>

            <form action="{{ route('books.index') }}" method="GET" class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search books..."
                    class="w-64 px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                           bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                <button
                    type="submit"
                    class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white
                           dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                    Search
                </button>
            </form>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($books->isEmpty())
            <p class="text-center text-gray-600 dark:text-gray-300">No books found.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition
                               border border-gray-200 dark:border-gray-700 flex flex-col">
                        <div class="flex-1 p-5">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-1">
                                {{ $book->title }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">by {{ $book->author }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Stock: {{ $book->stock }}</p>
                            <p class="text-base font-bold text-blue-600 dark:text-blue-400 mb-4">
                                Rp{{ number_format($book->price, 0, ',', '.') }}
                            </p>

                            <form action="{{ route('cart.store') }}" method="POST" class="mt-auto">
                                @csrf
                                <input
                                    type="hidden"
                                    name="book_id"
                                    value="{{ $book->id }}"
                                >
                                <input
                                    type="number"
                                    name="quantity"
                                    min="1"
                                    value="1"
                                    class="w-full px-2 py-1 mb-3 border border-gray-300 dark:border-gray-600
                                           rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200
                                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                                <button
                                    type="submit"
                                    class="w-full py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                           text-white font-medium rounded-lg transition">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-app-layout>
