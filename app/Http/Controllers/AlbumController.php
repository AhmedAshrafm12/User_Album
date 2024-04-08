<?php

namespace App\Http\Controllers;

use App\Models\album;
use Illuminate\Http\Request;

use App\Models\picture;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums =  auth()->user()->albums;

        return view('home', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorealbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'cover' => 'required|image'
        ]);
        $album =  auth()->user()->albums()->create([
            'name' => $request->name,
        ]);
        $album->addMedia($request->cover)->toMediaCollection('images');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($album_id)
    {
        $Album  = album::find($album_id);
        return view('albums.show', compact('Album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(album $Album)
    { 
        return view('albums.edit', ['album' => $Album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatealbumRequest  $request
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, album $Album)
    {
        $request->validate([
            'name' => 'required|min:3',
            "cover" => "image"
        ]);

        if (isset($request->cover)) {
            $Album->media()->delete();
            $Album->addMedia($request->cover)->toMediaCollection('images');
        }

        $Album->name = $request->name;
        $Album->update();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(album $album)
    {
        album::destroy($album->id);
    }

    public function deleteAll(album $album)
    {

        $album->pictures()->delete();
        $album->delete();
        return redirect('/home');
    }

    public function movePictures($sourceAlbumId, $targetAlbumId)
    {
        $pictures = album::find($sourceAlbumId)->pictures;
        foreach ($pictures as $picture) {
            $picture->album_id = $targetAlbumId;
            $picture->save();
        }
        $this->destroy(album::find($sourceAlbumId));
        return redirect('/home');
    }




    public function UserAlbumsList()             // git albums list for moving pictures
    {
        return auth()->user()->albums;
    }
}
