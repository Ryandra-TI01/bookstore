<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('book')->where('user_id', Auth::id())->get();
        return view('user.cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'book_id' => $request->book_id],
            ['quantity' => $request->quantity]
        );

        return back()->with('success', 'Book added to cart.');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Item removed from cart.');
    }
}
