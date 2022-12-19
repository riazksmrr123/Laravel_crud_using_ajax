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
    public function index()
    {
        // dd('hello pakistan');
        $allOrders = Order::get();
        return view('orders.index',compact('allOrders'));
    }

    //show create order page

    public function create()
    {

        $products = Product::get();
        $customers = Customer::get();
        // dd($products);
        return view('orders.create', compact('products', 'customers'));
    }

    //store order details
    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request->customerName,
            'order_date' => $request->date,
            'sub_total' => $request->sub_total,
            'tax_percentage' => $request->tax_percentage,
            'tax_amount' => $request->tax_amount,
            'order_total' => $request->total_amount,

        ]);
                $product_id = $request->product;
                $price = $request->price;
                $quantity = $request->quantity;
                $total = $request->total;
                for ($i = 0; $i < count($product_id); $i++)
                {
                    Order_item::create([
                        'order_id' => $order->id,
                        'product_id' =>intval( $product_id[$i]),
                        'price'  => intval($price[$i]),
                        'quantity' => intval($quantity[$i]),
                        'value' => intval($total[$i]),
                    ]);
            }


            return redirect()->back()->with('message', 'Order placed successfully');
        }

        //Edit order
        public function edit($id)
        {
        // dd($id);
        // dd('Test case is working fine');
            $customers = Customer::get();
            $products = Product::get();

            $allOrders=Order::find($id);
            $orderId = $allOrders->id;
            $orderWithAllItems = DB::table('order_items')->where('order_id', $orderId)->get(); 
            $orderId = $allOrders->id;

            return view('orders.update',compact('allOrders','customers','products','orderWithAllItems'));
        }

    public function update(Request $request,$id)
    {
        $order_id = $request -> id;
        // dd($order_id);
        
        Order::where('id',$order_id)->update(
            [
            'customer_id' => $request->customerName,
            'order_date' => $request->date,
            'sub_total' => $request->sub_total,
            'tax_percentage' => $request->tax_percentage,
            'tax_amount' => $request->tax_amount,
            'order_total' => $request->total_amount,

            ]);


        $items_id = Order_item::findMany($id);
        dd($items_id);
        

        $product_id = $request->product;
        $price = $request->price;
        $quantity = $request->quantity;
        $total = $request->total;
        $productItemsId = $request->productItemsId;
        // dd($productItemsId);
        dd($request->orderItemsId);


        for ($i = 0; $i < count($quantity); $i++)
                {
                    

                    Order_item::where('id',$request->orderItemsId)->update(
                        
                    [
                        'product_id' => intval($product_id[$i]),
                        'price' => intval($price[$i]),       
                        'quantity' => intval($quantity[$i]),
                        'value' => intval($total[$i]),
                    ]);
            
                    return redirect()->back()->with('message', 'Order Updated successfully');
            }
            // return redirect()->back()->with('message','Trya again');

     }
     
    }

