<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //get all products
public function index()
  { 

      $products=Product::get();
        return view('products.index ',compact('products'));
        
  }
 

//show add new products page
public function create()
    { 

        return view('products.create');

    }

//create new product

public function store(Request $request)
    {

        if (!$request->has('product_image')) 
          {

            return response()->json(['message' => 'Missing file'], 422);

        }
        $image =$request->file('product_image');
        $new_name = rand() . '.' . $image->getClientOriginalName();
        $image->move(public_path('images/'), $new_name);

        $productData = ['name' => $request->name, 'price' => $request->price, 'sale_price' => $request->sale_price,
        'description' => $request->description,'sku' => $request->sku, 'product_image' => $new_name];
        Product::create($productData);
        return redirect('products/index')->with(['message' => 'Product added successfully!', 'status' => 'success']);
    }


  //Edit product
  public function edit($id)
    {
          $products=Product::find($id);
          return view('products.create',compact('products'));
    }

  //delete product
  public function destroy($id)
    {
        $products=Product::find($id);
        $products->delete();
        return redirect()->route('products/index');
    }

    //update product
    public function update(Request $request, $id)
    {
        $products              = Product::find($id);
        $products->name        = $request->input('name');
        $products->price       = $request->input('price');
        $products->sale_price  = $request->input('sale_price');
        $products->description = $request->input('description');
        $products->sku         = $request->input('sku');
        
        $image      = $request->file('product_image');
        $image_name = time(). '.'.$image->getClientOriginalName();
        $image->move('images/',$image_name);
      
        Product::where('id', $id)->update(['product_image' => $image_name]);
        return redirect('products/index');
    }
  
}