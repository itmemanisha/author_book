<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $books = Book::with('author','publish')->get();
        // dd($books);
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $publishs = Publisher::all();
        return view('book.create', compact('publishs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        try{
            Book::create([
                'title' => $request->title,
                'code' => $request->code,
                'publisher_id' => $request->publisher_id,
                'published_year' => $request->published_year,
                'edition' => $request->edition,
                'language' => $request->language,
                'copies' => $request->copies,
                'pages' => $request->pages,
                'description' => $request->description,
            ]);
            return redirect()->route('books.index')->with('success', 'Book created successfully');

        }catch(\Exception $e){
            return redirect()->route('books.index')->with('error', 'Error creating book: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $book = Book::findOrFail($id);
        $publishs = Publisher::all();
        return view('book.create', compact('book', 'publishs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(bookRequest $request, string $id)
    {
        try{
           
            $book = Book::findOrFail($id);
            $book->update([
               'title' => $request->title,
                'code' => $request->code,
                'publisher_id' => $request->publisher_id,
                'published_year' => $request->published_year,
                'edition' => $request->edition,
                'language' => $request->language,
                'copies' => $request->copies,
                'pages' => $request->pages,
                'description' => $request->description,
            ]);
            return redirect()->route('books.index')->with('success', 'Book updated successfully');
        }catch(\Exception $e){
            return redirect()->route('books.index')->with('error', 'Error updating book: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $book = Book::findOrFail($id);
            $book->delete();
            return redirect()->route('books.index')->with('success', 'book deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('books.index')->with('error', 'Error deleting book: ' . $e->getMessage());
        }
    }
}
