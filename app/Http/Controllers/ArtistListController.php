<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Album;

class ArtistListController extends Controller
{
    public function getList() {
        $json = Http::withHeaders([
            'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
        ])->get('https://moat.ai/api/task/')->json();
        $array = array();
        foreach($json as $data) {
            $array[] = $data[0];
        }
        return $array;
    }

    public function get($id) {
        $json = Http::withHeaders([
            'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
        ])->get('https://moat.ai/api/task/?id='.$id)->json(); // API não retorna como esperado
        $array = array();
        foreach($json as $data) {
            if($data[0]['id'] == $id) {
                $array[] = $data[0];
                break;
            }
        }
        return $array;
    }
}
