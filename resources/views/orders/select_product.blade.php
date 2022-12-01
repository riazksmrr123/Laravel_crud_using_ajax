<div class="form-group">
    <label for="name">Name</label>
    <select class="form-control select2-multiple" name="productName" id="productName"
        multiple="multiple" required>
        <optgroup label="Select Product">
            @foreach ($products as $product)
                <option value={{ $product->id }}>{{ $product->name }}</option> --}}
            @endforeach
        </optgroup>
    </select>
</div>

{{--  --}}
<div class="form-group">
    <label for="sale_price">Price</label>
    <input type="text" class="form-control" name="price" id="price">
</div>
<div class="form-group">
    <label for="description">Quantity</label>
    <input type="text" class="form-control" name="quantity" id="quantity"
        placeholder="Eenter Quantity">
</div>
</div>