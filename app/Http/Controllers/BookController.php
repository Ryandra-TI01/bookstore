<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%");
        }
        $books = $query->get();
        return view('user.books.index', compact('books'));
    }
    public function adminIndex()
    {
        $books = Book::with('category')->get();
        return view('admin.books.index', compact('books'));
    }
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.books.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        Book::create($validated);
        return redirect()->route('admin.books.adminIndex')->with('success', 'Book added successfully.');
    }
    public function edit(Book $book)
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.books.edit', compact('book', 'categories'));
    }
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        $book->update($validated);
        return redirect()->route('admin.books.adminIndex')->with('success', 'Book updated successfully.');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.adminIndex')->with('success', 'Book deleted successfully.');
    }

}
