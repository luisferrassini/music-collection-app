<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Redirect;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index() {
        $albums = Album::get();
        return view('albums.list', ['albums' => $albums]);
    }

    public function new() {
        return view('albums.form');
    }

    public function create(Request $request) {
        $album = new Album;
        $album = $album->create($request->all());
        return Redirect::to('/albums');
    }

    public function edit($id) {
        $album = Album::findOrFail($id);
        return view('albums.form', ['album' => $album]);
    }

    public function update(Request $request, $id) {
        $album = Album::findOrFail($id);
        $album->update($request->all());
        return Redirect::to('/albums');
    }

    public function delete($id){
        $album = Album::findOrFail($id);
        $album->delete();
        return Redirect::to('/albums');
    }
}
