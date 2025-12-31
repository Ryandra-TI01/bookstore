<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Edit Category</h2>
    
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
    
            {{-- Category Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter category name" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none 
                           focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
