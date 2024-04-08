<?php

namespace App\Http\Controllers;

use App\Models\album;
use Illuminate\Http\Request;

class picturesController extends Controller
{

    public function create(album $album)
    {                             // view adding form
        return view('pictures.create', ['album' => $album]);
    }

    public function store(album $album)
    {                               /// add new picture

        request()->validate([
            'name' => 'required|min:4',
            'image' => 'required|image'
        ]);
        $picture =    $album->pictures()->create([
            'name' => Request('name'),
        ]);
        $picture->addMedia(request()->image)->toMediaCollection('images');

        return redirect(route('Album.show', $album));
    }
}
