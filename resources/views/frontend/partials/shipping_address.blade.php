@extends('frontend.layouts.master')
@section('content')
    <div class="col-md-8 order-md-1">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif
        <h4 style="display: inline-block; border-bottom: 2px solid #e80c20; line-height: 0.1em; margin: 10px 0 20px; width: 100%;"></h4>
        <h4 class="mb-3" style="text-align: center;color: #e80c20; font-weight: bold">Shipping Address</h4>
        <div style="text-align: center;">
            <h4 style="display: inline-block; border-bottom: 2px solid #e80c20; line-height: 0.1em; margin: 10px 0 20px; width: 100%;"></h4>
        </div>
        <form class="needs-validation" novalidate method="POST" action="{{ route('checkout') }}">
            @csrf
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
                <label for="email"> Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" value="">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
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
                    <input type="text" class="form-control" id="zip" placeholder="" required>
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
@endsection
<script type="text/javascript">
    $('.shipping_form_checkbox').click(function () {
        if ($('.custom-control-input').is(":checked")) {
            $('#shipping_form').hide();
        } else {
            $('#shipping_form').show();
        }
    });
</script>
