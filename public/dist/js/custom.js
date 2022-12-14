$( document ).ready(function() {
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
            
});