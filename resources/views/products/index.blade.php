@extends('layouts.default')

@section('content')

<div class="col">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Products</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        {{-- add new btn --}}
        <div class="card-header">
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-product">
                Add Product</button>
        </div>


        {{-- end add new btn --}}
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Description</th>
                            <th>Sku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                {{-- <img  src="{{ url('') }}/public/images/{{$result->image }}"> --}}
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('images/' . $product->product_image) }}" class="rounded-circle"
                                        width="40px" height="40px" alt="image">
                                    {{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{ url('products/edit', $product->id)}}" class="btn btn-primary mr-1" method="post">Edit</a>
                                    <form action="{{ url('products/delete', $product->id)}}" method="post">
                                      @csrf
                                      <button class="btn btn-danger" type="submit" data-inline="true">Delete</button>
                                    </div>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

{{-- model --}}
<div class="modal fade" id="modal-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="productHeading">Add Product</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('products/store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Eenter Price">
                        </div>
                        <div class="form-group">
                            <label for="sale_price">Sale Price</label>
                            <input type="text" class="form-control" name="sale_price" id="price" placeholder="Eenter Sale Price">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Eenter Description">
                        </div>
                        <div class="form-group">
                            <label for="sku">Sku</label>
                            <input type="text" class="form-control" name="sku" id="sku" placeholder="Eenter sku">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Attach File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="product_image" class="custom-file-input" id="input_file">
                                    <label class="custom-file-label" for="input_file">Choose file</label>
                                </div>                               
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>                        </div>
                
                    <!-- /.model-body -->
    
                </form>
            </div>
        </div>
    </div>
</div>
{{-- model close --}}

@endsection
