<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>Name</td>
            <td>{{$product->name}}</td>
        </tr>
{{--        <tr>--}}
{{--            <td>Image</td>--}}
{{--            <td>{{$product->image}}</td>--}}
{{--        </tr>--}}
        <tr>
            <td>Description</td>
            <td>{{$product->description}}</td>
        </tr>
        <tr>
            <td>Paragraph</td>
            <td>{{$product->paragraph}}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>{{$product->price}}</td>
        </tr>
        <tr>
            <td>Original Price</td>
            <td>{{$product->original_price}}</td>
        </tr>
        <tr>
            <td>Discount</td>
            <td>{{$product->discount}}</td>
        </tr>
        <tr>
            <td>Price Save after Discount</td>
            <td>{{$product->p_save}}</td>
        </tr>
        <tr>
            <td>Product Sku</td>
            <td>{{$product->sku}}</td>
        </tr>
        <tr>
            <td>Availability</td>
            <td>{{$product->availability}}</td>
        </tr>
        <tr>
            <td>Selected Color</td>
            <td>{{$product->color}}</td>
        </tr>
        <tr>
            <td>Selected Size</td>
            <td>{{$product->size}}</td>
        </tr>
        <tr>
            <td>Product Quantity</td>
            <td>{{$product->qty}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                @if($product->active)
                    <span class="btn btn-sm btn-success">Active</span>
                @else
                    <span class="btn btn-sm btn-warning">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$product->created_at}}</td>
        </tr>

        </tbody>
    </table>
</div>
