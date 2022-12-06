<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

//store order details
public function store(Request $request){
        //dd('hello pakistan');
            $order=Order::create([
            'customer_id'=>$request->customerName,
            'order_date'=>$request->date,
            'sub_total'=>$request->sub_total,
            'tax_percentage'=>$request->tax_percentage,
            'tax_amount'=>$request->tax_amount,
            'order_total'=>$request->total_amount,
            
            //save record in order_items table too
            
            
            

            // if (!empty($order)) {
            //     foreach ($request->get('items') as $item) {
            //         $item['order_id'] = $order->id;
            //         $item['order_id'] = $order->id;
            //         $item['order_id'] = $order->id;
            //         $item['order_id'] = $order->id;
            //         $item['order_id'] = $order->id;
            //         OrderItems::create($item);
            //     }
            // }

    ]);
        Order_item::create([
            'order_id' => $request->id,
            'product_id' => $request->product,
            'price' => $request->price,
            'quantity' => $request->qty,

        ]);
        //$request->all();
        return redirect()->back()->with('message','Order placed successfully');
}


}
