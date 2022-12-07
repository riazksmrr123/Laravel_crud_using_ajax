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
        var i=2;
        $("#add_row").click(function(){
            b=i-1;
            $('#row-'+i).html($('#row-'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append(`<tr id="row-`+i+`">
                
                                    <td>`+i+`</td>
                                    <td><select type="text" name='product[]' id="productList-`+i+`"
                                            placeholder='Enter Product Name' class="form-control">
                                            <option>Choose Product</option>
                                            @foreach ($products as $product)
                                            <option value={{ $product->id }} price={{ $product->price }}>{{ $product->name }}</option>
                                            @endforeach
                                            </select>
                                    </td>
                                    <td><input type="number" name='quantity[]' placeholder='Enter Qty'
                                            class="form-control qty" step="0"
                                            min="0" /></td>
                                    <td><input type="text" name='price[]' id="price-`+i+`"
                                            placeholder='Enter Unit Price'
                                            class="form-control price" step="0.00"
                                            min="0" /></td>
                                    <td><input type="number" name='total[]' placeholder='0.00'
                                            class="form-control total" readonly /></td>
                                    <td><a id="delete_row-`+i+`" class="btn btn-danger delete">Delete
                                        Row</a></td>
                                </tr>`);
            i++; 
        });
      
        $(document).on("click", ".record .delete", function() {
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

        //
       
            });
       

            //  get product price
            $(document).on('change', "#tab_logic select", function() {
                //get 'id' from select tag    //   
                var getid = $(this).attr("id");
                var num= getid.substr(getid.indexOf("-") + 1);
                //get value from option
                var price =$(this).find('option:selected').attr('price');
                //assign value in dynamic id
                $("#price-"+num).val(price);
            });
        
        
</script>