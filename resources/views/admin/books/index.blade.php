<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Books Management</h2>

            <a href="{{ route('admin.books.create') }}"
               class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                + Add Book
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Cover</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Category</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Author</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Price</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Stock</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($books as $book)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                @if($book->cover_photo)
                                    <img src="{{ asset('storage/' . $book->cover_photo) }}"
                                         alt="{{ $book->title }}"
                                         class="w-14 h-20 object-cover rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                @else
                                    <div class="w-14 h-20 bg-gray-200 dark:bg-gray-700 rounded-md flex items-center justify-center text-xs text-gray-500">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $book->title }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $book->category->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $book->author ?? '-' }}</td>
                            <td class="px-6 py-4 font-semibold text-blue-600 dark:text-blue-400">
                                Rp {{ number_format($book->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $book->stock }}</td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('admin.books.edit', $book->id) }}"
                                   class="px-3 py-1 rounded-md bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm font-medium transition"
                                            onclick="return confirm('Delete this book?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-500 dark:text-gray-300">No books found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
