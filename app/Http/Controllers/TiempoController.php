<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TiempoController extends Controller
{
    public function consulta($c,$p){
        $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$c.','.$p.'&appid=6f402235aa6777ded885d25bde28a47a&lang=es';

        $post = Http::get($url);
        $resultados = $post->json();
        return $resultados;
    }
}
