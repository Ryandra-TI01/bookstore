<x-app-layout>

    <div class="max-w-2xl mx-auto px-4 py-10">
        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-4 p-3 rounded-md bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white text-center">Contact Admin</h3>

        <form action="/contact" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-1 font-medium">Name</label>
                <input type="text" name="name"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 
                           rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 
                           bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-1 font-medium">Email</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 
                           rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 
                           bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"
                    required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-200 mb-1 font-medium">Message</label>
                <textarea name="message" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 
                           rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 
                           bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100"
                    required></textarea>
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 
                       text-white font-semibold rounded-md transition-colors">
                Send Message
            </button>
        </form>
    </div>
</x-app-layout>
