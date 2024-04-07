<?php

namespace App\Http\Controllers;

use App\Actions\BooksAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $booksAction;

    public function __construct(BooksAction $booksAction)
    {
        $this->booksAction = $booksAction;
    }

    public function index()
    {
        $books = $this->booksAction->getAllBooks();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = $this->booksAction->createBook($request->all());
        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }

    public function show($id)
    {
        $book = $this->booksAction->getBook($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        try {
            $book = $this->booksAction->updateBook($id, $request->all());
            return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->booksAction->deleteBook($id);
            return response()->json(['message' => 'Book deleted successfully']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }
}
