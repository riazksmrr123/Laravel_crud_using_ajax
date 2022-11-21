@include('header')
@include('sidebar')
<style>
  .pagination,.dataTables_filter{float:right;}
</style>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Customer</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto float-right ">
      <!-- Navbar Search -->
      <li class="nav-item d-none d-sm-inline-block">
        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers Record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Record</h3>
                <a class="btn btn-success" href="javascript:void(0)" id="createNewCustomer" style="float:right">Add
                New</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped data-table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>notes</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  {{-- model --}}
  <div class="modal fade" id="ajaxModel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="modalHeading"></h4>
              </div>
              <div class="modal-body">
                  <form id="customerForm" name="customerForm" class="form-horizontal">
                      <input type="hidden" name="customer_id" id="customer_id">
                      <div class="form-group">
                          Name<br>
                          <input type="text" class="form-control" id="name" name="name"
                              placeholder="Enter Name" value="" required>
                      </div>
                      <div class="form-group">
                          Address:<br>
                          <input type="text" class="form-control" id="address" name="address"
                              placeholder="Enter Address" value="" required>
                      </div>
                      <div class="form-group">
                          City<br>
                          <select class="form-control" name="CityID" id="CityID" required>
                              <option selected value="">Select City</option>
                              @foreach ($cities as $city)
                              <option value={{ $city->id }}>{{ $city->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="notes">Notes</label>
                          <textarea class="form-control" rows="3" name="notes" id="notes"
                              placeholder="Your Notes"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mt-3" id="saveBtn"
                          value="create">Save</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  {{-- model close --}}


  @include('footer')