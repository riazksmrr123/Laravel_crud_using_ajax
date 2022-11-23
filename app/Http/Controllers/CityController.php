<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    //Display Cities List
    function index()
    {
        $cities = City::get();
        return view('cities.allcities',compact('cities'));

    }

    //Show form for add new city
    function show()
    {
        return view('cities.addcity');

    }

    //create new city

    public function create(Request $request)
    {
        if($request->filled('name')){
                // dd($request);
                City::updateOrCreate(['id'=>$request->id],
                ['name'=>$request->name]);
                return response()->json(['success','City Added successfully']);
                return redirect()->route('customers');
                }
        return redirect('cities.addcity');
    }

}



function create(Request $request)
    {
        //dd('hello wold');
        City::updateOrCreate(['id'=>$request->id],
        ['name'=>$request->name]);
        return response()->json(['success','City Added successfully']);
    }

