<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->with('book')->latest()->get();
        return view('user.transactions.index', compact('transactions'));
    }
    public function store()
    {
        $carts = Cart::where('user_id', operator: Auth::id())->with('book')->get();
        foreach ($carts as $cart) {
            if (!$cart->book)
                continue; // skip jika relasi rusak

            $total = $cart->quantity * $cart->book->price;
            Transaction::create([
                'user_id' => Auth::id(),
                'book_id' => $cart->book_id,
                'quantity' => $cart->quantity,
                'total_price' => $total,
                'status' => 'pending',
            ]);
            $cart->book->decrement('stock', $cart->quantity);
        }
        Cart::where('user_id', Auth::id())->delete();
        return back()->with('success', 'Transaction created successfully. Please wait for delivery.');
    }
    public function adminIndex()
    {
        $transactions = Transaction::with(['book', 'user'])->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate(['status' => 'required|in:pending,paid,delivered']);
        $transaction->update(['status' => $request->status]);
        return back()->with('success', 'Transaction status updated.');
    }
}
