<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //show all orders record
public function index(){
    //dd('hello pakistan');
    return view('orders.index');
}

//show create order page

public function create(){
    
    $products=Product::get();
    $customers=Customer::get();
    // dd($products);
    return view('orders.create',compact('products','customers'));
}
}
