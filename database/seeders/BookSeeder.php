<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //uso recycle para asignar autores y categorías existentes
        Book::factory(30)
        ->recycle(Author::all())
        ->recycle(Category::all())
        ->create();
    }
}
