@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="col col-md-12">
        <!-- general form elements -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Add new product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                    <form action="{{ url('products/store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="@if(isset($products->name)){{ $products->name }}@endif" name="name" id="name"
                        placeholder="Enter Product name">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" value="@if(isset($products->price)){{ $products->price }}@endif" name="price" id="price" placeholder="Eenter Price">
                </div>
                <div class="form-group">
                    <label for="sale_price">Sale Price</label>
                    <input type="text" value="@if(isset($products->sale_price)){{ $products->sale_price }}@endif" class="form-control" name="sale_price" id="price"
                        placeholder="Eenter Sale Price">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" value="@if(isset($products->description)){{ $products->description }}@endif" name="description" id="description"
                        placeholder="Eenter Description">
                </div>
                <div class="form-group">
                    <label for="sku">Sku</label>
                    <input type="text" class="form-control" value="@if(isset($products->sku)){{ $products->sku }}@endif" name="sku" id="sku" placeholder="Eenter sku">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Attach File</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="product_image" value="@if(isset($products->product_image)){{ $products->product_image }}@endif" class="custom-file-input" id="input_file">
                            <label class="custom-file-label" for="input_file">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        <!-- /.card -->

        <!-- general form elements -->

        <!-- /.card -->

    </div>
</div>

@include('layouts.footer')
