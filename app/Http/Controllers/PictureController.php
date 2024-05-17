<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use App\Models\Album;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => 'required|exists:albums,id'
        ]);
    
        $imagePath = $request->file('image')->store('uploads', 'public');
    
        Picture::create([
            'title' => $request->title,
            'url' => $imagePath,
            'album_id' => $request->album_id
        ]);
        return redirect()->back()->with('success', 'image created successfully.');
    }
    public function movepictures(Album $album,Request $request){
        $newAlbumId = $request->input('new_album_id');
        // Move each picture to the new album
        foreach ($album->pictures as $picture) {
            $picture->update(['album_id'=>$newAlbumId]);
        }
        return redirect()->back()->with('success', 'Pictures moved successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
