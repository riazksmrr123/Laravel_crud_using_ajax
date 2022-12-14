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
        // dd('Test case is working fine');
            $allOrders=Order::find($id);
            $orderId = $allOrders->id;
        // dd($orderId);
        // $allOrders = intval($allOrders);
        // dd($allOrders->sub_total);
            $orderItems = DB::table('order_items')->where('order_id',$orderId)->first();
            // dd($orderItems);
            // $customerId = DB::table('orders')->where('customer_id',$orderItems->customer_id);
            $customers = Customer::get();
            $products = Product::get();
            return view('orders.update',compact('allOrders','orderItems','customers','products'));
        }

    public function update(Request $request)
    {
        $order = $request -> id;
        // dd($order);
            Order::updateOrCreate(['id'=>$request->id],
            [
            'customer_id' => $request->customerName,
            'order_date' => $request->date,
            'sub_total' => $request->sub_total,
            'tax_percentage' => $request->tax_percentage,
            'tax_amount' => $request->tax_amount,
            'order_total' => $request->total_amount,

            ]);
        // dd('executed successfully');
            
        $product_id = $request->product;
        // dd($product_id);
        $price = $request->price;
        // dd($price);
        $quantity = $request->quantity;
        // dd($quantity);
        $total = $request->total;
        // dd($total);
        for ($i = 0; $i < count($quantity); $i++)
            // dd($i);
                {
                    Order_item::updateOrCreate(['id'=>$request->id],
                    [
                        'order_id' => $order,
                        'product_id' => intval($product_id[$i]),
                        'price' => intval($price[$i]),       
                        'quantity' => intval($quantity[$i]),
                        'value' => intval($total[$i]),
                    ]);
            // dd('query executed successfully');
                    return redirect()->back()->with('message', 'Order Updated successfully');
            }
            // return redirect()->back()->with('message','Trya again');


        

        // dd('Hello laravel');
     }
     
    }

