@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')
<div class="content-wrapper">
    <style>
        .pagination,
        .dataTables_filter {
            float: right;
        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Cities</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-12 py-3">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="citytable" name='city-table' class="table table-bordered table-striped city-table">
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
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#citytable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#citytable_wrapper .col-md-6:eq(0)');
        $('#citytable2').DataTable({
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


@include('layouts.footer')