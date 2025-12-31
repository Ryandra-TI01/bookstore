<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white text-center">My Transactions</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold">Book</th>
                        <th class="py-3 px-4 text-center font-semibold">Qty</th>
                        <th class="py-3 px-4 text-right font-semibold">Total</th>
                        <th class="py-3 px-4 text-center font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($transactions as $t)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                            <td class="py-3 px-4 text-gray-800 dark:text-gray-100">{{ $t->book->title }}</td>
                            <td class="py-3 px-4 text-center text-gray-700 dark:text-gray-300">{{ $t->quantity }}</td>
                            <td class="py-3 px-4 text-right text-gray-800 dark:text-gray-100">
                                Rp{{ number_format($t->total_price, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-3 py-1 text-sm rounded-full 
                                             {{ $t->status === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100' : '' }}
                                             {{ $t->status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : '' }}
                                             {{ $t->status === 'cancelled' ? 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100' : '' }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-600 dark:text-gray-300">
                                No transactions yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
