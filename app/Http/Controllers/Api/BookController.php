<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Books::where('status', 1)->paginate(8);

        return response()->json([
            'books' => $books
        ]);
    }
}
