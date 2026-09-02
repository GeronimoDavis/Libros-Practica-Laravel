<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

//rutas de books
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create'); 
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

//rutas de sales
Route::get('/sales/{book}', [SaleController::class, 'index'])->name('sales.index');//en /sales/{book} -> va el id del libro
Route::get('/sales', [SaleController::class, 'create'])->name('sales.create'); 
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

 