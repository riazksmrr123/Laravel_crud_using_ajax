@include('header')
@include('sidebar')
@include('navbar')

<div class="content-wrapper">
  <div class="col-md-8 mx-auto pt-5">
     <!-- card -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Add New City</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{url('cities/create')}}" class="form-horizontal"  method="POST" >
        {{-- {{ csrf_field() }} --}}
        @csrf
        
        <div class="card-body">

          <div class="form-group-row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-12">
              <input type="name" class="form-control" name="name" id="name" placeholder="your city name">
            </div>
          </div>
         
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info float-right px-4">Add</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card close-->
  </div>

</div>
  @include('footer')