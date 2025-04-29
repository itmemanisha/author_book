<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('publish.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publish.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublishRequest $request)
    {
        try {
            Publisher::create([
                'name' => $request->name,
                'about' => $request->about,
            ]);
            // return "Hello";
            return redirect()->route('publishers.index')->with('success', 'Publisher created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('publishers.index')->with('error', 'Error creating publisher: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publish = Publisher::findOrFail($id);
        return view('publish.view', compact('publish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('publish.create', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublishRequest $request, string $id)
    {
        // dd($request->all());
        try {
            $publisher = Publisher::findOrFail($id);
            $publisher->update(
                [
                    'name' => $request->name,
                    'about' => $request->about,
                ]
            );
            // dd($publisher);
            return redirect()->route('publishers.index')->with('success', 'Publisher updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('publishers.index')->with('error', 'Error updating publisher: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $publisher = Publisher::findOrFail($id);
            $publisher->delete();
            return redirect()->route('publishers.index')->with('success', 'Publisher deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('publishers.index')->with('error', 'Error deleting publisher: ' . $e->getMessage());
        }
    }
}
