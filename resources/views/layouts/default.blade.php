
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Customer App</title>

 {{-- end toast cdn link --}}
  {{-- <!-- Google Font: Source Sans Pro --> --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  {{-- <!-- Font Awesome --> --}}
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  {{-- <!-- Ionicons --> --}}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  {{-- <!-- Tempusdominus Bootstrap 4 --> --}}
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  {{-- <!-- iCheck --> --}}
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  {{-- <!-- JQVMap --> --}}
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  {{-- <!-- Theme style --> --}}
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  {{-- <!-- overlayScrollbars --> --}}
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  {{-- <!-- Daterange picker --> --}}
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  {{-- <!-- summernote --> --}}
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/js/custom.js')}}">
  {{-- select2 --}}
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  


  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
</head>
<body class="sidebar-mini layout-fixed">
  <div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{-- appblade --}}
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'CustomersApp') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    {{-- end appblade --}}
    <!-- Left navbar links -->
    <ul class="navbar-nav arrow">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('customers') }}" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    </ul>
</nav>
<!-- /.end navbar -->

{{-- sidebar --}}

<div class="hold-transition sidebar-mini layout-fixed">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('customers') }}" class="brand-link">
            <div style="text-align: center">
                <span class="brand-text font-weight-light mx-auto">Dashboard</span>
            </div>
        </a>
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item" id="city">
                        <a href="#" class="nav-link">
                            <i class="mr-2 fas fa-city"></i>
                            <p>
                                Cities
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('cities/index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('cities/add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul> 
                    </li>
                        {{-- customers manue --}}
                    <li class="nav-item" id="customer">
                        <a href="#" class="nav-link">
                            <i class="mr-2 fa fa-solid fa-user"></i>
                            <p>
                                Customers
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('customers') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="addCustomer_menu" class="nav-link">
                                        {{-- <a href="addnewcity" class="nav-link"> --}}
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    {{-- end customers manue --}}

                    {{-- product manue --}}
                    <li class="nav-item" id="product">
                        <a href="#" class="nav-link">
                            <i class="mr-2 fa fa-sharp fa-solid fa-circle"></i>
                            <p>
                                Products
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('products/index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('products/create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    {{-- end product manue --}}

                    {{-- orders --}}
                    <li class="nav-item" id="orders">
                        <a href="#" class="nav-link">
                            <i class="mr-2 fa fa-solid fa-file-invoice"></i>
                            <p>
                                Orders
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('orders/create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ url('orders/index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    {{-- ./orders --}}

                   
                </ul>
            </nav>

            {{-- end customers menue --}}
        </div>
    </aside>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

@yield('content')
{{-- footer --}}

<footer class="main-footer">
        {{-- DataTable Links scpipts --}}
    
        <script src="{{-- asset('/plugins/jquery/jquery.min.js') --}}"></script>
        {{-- <!-- Bootstrap 4 --> --}}
        <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        {{-- <!-- DataTables  & Plugins --> --}}
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        {{-- <!-- AdminLTE App --> --}}
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        {{-- <!-- AdminLTE for demo purposes --> --}}
        <script src="{{asset('dist/js/demo.js')}}"></script>
        <!-- Page specific script -->
        <!-- InputMask -->
        <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
        {{-- End DataTable Links scripts --}} 
     
        {{-- <!-- Bootstrap --> --}}
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        {{-- <!-- overlayScrollbars --> --}}
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        {{-- <!-- AdminLTE App --> --}}
        <script src="{{ asset('dist/js/adminlte.js')}}"></script>
        
        {{-- <!-- PAGE PLUGINS --> --}}
        {{-- <!-- jQuery Mapael --> --}}
        <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
        <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
        {{-- <!-- ChartJS --> --}}
        <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
        {{-- <!-- AdminLTE for demo purposes --> --}}
        <script src="{{ asset('dist/js/demo.js')}}"></script>
        {{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) --> --}}
    
        {{-- <!-- Select2 --> --}}
        <script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
        {{-- <!-- date-range-picker --> --}}
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    
        {{-- product --}}
    
        {{-- ./product --}}
        
        @yield("script")
        <script type="text/javascript">
            $( document ).ready(function() {
        
        
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
          
                    //   open model
                $("#createNewCustomer").click(function() {
                    $("#customer_id").val('');
                    $("#customerForm").trigger('reset');
                    $("#modalHeading").html('Add Customer');
                    $("#ajaxModel").modal('show');
                });
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
          
                    //   close
                $("#addCustomer_menu").click(function() {
                    $("#createNewCustomer").click();
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
                        //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        
         
                
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
           
             
                // side menu toggle
                $(".nav-sidebar li").click(function(){
                    var getid = $(this).attr("id");
                    $('#'+getid).toggleClass("menu-is-opening menu-open");
                });
                // close
        
                // sidebar close
                $(".navbar-nav .arrow").click(function(){
                    $("body").toggleClass("sidebar-collapse");
                });        
             
                $('#CityID').select2({
                    multiple:true
                });
                $('#CityID').find(':selected').data('custom-attribute');
             
                $('#customerName').select2({
                    multiple:true
                });
                $('#customerName').find(':selected').data('custom-attribute');
              
                $('#productName').select2({
                    multiple:true
                });
                // start price papulate
                     
                //.price papulate end
                
              
                $(document).on("click", ".record .delete", function() {
                    //check row length
                    // if($("#tab_logic tbody tr").length === 1){
                    //      $(".delete").prop('disabled' , true).addClass('disabled');
                    // }
                    // console.log($("#myTable2 tbody tr").length);
                    // });
        
                    //check row length
                    var getid = $(this).attr("id");
                    var num= getid.substr(getid.indexOf("-") + 1);
                    
                    $("#row-"+(num)).html('');
                    //
                   
                    //
                    calc();
                });
                
                $('#tab_logic tbody').on('keyup change',function(){
                    calc();
                });
                $('#tax').on('keyup change',function(){
                    calc_total();
                });
               
                function calc()
                {
                    $('#tab_logic tbody tr').each(function(i, element) {
                        var html = $(this).html();
                        if(html!='')
                        {
                            var qty = $(this).find('.qty').val();
                            var price = $(this).find('.price').val();
                            $(this).find('.total').val(qty*price);
                            
                            calc_total();
                        }
                    });
                }
        
                function calc_total()
                {
                    total=0;
                    $('.total').each(function() {
                        total += parseInt($(this).val());
                    });
                    $('#sub_total').val(total.toFixed(2));
                    tax_sum=total/100*$('#tax').val();
                    $('#tax_amount').val(tax_sum.toFixed(2));
                    $('#total_amount').val((tax_sum+total).toFixed(2));
                }
        
            // Dynamic row add in table
            

               
            });
               
        
                    //  get product price
                    $(document).on('change', "#tab_logic select", function() {
                        // check for the row length
                        //get 'id' from select tag    //   
                        var getid = $(this).attr("id");
                        var num= getid.substr(getid.indexOf("-") + 1);
                        //get value from option
                        var price =$(this).find('option:selected').attr('price');
                        //assign value in dynamic id
                        $("#price-"+num).val(price);
                    });
                

                
        </script>

        <script src="{{ asset('dist/js/custom.js') }}"></script>
    
        
      </div>
    </body>
    </html>
</footer>
{{-- end footer --}}

{{-- end side bar --}}



    {{-- nav bar end --}}