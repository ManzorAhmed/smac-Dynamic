<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <h1 class="text-center" style="font-weight: bold">Billing Address</h1>
        <tr>
            <td>Order No</td>
            <td>{{  $order->id }}</td>
        </tr>
        <tr>
            <td>First Name</td>
            <td>{{ $order->firstName }}</td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>{{ $order->lastName }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $order->email }}</td>
        </tr>
        <tr>
            <td>Address </td>
            <td>{{ $order->address }}</td>
        </tr>
        <tr>
            <td>Phone No </td>
            <td>{{ $order->phone_no }}</td>
        </tr>
        <tr>
            <td>Company Name </td>
            <td>{{ $order->company }}</td>
        </tr>
        <tr>
            <td>Country </td>
            <td>{{ $order->country }}</td>
        </tr>
        <td colspan="2">
            <h1 class="text-center" style="font-weight: bold">Product Details</h1>
        </td>
        @foreach ($order_items as $order_item)
            <tr>
                <td>Product Name</td>
                <td>{{ $order_item->name }}</td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>{{ $order_item->qty }}</td>
            </tr>
            <tr>
                <td>Product ID</td>
                <td>{{ $order_item->product_id }}</td>
            </tr>
            <tr>
                <td>Price</td>
                <td>{{ $order_item->price }}</td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td>{{ $order_item->total_price }}</td>
            </tr>
        @endforeach
        <tr>
            <td class="#" style="font-weight: bold; background-color: #ee610a; color: white">Grand Total</td>
            <td class="#" style="font-weight: bold; background-color: #ee610a;color: white">{{ $order->overall_total }}</td>
        </tr>
{{--        <td>--}}
{{--            @if ($order->payment_status == "pending")--}}
{{--                <span class="btn btn-warning">PENDING</span>--}}
{{--            @elseif ($order->payment_status == "cancelled")--}}
{{--                <span class="btn btn-danger">CANCELLED</span>--}}
{{--            @elseif ($order->payment_status == "completed")--}}
{{--                <span class="btn btn-success">COMPLETED</span>--}}
{{--            @endif--}}
{{--        </td>--}}
        <tr>
            <td>Created at</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        </tbody>
    </table>
</div>
