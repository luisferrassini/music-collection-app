<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Album;

class ArtistListController extends Controller
{
    public function getList() {
        $json = Http::withHeaders([
            'Basic' => env('ARTIST_LIST_API_KEY', false)
        ])->get(env('ARTIST_LIST_API_URL', false))->json();
        $array = array();
        foreach($json as $data) {
            $array[] = $data[0];
        }
        return $array;
    }

    public function get($id) {
        $json = Http::withHeaders([
            'Basic' => env('ARTIST_LIST_API_KEY', false)
        ])->get(env('ARTIST_LIST_API_URL', false).'/?id='.$id)->json(); // API não retorna como esperado
        $array = array();
        foreach($json as $data) {
            if($data[0]['id'] == $id) {
                $array[] = $data[0];
                break;
            }
        }
        return $array;
    }

    public function index() {
        $json = Http::withHeaders([
            'Basic' => env('ARTIST_LIST_API_KEY', false)
        ])->get(env('ARTIST_LIST_API_URL', false))->json();
        $array = array();
        foreach($json as $data) {
            $array[] = $data[0];
        }
        return view('home', ['artistList' => $array]);
    }

}
