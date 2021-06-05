<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CitiesController extends Controller
{
    //
    public function index($id){
        return City::where('id_country',$id)->get();
    }

    public function prueba($c,$p){
        $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$c.','.$p.'&appid=6f402235aa6777ded885d25bde28a47a&lang=es';

        $post = Http::get($url);
        $resultados = $post->json();
        return $resultados;
    }
}
