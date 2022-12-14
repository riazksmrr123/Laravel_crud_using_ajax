@extends('layouts.default')



@section('content')
<style>
  .pagination,.dataTables_filter{float:right;}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers Record</h1>
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
                        <label>Name</label>
                          <input type="text" class="form-control" id="name" name="name"
                              placeholder="Enter Name" value="" required>
                      </div>
                      <div class="form-group">
                        <label>Address:</label>
                          <input type="text" class="form-control" id="address" name="address"
                              placeholder="Enter Address" value="" required>
                      </div>
                      <div class="form-group">
                        <label for="city"> City</label>
                          <select class="form-control select2-multiple" name="CityID" id="CityID" multiple="multiple" required>
                            <optgroup label="Select City">
                              @foreach ($cities as $city)
                              <option value={{ $city->id }}>{{ $city->name }}</option>
                              @endforeach
                            </optgroup>
                          </select>
                      </div>
                      
                      <div class="form-group">
                          <label for="notes">Notes</label>
                          <textarea class="form-control" rows="3" name="notes" id="notes"
                              placeholder="Your Notes"></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2" id="saveBtn"
                          value="create">Save</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  {{-- model close --}}


 

@endsection