@include('header')
@include('sidebar')
@include('navbar')
<div class="content-wrapper">
<div class="col-md-6 mx-auto pt-5">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h3 class="card-title">All Cities</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id='' name='city-table' class="table table-bordered city-table">
                <thead>
                    <tr>
                        
                            <th style="width: 10px">ID</th>
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
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>

</div>
</div>
@include('footer')
