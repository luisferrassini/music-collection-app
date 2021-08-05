<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index() {
        $albums = Album::get();
        $artistListController = new ArtistListController;
        foreach($albums as $a) {
            $a->artist = $artistListController->get($a->artist)[0]['name'];
        }
        return view('albums.list', ['albums' => $albums]);
    }

    public function new() {
        $artistListController = new ArtistListController;
        $artistList = $artistListController->getList();
        return view('albums.form', ['artistList' => $artistList]);
    }

    public function create(Request $request) {
        if($request->all()['name'] == NULL)
            return Redirect::to('/albums/new');
        if($request->all()['artist'] == '-1')
            return Redirect::to('/albums/new');
        $album = new Album;
        $album = $album->create($request->all());
        return Redirect::to('/albums');
    }

    public function edit($id) {
        $album = Album::findOrFail($id);
        $artistListController = new ArtistListController;
        $artistList = $artistListController->getList();
        $album->artist = $artistListController->get($album->artist)[0]['name'];
        return view('albums.form', ['album' => $album, 'artistList' => $artistList]);
    }

    public function update(Request $request, $id) {
        if($request->all()['name'] == NULL)
            return Redirect::to('/album/'.$id.'/edit');
        $album = Album::findOrFail($id);
        $album->update($request->all());
        return Redirect::to('/albums');
    }

    public function delete($id) {
        if(Auth::user()->role != 'admin') // current user cannot delete albums
            return Redirect::to('/albums');
        $album = Album::findOrFail($id);
        $album->delete();
        return Redirect::to('/albums');
    }
}
