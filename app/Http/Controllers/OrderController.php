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
        //dd('hello pakistan');
        return view('orders.index');
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

        //edit order

        public function edit()
        {

        return view('orders.update');

         }

         //update order details

    public function update(Request $request)
         {
            //match requested id with order id column
            $id=$request->id;
            $orderid = DB::table('orders')->where('id',$id)->value('id');
            //fetch item details with order id
            $itemdetails = DB::table('order_items')->where('order_id', $orderid )->first();
        return view('orders.update', compact('itemdetails'));
        dd($itemdetails);

            dd($orderid);
            if (Order::where('id' == $id->exists()))
             {
            // dd('hello');
                // user found
             }

        //    dd('hello pakistan');
 
          }
    }

