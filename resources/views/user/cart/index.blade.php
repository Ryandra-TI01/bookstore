<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white text-center">My Cart</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold">Book</th>
                        <th class="py-3 px-4 text-center font-semibold">Qty</th>
                        <th class="py-3 px-4 text-right font-semibold">Price</th>
                        <th class="py-3 px-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($carts as $cart)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                            <td class="py-3 px-4 text-gray-800 dark:text-gray-100">{{ $cart->book->title }}</td>
                            <td class="py-3 px-4 text-center text-gray-700 dark:text-gray-300">{{ $cart->quantity }}</td>
                            <td class="py-3 px-4 text-right text-gray-800 dark:text-gray-100">
                                Rp{{ number_format($cart->book->price * $cart->quantity, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm transition">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-600 dark:text-gray-300">
                                No items in cart.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($carts->count())
            <form action="{{ route('transactions.store') }}" method="POST" class="mt-6 text-center">
                @csrf
                <button 
                    type="submit" 
                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md transition">
                    Checkout
                </button>
            </form>
        @endif
    </div>
</x-app-layout>
