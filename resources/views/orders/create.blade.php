@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')

<div class="container-fluid">
    <div class="content-wrapper py-5 px-4">
        <form action="{{ url('orders/store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card col ">
                <div class="card-header">
                    <div>
                        <h6>Create Order</h6>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 bg-white">
                            <div class="container">
                                <div class="row mb-4">
                                    {{-- cut --}}
                                    {{-- ./cut --}}
                                </div>
                            </div>
                            <div class="w-100">
                                <label for="name">Customer Name*</label>
                                <select class="form-control mb-4 w-100" name="customerName" required>
                                    <optgroup label="Select Customer Name">
                                        @foreach ($customers as $customer)
                                            <option value={{ $customer->id }}>{{ $customer->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                <label for="date">Date*</label>
                                <input type="date" class="form-control w-100" name="">
                            </div>
                        </div>
                    </div>
                    {{-- product --}}
                    <div class="card mt-5">
                        <div class="card-header"><h6>Products</h6>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center"> No </th>
                                                        <th class="text-center"> Product </th>
                                                        <th class="text-center"> Quantity </th>
                                                        <th class="text-center"> Price </th>
                                                        <th class="text-center"> Amount </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id='addr0'>
                                                        <td>1</td>
                                                        {{-- change --}}
                                                        <td><select type="text" name='product[]'
                                                                placeholder='Enter Product Name' class="form-control">
                                                                @foreach ($products as $product)
                                                                <option value={{ $product->id }}>{{ $product->name }}</option>
                                                                @endforeach
                                                                </select>
                                                        </td>
                                                        {{-- ./change --}}
                                                        <td><input type="number" name='qty[]' placeholder='Enter Qty'
                                                                class="form-control qty" step="0"
                                                                min="0" /></td>
                                                        <td><input type="number" name='price[]'
                                                                placeholder='Enter Unit Price'
                                                                class="form-control price" step="0.00"
                                                                min="0" /></td>
                                                        <td><input type="number" name='total[]' placeholder='0.00'
                                                                class="form-control total" readonly /></td>
                                                    </tr>
                                                    <tr id='addr1'></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <button id="add_row" class="btn btn-success pull-left">Add Row</button>
                                            <button id='delete_row' class="float-right btn btn-danger">Delete
                                                Row</button>
                                        </div>
                                    </div>
                                    <div class="row clearfix" style="margin-top:20px">
                                        <div class="pull-right col-md-4">
                                            <table class="table table-bordered table-hover" id="tab_logic_total">
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
                                                                <input type="number" class="form-control"
                                                                    id="tax" placeholder="0">
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
                                                        <td class="text-center"><input type="number"
                                                                name='total_amount' id="total_amount" placeholder='0.00'
                                                                class="form-control" readonly /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                {{-- ./product --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('layouts.footer')
