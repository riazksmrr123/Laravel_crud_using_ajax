    {{-- DataTable Links scpipts --}}
    
    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
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
    
    @include('layouts.function')
        {{-- end selct2 for product name in create order page --}}
  </div>
</body>
</html>