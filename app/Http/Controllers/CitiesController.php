<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    //
    public function index($id){
        return City::where('id_country',$id)->get();
    }
}
