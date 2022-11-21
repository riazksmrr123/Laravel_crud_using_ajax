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
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

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


 </div>
</body>


  <script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $(".data-table").DataTable({
            serverSide: true,
            processing: true,
            ajax: "{{ route('customers.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'city_name',
                    name: 'city_name'
                },
                {
                    data: 'notes',
                    name: 'notes'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });
        $("#createNewCustomer").click(function() {
            $("#customer_id").val('');
            $("#customerForm").trigger('reset');
            $("#modalHeading").html('Add Customer');
            $("#ajaxModel").modal('show');


        });

        $('body').on('click', '.editCustomer', function() {
            var customer_id = $(this).data('id');
            $.get("{{ route('customers.index') }}" + '/' + customer_id + '/edit', function(data) {
                $('#modalHeading').html("Edit Customer");
                $('#saveBtn').val("edit-customer");
                $('#ajaxModel').modal('show');
                $('#customer_id').val(data.id);
                $('#name').val(data.name);
                $('#address').val(data.address);
                $('#notes').val(data.notes);
                $('#CityID').val(data.CityID);
            })
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Save');

            $.ajax({
                data: $('#customerForm').serialize(),
                url: "{{ route('customers.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    $('#customerForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function(data) {
                    console.log('Error:', data);

                }
            });
        });

        $('body').on('click', '.deleteCustomer', function() {

            var customer_id = $(this).data("id");
            // confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ route('customers.store') }}" + '/' + customer_id,
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

    });

  </script>
  {{-- DataTable Links scpipts --}}
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Page specific script -->

  {{-- End DataTable Links scripts --}}

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,

      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</html>