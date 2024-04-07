<?php

namespace App\Actions;

use App\Models\Book;

class BooksAction
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function createBook($data)
    {
        return Book::create($data);
    }

    public function getBook($id)
    {
        return Book::findOrFail($id);
    }

    public function updateBook($id, $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return $book;
    }
}
