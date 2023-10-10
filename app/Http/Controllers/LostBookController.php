<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostBook;

class LostBookController extends Controller
{
    public function index()
    {
        return LostBook::all();
    }

    public function store(Request $request)
    {
        $lostBook = new LostBook;
        $lostBook->book_id = $request->book_id;
        $lostBook->save();

        return response()->json([
            "message" => "Lost book record created"
        ], 201);
    }

    public function show(LostBook $lostBook)
    {
        if (!$lostBook) {
            return response()->json([
                'success' => false,
                'message' => 'book not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $lostBook
        ]);
    }

    public function update(Request $request, LostBook $lostBook)
    {
        if (!$lostBook) {
            return response()->json([
                'success' => false,
                'message' => 'book not found'
            ], 404);
        }

        $lostBook->book_id = $request->get('book_id');

        $lostBook->save();

        return response()->json([
            'success' => true,
            'data' => $lostBook
        ]);
    }

    public function destroy(LostBook $lostBook)
    {
        if (!$lostBook) {
            return response()->json([
                'success' => false,
                'message' => 'book not found'
            ], 404);
        }

        $lostBook->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
