<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //get all products
public function index(){
    return view('product.index');
}
 

//show add new products page
public function create()
{
    return view('product.create');
}


}
