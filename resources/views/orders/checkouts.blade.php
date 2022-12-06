@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')

<div class="content-wrapper">
    <div class="card col">
        <form action="#" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="sale_price">Customer</label>
                    <select class="form-control select2-multiple" name="customerName" id="customerName"
                        multiple="multiple" required>
                        <optgroup label="Select Customer Name">
                            @foreach ($customers as $customer)
                                <option value={{ $customer->id }}>{{ $customer->name }}</option> --}}
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <select class="form-control select2-multiple" name="productName" id="productName"
                        multiple="multiple" required>
                        <optgroup label="Select Product">
                            @foreach ($products as $product)
                                <option value={{ $product->id }}>{{ $product->name }}</option> --}}
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sale_price">Price</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="description">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity"
                        placeholder="Eenter Quantity">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
</div>

@include('layouts.footer')
