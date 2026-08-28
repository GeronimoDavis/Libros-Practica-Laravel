<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    //le decimo cual es la primaryKey de la tabla al modelo y asi con todos ya que personalizamos las ids y laravel espera solamente un "id"
    protected $primaryKey = 'author_id';  
    protected $fillable = ['name','nationality'];

    //Lo llamamos books en plural porque tiene muchos libros
    public function books(){
        return $this->hasMany(Book::class, 'author_id');
    }
}
