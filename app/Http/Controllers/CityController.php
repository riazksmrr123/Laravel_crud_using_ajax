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
                dd('Hello');
                return response()->json(['success','City Added successfully']);
                return redirect('/cities/index');
                }
        return redirect('cities.addcity');
    }

}