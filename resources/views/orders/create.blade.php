@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')

<div class="container-fluid">
    <div class="content-wrapper py-5 px-4">
        <form action="{{ url('orders/store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <h3>Select Product Details</h3>
            <div class="row">
                <div class="col-md-8 bg-white mt-4">
                    <div class="container py-4">
                        <div class="row mb-4">
                            {{-- select product --}}
                            <select class="col-md-5 mr-md-1" name="productName" placeholder="select Product" required>
                                <optgroup label="Select Product Name">
                                    @foreach ($products as $product)
                                        <option value={{ $product->id }}>{{ $product->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            <input type="text" name="salePrice" class="col-md-3 mr-md-1" placeholder="price">
                            <input type="text" name="quantity" class="col-md-3 mr-md-1" placeholder="quantity">
                            <button class="btn btn-primary">Add</button>
                        </div>
                        {{-- <div class="row pt-4">
                            <h3>Order Details</h3>
                        </div> --}}
                        {{-- start table --}}
                        <div class="col-w-100 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Your Order Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered min-height:35px">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>software</td>
                                                <td>200</td>
                                                <td>2</td>
                                                <td>400</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix"><div>
                                    <h5 class="float-right">Total Amount:<td class="mr-5">400</td>
                                    </h5>
                                </div>
                                </div>
                            </div>
                        </div>
                        {{-- end table --}}
                    </div>
                </div>
                <div class="col-md-4 px-4">
                    <h3>Customer</h3>
                    <select class="form-control w-100" name="customerName" required>
                        <optgroup label="Select Customer Name">
                            @foreach ($customers as $customer)
                                <option value={{ $customer->id }}>{{ $customer->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <input type="date" class="form-control w-100 mt-2" name="">
                </div>
            </div>
        </form>
    </div>
</div>

@include('layouts.footer')
