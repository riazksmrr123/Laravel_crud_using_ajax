<?php

namespace App\Http\Controllers;
use App\Models\City;

use Illuminate\Http\Request;

class CityController extends Controller
{
    //
}

function create(Request $request)
    {
        //dd('hello wold');
        City::updateOrCreate(['id'=>$request->id],
        ['name'=>$request->name]);
        return response()->json(['success','City Added successfully']);
    }
