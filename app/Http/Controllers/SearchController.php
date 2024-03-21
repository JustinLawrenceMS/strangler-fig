<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->input('term');
        if (is_null($term)) {
            return view('welcome');
        }
        $table = $this->jsonHandler($term);

        return view('welcome', ['table' => $table]);
    }

    public function jsonHandler(String $term): Array
    {
        $string = Storage::disk('local')->get("cdc_dataset.json");
        $json = json_decode($string, true);

        $array = [];

        for($i=0; $i<count($json['dataset']); $i++){

            if(strpos($json['dataset'][$i]['title'], $term) !== false){

                $array[] = $json['dataset'][$i];

            }

        }

        return $array;

    }

    public function autocomplete(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = $request->input('term');
        $string = Storage::disk('local')->get("cdc_dataset.json");
        $json = json_decode($string, true);

        $data = [];

        for($i=0; $i<count($json['dataset']); $i++){
            if(stripos($json['dataset'][$i]['title'], $query) !== false){

                $data[] = $json['dataset'][$i]['title'];

            }
        }

        return response()->json($data);
    }
}
