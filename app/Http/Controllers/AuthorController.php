<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        try{
        //   dd($request->all());
            Author::create([
                'name' => $request->name,
                'about' => $request->about,
            ]);
            return redirect()->route('authors.index')->with('success', 'Author created successfully');

        }catch(\Exception $e){
            return redirect()->route('authors.index')->with('error', 'Error creating author: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::findOrFail($id);
        return view('author.view', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $author = Author::findOrFail($id);
        return view('author.create', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, string $id)
    {
        try{
           
            $author = Author::findOrFail($id);
            $author->update([
                'name' => $request->name,
                'about' => $request->about,
            ]);
            return redirect()->route('authors.index')->with('success', 'Author updated successfully');
        }catch(\Exception $e){
            return redirect()->route('authors.index')->with('error', 'Error updating author: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $author = Author::findOrFail($id);
            $author->delete();
            return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('authors.index')->with('error', 'Error deleting author: ' . $e->getMessage());
        }
    }
}
