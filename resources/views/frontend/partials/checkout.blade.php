@extends('frontend.layouts.master')
@section('content')
    <style>
        .container-shadow {
            box-shadow: 0px -5px 10px 0px rgba(0, 0, 0, 0.5);
        }
    </style>
    <div style="position:relative; width:100%; height:200px;">
        <img alt=""
             src="https://img.freepik.com/free-vector/healthcare-medical-blue-background-banner_1017-20041.jpg?w=1380&t=st=1681199139~exp=1681199739~hmac=1c5f3e90df96130377f8ab0f067cdd3ad41188e3b8ee2f49d9bd6c0396fd34cb"
             style="width: 100%; height: 150%; object-fit: cover;">
        <span
            style="position:absolute; top:70%; left:50%; transform: translateX(-50%); color:#ffffff; font-size: 54px; font-weight:bold; text-align: center; z-index: 1;">Secure Checkout </span>
        <div
            style="position: absolute; width: 100%; height: 150%; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 0;"></div>
    </div>

    <div class="container container-shadow" style="padding-top: 150px">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif
        @if(session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        {{--        <div class="py-5 text-center">--}}

        {{--            <h2>Checkout form</h2>--}}
        {{--            <p class="lead">Please fill the Following Details for Payment.</p>--}}
        {{--        </div>--}}
        <form class="needs-validation" novalidate method="POST" action="{{ route('checkout') }}">
            @csrf
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-secondary badge-pill"
                              style=" background-color:#e80c20">Your Cart</span>
                        @if (is_countable($cart))
                            <span class="badge badge-secondary badge-pill" style="background-color:#e80c20"><i
                                    class="fa-shopping-cart"></i>{{ count($cart) }}</span>
                        @else
                            <span class="badge badge-secondary badge-pill" style="background-color:#e80c20"><i
                                    class="fa-shopping-cart"></i>0</span>
                        @endif
                    </h4>
                    <ul class="list-group mb-3">
                        @php $total = 0; @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $product)
                                @php $total += $product['price'] * $product['qty'] @endphp
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $product['name'] }}</h6>
                                        <small class="text-muted">{{ $product['qty'] }}
                                            x {{ $product['price'] }}</small>
                                    </div>
                                    <span class="text-muted">د.إ{{ $product['qty'] * $product['price'] }}</span>
                                </li>
                            @endforeach
                        @endif
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="#" style="color: #e80c20; font-weight: bold">Total (AED)</span>
                            <strong class="#" style="color: #e80c20"> د.إ{{ $total }}</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-8 order-md-1">
                    <h4 style="display: inline-block; border-bottom: 2px solid #e80c20; line-height: 0.1em; margin: 10px 0 20px; width: 100%;"></h4>
                    <h4 class="mb-3" style="text-align: center;color: #e80c20; font-weight: bold; font-size: 35px;">Billing Address</h4>
                    <div style="text-align: center;">
                        <h4 style="display: inline-block; border-bottom: 2px solid #e80c20; line-height: 0.1em; margin: 10px 0 20px; width: 100%;"></h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder=""
                                   value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder=""
                                   value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" >Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="company" >Company Name</label>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Enter Your Company Name" value="">
                        <div class="invalid-feedback">
                            Please enter a valid Company Name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" >Phone</label>
                        <input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="" value="">
                        <div class="invalid-feedback">
                            Valid phone is required.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                               placeholder="1234 Main St" value="" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" name="country" required>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" name="state" required>
                                @foreach ($states as $stateCode => $stateName)
                                    <option value="{{ $stateCode }}">{{ $stateName }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my
                            billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next
                            time</label>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment Method</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                   checked
                                   required>
                            <label class="custom-control-label" for="credit">Cash on delivery</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button type="submit" value="submit " class="btn btn-success float-right">Place Order Now</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2015-2023 SMAC</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">info@smacuae.com</a></li>

        </ul>
    </footer>
    </div>

    <hr class="mb-4">

    </form>

@endsection
