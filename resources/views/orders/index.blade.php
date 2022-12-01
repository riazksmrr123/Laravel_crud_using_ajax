@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')

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
            <th>Order ID</th>
            <th>Product</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Created</th>
            <th>Deliverd Date</th>
            <th>Sub Total</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>OR9842</td>
            <td>Call of Duty IV</td>
            <td>45</td>
            <td>
              <div>2</div>
            </td>
            <td>Shipped</td>
            <td>Created Date</td>
            <td>Deliverd Date</td>
            <td>90</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div>
    <!-- /.card-footer -->
  </div>
</div>

  @include('layouts.footer')