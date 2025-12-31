<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Users Management</h2>

        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Role</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300">
                                    {{ ucfirst($user->role ?? 'User') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500 dark:text-gray-300">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
