<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $books = Book::factory()->count(20)->create();
    $storeIds = Store::all()->pluck('id');

    $books->each(function ($book) use ($storeIds) {
        $book->stores()->attach(
            $storeIds->random(rand(1, 5))
        );
    });
}
}
