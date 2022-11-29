<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //get all products
public function index(){
  $products=Product::get();
    return view('products.index ',compact('products'));
}
 

//show add new products page
public function create()
{
    return view('products.create');
}

//create new product

public function store(Request $request) {
  dd($request->all());
 

  //dd('Hello pakistan');
    // $request->validate([
    //   'name' => 'required',
    //   'price' => 'required|numeric|between:0,9999999999.99',
    //   'sale_price' => 'required|numeric|between:0,9999999999.99',
    //   'description' => 'required',
    //   'sku' => 'required|numeric|between:0,9',
    //   'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ]);
    
      if (!$request->has('product_image')) {
          return response()->json(['message' => 'Missing file'], 422);
      }
      // $blog = Blog::where('id', '=', $id)->first();

    //$imageName = time() . '.' . $request->file->extension();
    $image =$request->file('product_image');
    $new_name = rand() . '.' . $image->getClientOriginalName();
        $image->move(public_path('images/'), $new_name);
    //$request->image->move(public_path('images'), $imageName);
    //$request->file->storeAs('public/images', $imageName);

    $productData = ['id'=>$request->id,'name' => $request->name, 'price' => $request->price, 'sale_price' => $request->sale_price,'description' => $request->description,'sku' => $request->sku, 'product_image' => $new_name];
    dd($productData);
    // dd($request->all());
    Product::updateOrCreate($productData);
    return redirect('products/index')->with(['message' => 'Product added successfully!', 'status' => 'success']);
  }


  //Edit product
  public function edit($id){
    $products=Product::find($id);
     dd($products);
    return view('products.create',compact('products'));
  }

  //delete product
  public function destroy($id){
    $products=Product::find($id);
    // dd($products);
    // if($products!=null){
    $products->delete();
    // return redirect()->route('products/index');
    }

    //update product
    
    
  }
