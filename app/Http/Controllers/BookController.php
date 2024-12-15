<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        
        return view('dashboard.book.index', [
            'title' => 'Daftar Buku',
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.book.create', [
            'title' => 'Tambah Buku'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover' => 'required|url',
            'code' => 'required|string|max:50|unique:books,code', 
        ]);

        Book::create($validatedData);

        return to_route('dashboard.book.index')->with('success', 'Book has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        return view('dashboard.book.edit', [
            'title' => 'Edit Buku',
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover' => 'required|url', 
            'code' => 'required|string|max:50|unique:books,code,' . $id, 
        ]);
    
        $book = Book::findOrFail($id);
    
        $book->update($validatedData);
  
        return to_route('dashboard.book.index')->with('success', 'Book has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();

        return to_route('dashboard.book.index')->with('success', 'Book has been deleted successfully!');
    }
}
