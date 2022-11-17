<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 8 Ajax CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Student List</h1>
        <a class="btn btn-success mb-3" href="javascript:void(0)" id="createNewCustomer" style="float:right">Add New</a>
        <table class="table table-bordered data-table">
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
            <tbody></tbody>
        </table>
    </div>
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
                            <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Your Notes"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" id="saveBtn" value="create">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteCustomer', function() {

            var customer_id = $(this).data("id");
            confirm("Are You sure want to delete !");

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

</html>
