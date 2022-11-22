@include('header')
@include('sidebar')
@include('navbar')
<div class="content-wrapper">
    <style>
        .pagination,
        .dataTables_filter {
            float: right;
        }
    </style>
    <div class="col-12 py-3">
        <div class="card">
            <div class="bg-info">
                <div class="card-header">
                    <h1 class="card-title">All Cities</h1>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" name='city-table' class="table table-bordered table-striped city-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


@include('footer')