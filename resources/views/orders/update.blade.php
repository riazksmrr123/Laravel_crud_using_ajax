@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')

<div class="container-fluid">
    <div class="content-wrapper py-5 px-4">
        {{-- message --}}
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        {{-- ./message --}}
       
            <div class="card col ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Create Order</h5>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ url('orders/update') }}" method="get">
                                @csrf
                                <div class="input-group col-md-6 float-md-right">
                                    <input type="search" name="id" class="form-control" placeholder=" Enter Order nomber">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- end search --}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{-- url('orders/store') --}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 bg-white">
                                
                                <div class="w-100">
                                    <label for="name">Customer Name*</label>
                                    <select class="form-control mb-4 w-100" name="customerName" required>
                                        <optgroup label="Select Customer Name">
                                            {{-- @foreach ($customers as $customer)
                                                <option value={{ $customer->id }}>{{ $customer->name }}</option>
                                            @endforeach --}}
                                        </optgroup>
                                    </select>
                                    <label for="date">Date*</label>
                                    <input type="date" class="form-control w-100" name="date"
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>
                        {{-- product --}}
                        <div class="card mt-5">
                            <div class="card-header">
                                <h5>Products</h5>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-hover record" id="update_order">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"> No </th>
                                                    <th class="text-center"> Product </th>
                                                    <th class="text-center"> Quantity </th>
                                                    <th class="text-center"> Price </th>
                                                    <th class="text-center"> Amount </th>
                                                    <th class="text-center"> Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id='row-1'>
                                                    <td>1</td>
                                                    {{-- change --}}
                                                    <td><select type="text" name='product[]' id="productList"
                                                            placeholder='Enter Product Name' class="form-control">
                                                            <option>Choose Product</option>

                                                        </select>
                                                    </td>
                                                    {{-- ./change --}}
                                                    <td><input type="number" name='quantity[]' placeholder='Enter Qty'
                                                            class="form-control qty" step="0" min="1" />
                                                    </td>
                                                    <td><input type="text" name='price[]' id="price-1"
                                                            placeholder='Enter Unit Price' class="form-control price"
                                                            step="0.00" min="0" /></td>
                                                    <td><input type="number" name='total[]' placeholder='0.00'
                                                            class="form-control total" readonly /></td>
                                                    <td><a id='delete_row-1' class="btn btn-danger delete">Delete
                                                            Row</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="w-100 mb-5">
                                        <div class="col-md-12">
                                            <a id="new_row" class="btn btn-success">Add Row</a>
                                            {{-- <button id='delete_row' class="float-right btn btn-danger">Delete
                                                    Row</button> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="w-100">
                                        <div class="pull-right col-md-4">
                                            <table class="table table-bordered table-hover" id="update_order_total">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center">Sub Total</th>
                                                        <td class="text-center"><input type="number" name='sub_total'
                                                                placeholder='0.00' class="form-control" id="sub_total"
                                                                readonly />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Tax</th>
                                                        <td class="text-center">
                                                            <div class="input-group mb-2 mb-sm-0">
                                                                <input type="number" name="tax_percentage"
                                                                    class="form-control" id="tax" placeholder="0"
                                                                    min="0" value="0">
                                                                <div class="input-group-addon">%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Tax Amount</th>
                                                        <td class="text-center"><input type="number" name='tax_amount'
                                                                id="tax_amount" placeholder='0.00' class="form-control"
                                                                readonly />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Grand Total</th>
                                                        <td class="text-center"><input type="number" name='total_amount'
                                                                id="total_amount" placeholder='0.00' class="form-control"
                                                                readonly /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- ./product --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
        
    </div>
</div>

@include('layouts.footer')