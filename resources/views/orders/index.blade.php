@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')

<div class="content-wrapper">
<div class="card col">
  <section>
<div class="content-header">
  <div class="container-fluid">
    <div class="row-mb-2">
      <div class="col-sm-6">
        <h3>All Orders</h3>
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
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Created</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><a href="pages/examples/invoice.html">OR9842</a></td>
            <td>Call of Duty IV</td>
            <td><span class="badge badge-success">Shipped</span></td>
            <td>
              <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
            </td>
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