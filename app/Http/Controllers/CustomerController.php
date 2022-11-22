<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Customer;
use App\Models\City;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::get();
        $customers= DB::select("select c.id, c.name, c.address, c.notes, ct.name AS city_name, ct.id AS city_id from customers AS c inner join cities AS ct on c.CityID = ct.id");

        if ($request->ajax()){
            $allcustomerdata=DataTables::of($customers)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                $row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>&nbsp; &nbsp;';
                $btn.='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                $row->id.'" data-original-title="delete" class="edit btn btn-danger btn-sm deleteCustomer">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allcustomerdata;

        }
        return view('index',compact('customers', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function create(Request $request)
    {
        // dd($request);
        if($request->filled('name')){ 
        // $input = $request->all();
        // City::create($input);
        // return redirect('customers')->with('flash_message', 'City Added!');
        // dd($request);
        City::Create(['id'=>$request->id],
        ['name'=>$request->name]);
        return redirect()->route('customers');
        return response()->json(['success','City Added successfully']);
        }
    return redirect('addnewcity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Customer::updateOrCreate(['id'=>$request->customer_id],
        ['name'=>$request->name,
        'address'=>$request->address,
        'CityID'=>$request->CityID,
        'notes'=>$request->notes,

    ]);
        return response()->json(['success','Customer Added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cities = City::get();
        return view('cities',compact('cities'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addnewcity()
    {

        return view('addcity');


        // $cities = City::get();
        // return view('cities',compact('cities'));

    }



    public function edit($id)
    {
        $customers=Customer::find($id);
        return response()->json($customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->filled('name')){
                // dd($request);
                City::updateOrCreate(['id'=>$request->id],
                ['name'=>$request->name]);
                return response()->json(['success','City Added successfully']);
                return redirect()->route('customers');
                }
        return redirect('addnewcity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('delete controller testing');
        Customer::find($id)->delete();
        return response()->json(['success'=>'Customer Deleted successfully']);
    }
}
