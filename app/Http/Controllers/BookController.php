<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
        ]);
    
        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil dibuat');
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
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
        ]);
    
        // Temukan buku berdasarkan ID dan update datanya
        $book = Book::find($id);
        $book->update($request->all());
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbaharui');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')->with('deleted', 'Buku berhasil dihapus');
    }
    
}
