<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    //
    public function index(){
        return City::all();
    }
    public function buscar($id){
        return City::where('id_country',$id)->get();
    }
}
