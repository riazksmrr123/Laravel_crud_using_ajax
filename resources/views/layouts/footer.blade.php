

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

        //   open model
          $("#createNewCustomer").click(function() {
              $("#customer_id").val('');
              $("#customerForm").trigger('reset');
              $("#modalHeading").html('Add Customer');
              $("#ajaxModel").modal('show');
          });

        //   
       
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
      });
    </script>
    {{-- DataTable Links scpipts --}}
    
    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
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
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
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
 
 
 
 
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- font awsome --}}
    <script src="https://kit.fontawesome.com/5c0658bf56.js" crossorigin="anonymous"></script>
    {{-- <!-- Select2 --> --}}
    <script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>



    {{-- end toast --}}

      <script>
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

        
      </script>

      {{-- select2 for Cities in customer form--}}

      <script>
        $('#CityID').select2({
            multiple:true
        });
        $('#CityID').find(':selected').data('custom-attribute');
      </script>
      {{-- end select2 for Cities in customer form--}}

      {{-- selct2 for customer name in create order page --}}
      <script>
        $('#customerName').select2({
            multiple:true
        });
        $('#customerName').find(':selected').data('custom-attribute');
      </script>
      {{-- end selct2 for customer name in create order page --}}

            {{-- selct2 for product name in create order page --}}
            <script>
                $('#productName').select2({
                    multiple:true
                });
                $('#productName').find(':selected').data('custom-attribute');
              </script>
              {{-- end selct2 for product name in create order page --}}
  </div>
</body>
</html>