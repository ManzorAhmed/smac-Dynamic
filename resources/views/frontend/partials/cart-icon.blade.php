@extends('frontend.layouts.master')
@section('content')
    <div class="mini-cart-dropdown"style="padding-top: 100px">
        <ul>
            @php $total = 0; @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $product)
                    @php $total += $product['price'] * $product['qty'] @endphp
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $product['name'] }}</h6>
                            <small class="text-muted">{{ $product['qty'] }} x {{ $product['price'] }}</small>
                        </div>
                        <span class="text-muted">د.إ{{ $product['qty'] * $product['price'] }}</span>
                    </li>
                @endforeach
            @endif
            <li class="mini-cart-total">
                <span>Subtotal:</span>
                <span>{{ $total }}</span>
            </li>
            <li>
                <a href="{{ route('cart') }}" class="btn btn-primary btn-sm">View Cart</a>
                <a href="{{ route('checkout') }}" class="btn btn-secondary btn-sm">Checkout</a>
            </li>
        </ul>
    </div>

@endsection
