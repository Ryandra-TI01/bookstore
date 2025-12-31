<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">
            Edit Book
        </h2>

        @if (session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-200">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data"
            class="mt-3">
            @csrf
            @method('PUT')
            @include('admin.books.partials.form', ['book' => $book])
            <div class="text-center mt-3">
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                    Update Book
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
