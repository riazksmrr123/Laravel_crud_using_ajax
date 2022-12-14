@extends('layouts.default')

@section('content')

<div class="content-wrapper">
<div class="card col mt-4 col">
  <section>
<div class="content-header">
  <div class="container-fluid">
    <div class="row-mb-2">
      <div class="col-sm-6">
        <h3>Order Details</h3>
      </div>
    </div>
  </div>
</div>

  </section>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th>ID</th>
            <th>Customer_ID</th>
            <th>Order_date</th>
            <th>Sub_Total</th>
            <th>Tax_Percentage</th>
            <th>Tax_Amount</th>
            <th>Total</th>
            <th>Edit</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($allOrders as $Order)
          <tr>
           
              
            
            <td>{{ $Order->id }}</td>
            <td>{{ $Order->customer_id }}</td>
            <td>{{ $Order->order_date }}</td>
            <td>{{ $Order->sub_total }}</td>
            <td>{{ $Order->tax_percentage }}</td>
            <td>{{ $Order->tax_amount }}</td>
            <td>{{ $Order->order_total }}</td>
            <td>
              <a href="{{ url('orders/edit',$Order->id) }}" class="btn btn-danger" method="post">Edit</a>
            </td>

           
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ url('orders/create') }}" class="btn btn-sm btn-success float-left mt-2">Place New Order</a>

    </div>
    <!-- /.card-footer -->
  </div>
</div>

@endsection