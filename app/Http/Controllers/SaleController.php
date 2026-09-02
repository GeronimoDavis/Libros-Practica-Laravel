<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Book;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Book $book){
        
        // Usamos la relación sales() que definimos en el modelo Book y gracias a Route Model Binding (vinculación automática de modelo a ruta) 
        //vincula la {book} de la ruta con el $book de los parametros e inyecta la insrancia del objeto book con tal id en los parametros de index
        $sales = $book->sales()->latest()->get();

        // Pasamos el libro a la vista para saber de qué libro son las ventas
        return view('sales.index', compact('sales', 'book'));
    } 
}
