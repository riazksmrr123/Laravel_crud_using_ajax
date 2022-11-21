@include('header')
<div class="col-md-6">
    <!-- general form elements -->
    
    <!-- /.card -->

    <!-- general form elements -->
    

    <!-- Input addon -->
    
    <!-- /.card -->
    <!-- Horizontal Form -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Add New City</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{url('customers/update')}}" class="form-horizontal" method="POST" >
        {{-- {{ csrf_field() }} --}}
        @csrf
        <div class="card-body">

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="name" placeholder="your city name">
            </div>
          </div>
         
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info float-right">Add</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

  </div>
  @include('footer')