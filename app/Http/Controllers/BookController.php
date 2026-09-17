<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function ejerciciosORM(){
        //traer todos los libros con precio mayores a 50
        Book::where('price', '>', 50)->orderBy('title', 'asc')->get();

        //Visualizar los primeros 50 libros junto con el nombre del autor y lacategoría a la que pertenecen.
        Book::with(['author','category'])->take(50)->get();

        //Obtener todos los libros de aquellos autores cuyo nombre contenga la letra 'a'
        Book::whereHas('author', function($query){
            $query->where('name', 'like', '%a%');
        })->get();
        // o podemos usar whereRelation mas corto pero menos felxible:
        Book::whereRelation('author', 'name', 'like', '%a%')->get();

        //Calcular el promedio de precio de los libros.
        Book::avg('price');

        //Contar la cantidad de libros en cada categoría.
        Book::selectRaw('category_id, count(*) as total')
        ->groupBy('category_id')
        ->get();

       //Obtener el promedio del precio de los libros cuyo ID no se encuentre entre 10 y 50.
       Book::whereNotBetween('book_id', [10, 50])->avg('price');

    }

    public function ejerciciosFacadesDB(){
        //Obtener la cantidad de ventas de un libro en particular.
        DB::table('sales')->where('book_id', 1)->count();

        //Generar un resumen que muestre, agrupados por autor, la cantidad de libros y el precio total de sus libros.
        DB::table('books')
        ->join('authors', 'authors.author_id', '=', 'books.author_id')
        ->selectRaw('authors.name, count(books.book_id) as total_libros, sum(books.price) as precio_total')
        ->groupBy('authors.author_id', 'authors.name')
        ->get();
        
    }

    public function index()
    {
        //Para incluir relaciones en una consulta usamos with()
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
