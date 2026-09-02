<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->latest()->get();

        return view('books.index', compact('books'));//busca resources/views/books/index.blade.php
    }

    //Mostramos el formulario para crear libros
    public function create(){
        $categories = Category::All();
        $authors = Author::All();

        return view('books.create', compact('categories', 'authors'));
    }

    public function store(Request $request){

       $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,author_id',//validamos que existan las ides en las tablas
            'category_id' => 'required|exists:categories,category_id',
            'price' => 'required|numeric|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Libro creado con éxito.');
    }

}
