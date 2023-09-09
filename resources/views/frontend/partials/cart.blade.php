@extends('frontend.layouts.master')
@section('content')
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            .table > tbody > tr > td, .table > tfoot > tr > td {
                vertical-align: middle;
            }

            @media screen and (max-width: 600px) {
                table#cart tbody td .form-control {
                    width: 20%;
                    display: inline !important;
                }

                .actions .btn {
                    width: 36%;
                    margin: 1.5em 0;
                }

                .actions .btn-info {
                    float: left;
                }

                .actions .btn-danger {
                    float: right;
                }

                table#cart thead {
                    display: none;
                }

                table#cart tbody td {
                    display: block;
                    padding: .6rem;
                    min-width: 320px;
                }

                table#cart tbody tr td:first-child {
                    background: #333;
                    color: #fff;
                }

                table#cart tbody td:before {
                    content: attr(data-th);
                    font-weight: bold;
                    display: inline-block;
                    width: 8rem;
                }


                table#cart tfoot td {
                    display: block;
                }

                table#cart tfoot td .btn {
                    display: block;
                }

            }
        </style>
    </head>
    <div style="position:relative; width:100%; height:200px;">
        <img alt=""
             src="https://img.freepik.com/free-vector/healthcare-medical-blue-background-banner_1017-20041.jpg?w=1380&t=st=1681199139~exp=1681199739~hmac=1c5f3e90df96130377f8ab0f067cdd3ad41188e3b8ee2f49d9bd6c0396fd34cb"
             style="width: 100%; height: 150%; object-fit: cover;">
        <span
            style="position:absolute; top:70%; left:50%; transform: translateX(-50%); color:#ffffff; font-size: 54px; font-weight:bold; text-align: center; z-index: 1;">Cart</span>
        <div
            style="position: absolute; width: 100%; height: 150%; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 0;"></div>
    </div>
    <div class="container" style="padding-top: 200px">
        @if(session('success'))
            <div class="alert alert-success alert-dismissable pt-md-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
        @endif
        @include('frontend.partials._msg')
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            @if(session('cart') && count(session('cart')) > 0)
                <!-- Display the table rows for each product in the cart -->
            @else
                <tr>
                    <td colspan="5" style="font-weight: bold; color: #c10797">Please Add Product first Your Cart is Empty.</td>
                </tr>
            @endif
            </thead>
            <tbody>
            @php $total = 0; @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $product)
                    @php $total += $product['price'] * $product['qty'] @endphp
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="{{ asset($product['image']) }}"
                                                                     alt="{{ $product['name'] }}"
                                                                     class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">{{ $product['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $product['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="{{ $product['qty'] }}"
                                   onchange="updateCart({{ $id }}, this.value)">
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $product['price'] * $product['qty'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="removeItem({{ $id }})"><i
                                    class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total: ${{ $total }}</strong></td>
            </tr>
            <tr>
                <td><a href="{{ route('medical-equipment')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                        Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                <td>
                    @if(session('cart') && count(session('cart')) > 0)
                        <a href="{{ route('checkout') }}" class="btn btn-success btn-block">Proceed To Checkout <i class="fa fa-angle-right"></i></a>
                    @else
                       <a href="{{ route('medical-equipment')}}" class="btn btn-danger btn-block">No products in the cart <i class="fa fa-angle-left">
                    @endif
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('scripts')


    <script>
        $(document).ready(function () {
            $(".qty").on("change", function () {
                var id = $(this).data("id");
                var qty = $(this).val();
                updateCart(id, qty);
            });
        });

        function updateCart(id, qty) {
            $.ajax({
                url: "{{ url('update-cart') }}",
                method: "PATCH",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    qty: qty
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }


        function removeItem(id) {
            $.ajax({
                url: "{{ url('remove-from-cart') }}",
                method: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    </script>

@endsection
