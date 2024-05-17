<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        $allAlbums = Album::all(); // Assuming you want to get a list of all albums for the move pictures functionality
    
        return view('albums.index', compact('albums', 'allAlbums'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            // Add other validation rules as needed
        ]);
        Album::create($request->all());
        return redirect()->route('albums.index')->with('success', 'Album created successfully.');
    }
    public function showImages(Album $album)
{
    $images = $album->pictures;
    return view('albums.show_images', compact('album', 'images'));
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $album->update($request->all());

        return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->back()->with('success', 'Album removed successfully.');

    }
}
