<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $primaryKey = 'book_id';
    protected $fillable = ['title', 'author_id', 'category_id', 'price'];

    //singular ya un libro pertenece a un autor
    public function author(){
        return $this->belongsTo(Author::class, 'author_id');
    }

    // Un libro pertenece a una categoría
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Un libro tiene muchas ventas
    public function sales()
    {
        return $this->hasMany(Sale::class, 'book_id');
    }
}
