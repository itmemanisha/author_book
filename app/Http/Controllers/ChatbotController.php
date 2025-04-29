<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function handle(Request $request)
{
    $message = strtolower($request->input('message'));

    if (str_contains($message, 'how many authors')) {
        $count = Author::count();
        return response()->json(['response' => "There are $count authors."]);
    }

    if (str_contains($message, 'how many books')) {
        $count = Book::count();
        return response()->json(['response' => "There are $count books available."]);
    }

    if (str_contains($message, 'top 5 authors')) {
        $authors = Author::withCount('books')->orderBy('books_count', 'desc')->take(5)->get()->pluck('name');
        return response()->json(['response' => "Top 5 authors: " . $authors->implode(', ')]);
    }

    return response()->json(['response' => "Sorry, I didn't understand that."]);
}
}
