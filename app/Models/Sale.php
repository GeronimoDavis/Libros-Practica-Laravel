<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;

    protected $primaryKey = 'sale_id';
    protected $fillable = ['book_id', 'sale_date', 'quantity'];

    // Una venta pertenece a un libro
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
