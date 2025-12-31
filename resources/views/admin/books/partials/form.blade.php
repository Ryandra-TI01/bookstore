<div class="space-y-5">
    {{-- Title --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}"
            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg 
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            required>
    </div>

    {{-- Author --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Author</label>
        <input type="text" name="author" value="{{ old('author', $book->author ?? '') }}"
            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg 
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            required>
    </div>

    {{-- Price & Stock --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $book->price ?? '') }}"
                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg 
                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $book->stock ?? '') }}"
                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg 
                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>
    </div>

    {{-- Category --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
        <select name="category_id"
            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg 
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            required>
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
