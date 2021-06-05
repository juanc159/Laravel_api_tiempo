<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    //
    public function index(){
        return Country::all();
    }

    public function buscar($id){
        return Country::find($id);
    }
}
