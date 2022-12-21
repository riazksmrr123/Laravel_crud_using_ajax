<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

     //Show all customers record
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

            //table server side processing
            $draw 				= 		$request->get('draw'); // Internal use
            $start 				= 		$request->get("start"); // where to start next records for pagination
            $rowPerPage 		= 		$request->get("length"); // How many recods needed per page for pagination
    
            $orderArray 	   = 		$request->get('order');
            $columnNameArray 	= 		$request->get('columns'); // It will give us columns array
                                
            $searchArray 		= 		$request->get('search');
            $columnIndex 		= 		$orderArray[0]['column'];  // This will let us know,
                                                                // which column index should be sorted 
                                                                // 0 = id, 1 = name, 2 = email , 3 = created_at
    
            $columnName 		= 		$columnNameArray[$columnIndex]['data']; // Here we will get column name, 
                                                                            // Base on the index we get 
            $columnSortOrder 	= 		$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
            $searchValue 		= 		$searchArray['value']; // This is search value 
    
            $customers = DB::table('customers');
            $total = $customers->count();
    
            $totalFilter = DB::table('customers');
            if (!empty($searchValue)) {
                $totalFilter = $totalFilter->where('name','like','%'.$searchValue.'%');
            }
            $totalFilter = $totalFilter->count();
    
    
            $arrData = DB::table('customers');
            $arrData = $arrData->skip($start)->take($rowPerPage);
            $arrData = $arrData->orderBy($columnName,$columnSortOrder);
    
            if (!empty($searchValue)) {
                $arrData = $arrData->where('name','like'.$searchValue.'%');
                // $arrData = $arrData->orWhere('city','like','%'.$searchValue.'%');
            }
            // dd('Hello pakistan');
    
            $arrData = $arrData->get();
    
            $response = array(
                
                "draw" => intval($draw),
                "recordsTotal" => $total,
                "recordsFiltered" => $totalFilter,
                "data" => $arrData,
            );
    
            return response()->json($response);
            //data table server side processing

        }
        return view('customers.index',compact('customers', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function create(Request $request)
    {
  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Create user if not exist,update if exist
    public function store(Request $request)
    {


        Customer::updateOrCreate(['id'=>$request->customer_id],
        ['name'=>$request->name,
        'address'=>$request->address,
        'CityID'=>$request->CityID,
        'notes'=>$request->notes,


    ]);
        // dd('hello pakistan');
    
    // return redirect('customers.index')->with('success', 'Customer has been added');
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
        // $cities = City::get();
        // return view('cities',compact('cities'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Show Edit form
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Delete Customer
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return response()->json(['success'=>'Customer Deleted successfully']);
    }


    //get data for server side processing
    public function getData(Request $request) {

       
    }
}
