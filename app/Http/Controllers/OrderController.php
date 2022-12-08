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
        //dd('hello pakistan');
        $order = Order::create([
            'customer_id' => $request->customerName,
            'order_date' => $request->date,
            'sub_total' => $request->sub_total,
            'tax_percentage' => $request->tax_percentage,
            'tax_amount' => $request->tax_amount,
            'order_total' => $request->total_amount,

        ]);
        // $order_item = new Order_item;


        // $order_item->order_id = $order->id;
        // $order_item->product_id = $request->product;
        // $order_item->price = $request->price;
        // $order_item->quantity = $request->quantity;
        // $order_item->value = $request->total;
        // // dd($order_item);
        // // dd($order);

        if (!empty($order)) {
            // $order_item = $order;
                $size = count(collect($request)->get('quantity'));

                for ($i = 0; $i < $size; $i++) {

                        $orderitem = Order_item::create([

                            'order_id' => $order->id,
                            'product_id' => $request->get('product')[$i],
                            'quantity' => $request->get('quantity')[$i],
                            'price' => $request->get('price')[$i],
                            'value' => $request->get('total')[$i],
                            'total' => 3,''
                        ]);

                        dd('hello world');

    }
            //     foreach ($order_item as $item) {
            //         Order_item::create([
            //             'order_id' => $order->id, 
            //             'product_id' => $item->product_id,
            //             'price'  => $item->price,
            //             'quantity' => $item->quantity,
            //             'value' => $item->value,
            //         ]);        
            // }


            //new 

            // $order_id = $order->id;
            // $product_id = $request->product;
            // $price = $request->price;
            // $quantity = $request->quantity;
            // $value = $request->total;

            // for ($i = 0; $i<strlen( $product_id); $i++){
            //     $datasave =
            //         [
            //             'order_id' => $order_id[$i],
            //             'product_id' => $product_id[$i],
            //             'price' => $price[$i],
            //             'quantity' => $quantity[$i],
            //             'value' => $value[$i],

            //         ];
            //     DB::table('order_items')->insert($datasave);


            //---------------------

            // $product = Product::get();
            // $order_item = new Order_item;


            // $order_id = $order->id;
            // $order_item->product_id = $request->product;
            // $order_item->price = $request->price;
            // $order_item->quantity = $request->quantity;
            // $order_item->value = $request->total;
            ///new

            // $product_id = $order_item['product_id'];
            // $price = $order_item['price'];
            // $quantity = $order_item['quantity'];
            // $value = $order_item['value'];


            // Order_item::insert(array_combine( $product_id,$price));
            ///new

            // dd($request->all());
            // dd($order_item);
            // $jsoncheck = jeson_decode($order_item,true);
            // dd($jsoncheck);
            // intval($order_item);
            // json_decode($order_item);
            // foreach ($order_item as $order_item) {
            //         $order_item = new Order_item;
            //         [


            //         $order_item->order_id=$order->id,
            //         $order_item->product_id = $request->product,
            //         $order_item->price=$request->price,
            //         $order_item->quantity=$request->quantity,
            //         $order_item->value=$request->total,

                    
                    
            //         ];
                    // dd($order_item);


                // ($order_item)->save();
                // }
            // dd($order_item);
            // $item->save();

            //------------

            // order items foreach start


            // $orderItems = [];
            // foreach ($order_item as $item) {
            //     $orderItems[] = [
            //         'order_id' => $item->order_id,
            //         'product_id' => $item->product_id,
            //         'price' => $item->price,
            //         'quantity' => $item->quantity,
            //         'value' => $item->value,
            //     ];

            // }
            // DB::table('order_items')->insert($orderItems);
            // Order_item::insert($orderItems);
            // end order items foreach

            //$orderItems->save();
            return redirect()->back()->with('message', 'Order placed successfully');
        }
    }
}