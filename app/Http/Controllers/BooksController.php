<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;

use App\Models\Books;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();

        return response()->json([
            'success' => true,
            'data' => $books
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Books([
            'title' => $request->get('title'),
            'author' => $request->get('author'),

        ]);

        $book->save();

        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], 404);
        }

        $book->title = $request->get('title');
        $book->author = $request->get('author');

        $book->update();

        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
