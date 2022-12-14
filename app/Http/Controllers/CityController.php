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
        return view('cities.index',compact('cities'));

    }

    //Show form for add new city
    function show()
    {
        return view('cities.create');

    }

    //create new city

    public function create(Request $request)
    {
        if($request->filled('name'))
        {
            City::create(['name' => $request->name]);
            return redirect()->back()->with('message','success','City Added successfully');
        }
        return redirect('cities.create');
    }

}