<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Message Details</h2>

            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Name</p>
                    <p class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $contact->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                    <p class="text-lg font-medium text-gray-800 dark:text-gray-100">{{ $contact->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Message</p>
                    <p class="text-base text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-gray-900 p-4 rounded-md mt-1">
                        {{ $contact->message }}
                    </p>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('admin.contacts.index') }}"
                       class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white transition">
                        Back
                    </a>
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Delete this message?')"
                                class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
