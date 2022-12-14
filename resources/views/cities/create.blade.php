@extends('layouts.default')

@section('content')
<div class="content-wrapper">
    <div class="col-md-8 mx-auto pt-5">
        <!-- card -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add New City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" class="form-horizontal" method="">
                {{-- {{ csrf_field() }} --}}
                @csrf
                <div class="card-body">
                    <div class="form-group-row">
                        <label for="name" class="col-sm-2 col-form-label">Name: </label>
                        <div class="col-12">
                            <input type="name" class="form-control" name="name" id="name"
                                placeholder="your city name">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right px-4" id="butsave">Add</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card close-->
    </div>
</div>

{{-- message --}}



{{-- end message --}}
{{--   start ajax   --}}
<script>
    $(document).ready(function() {

        $('#butsave').on('click', function() {
            var name = $('#name').val();
            if (name != "") {
                /*  $("#butsave").attr("disabled", "disabled"); */
                $.ajax({
                    url: "{{ url('/cities/create') }}",
                    type: "POST",
                    data: {
                        _token: $("#csrf").val(),
                        name: name
                    },
                    cache: false,
                    success: function(dataResult) {
                        alert("Your City Added Successfully!")
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            window.location = "{{ url('/cities/index') }}";
                        } else if (dataResult.statusCode == 201) {
                            alert("Error occured !");
                        }
                    }
                });
            } else {
                alert('Please fill the City Name field !');
            }
        });
    });
</script>
@endsection
