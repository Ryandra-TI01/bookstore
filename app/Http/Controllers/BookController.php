<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Storage;

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
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('cover_photo')) {
            $validated['cover_photo'] = $request->file('cover_photo')->store('covers', 'public');

        }

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
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('cover_photo')) {
            // hapus file lama jika ada
            if ($book->cover_photo && Storage::disk('public')->exists($book->cover_photo)) {
                Storage::disk('public')->delete($book->cover_photo);
            }
            $validated['cover_photo'] = $request->file('cover_photo')->store('covers', 'public');
        }
        $book->update($validated);
        return redirect()->route('admin.books.adminIndex')->with('success', 'Book updated successfully.');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.adminIndex')->with('success', 'Book deleted successfully.');
    }

}
