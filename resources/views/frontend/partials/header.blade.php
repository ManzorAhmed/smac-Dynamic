<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<nav>
    <div class="wrapper">
        <div class="logo"><a href="{{route('home')}}">
                @if (!empty(get_static_option('site_logo')))
                    {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                @else
                    <img src="{{ asset('frontend/img/logo.png') }}" alt="">
                @endif
            </a>
        </div>
        <input type="checkbox" id="menu-btn" />
        <label for="menu-btn" class="btn menu-btn">
            <i class="fas fa-bars"></i>
        </label>
        <ul class="nav-links">
            <label for="cancel-btn" class="btn cancel-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/>
                </svg>
            </label>
            <li><a href="#">Home</a></li>
            <li><a href="{{route('cme-program')}}">CME PROGRAM</a></li>
            <li class="dropdown">
                <a href="#" class="desktop-item">CME COURSE</a>
                <input type="checkbox" id="showDrop">
                <label for="showDrop" class="mobile-item">CME COURSE</label>
                <ul class="drop-menu">
                    <li><a href="https://eu.eventscloud.com/ereg/newreg.php?eventid=200249681">Negative Pressure
                            Wound Therapy</a></li>
                    <li><a href="https://eu.eventscloud.com/ereg/newreg.php?eventid=200249681">Basic Wound Care
                            Course</a></li>
                </ul>
            </li>
{{--            <li><a href="{{ $pdf_url }}" target="_blank">PDF FILE</a></li>--}}
            <li>
                <a href="{{route('medical-equipment')}}" class="desktop-item">Medical Equipments</a>
                <input type="checkbox" id="showMega">
                <label for="showMega" class="mobile-item">Medical Equipments</label>
                <div class="mega-box">
                    <div class="content">
                        <div class="row"><img src="{{asset('frontend/Product/images/product/PPE-102_1.jpg')}}"
                                              alt="imagen"></div>
                        <div class="row">
                            <header>Mask</header>
                            <ul class="mega-links">
                                <li><a href="#">Protective Masks</a></li>
                                <li><a href="#">Protective Masks</a></li>
                                <li><a href="#">Protective Masks </a></li>
                                <li><a href="#">Protective Masks </a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <header>Gloves</header>
                            <ul class="mega-links">
                                <li><a href="#">G1</a></li>
                                <li><a href="#">G2</a></li>
                                <li><a href="#">G3</a></li>
                                <li><a href="#">G4</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <header>Microcine</header>
                            <ul class="mega-links">
                                <li><a href="#">P1</a></li>
                                <li><a href="#">P2</a></li>
                                <li><a href="#">P3</a></li>
                                <li><a href="#">P4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="cart-icon">
                <a href="{{ route('cart') }}" style="background-color: #e7dce3">
                    <i class="fa fa-shopping-cart" style="font-size: 24px; color: #0961e2;"></i>
                    <span class="badge badge-pill badge-dark" style="background-color: #E80C20">
                        {{ count(session('cart', [])) }}
                         </span>
                </a>


                <input type="checkbox" id="showCart">
                <label for="showCart" class="mobile-item">Cart</label>
                <ul class="drop-menu"
                    style="color: #100d0d; background-color: #E7DCE3; font-size: 12px;font-family: 'Poppins', sans-serif">
                    @php
                        $total = 0;
                    @endphp
                    @if(session('cart'))

                        <div class="row">
                            <div class="col-md-12">
                                @php
                                    $total = 0;
                                    $count = 0;
                                    if(session()->has('cart')) {
                                        foreach(session('cart') as $id => $product) {
                                            $total += $product['price'] * $product['qty'];
                                            $count++;
                                        }
                                    }
                                @endphp
                                <a href="#" class="btn-primary" style="background-color: #0961e2">
                                    <i class="fa fa-shopping-cart" style="font-size: 24px; color: #bf510e;"></i>
                                    <span class="badge badge-secondary badge-pill"
                                          style="background-color:#ffffff">{{ $count }}</span>
                                </a>
                                <td>
                                    <a href="{{ route('cart')}}" class="btn btn-success btn-block">Proceed To
                                        Checkout
                                        <i class="fa fa-angle-right"></i></a>
                                </td>
                                <hr class="#"
                                    style="color: #c10797; margin-top: 3px; margin-bottom: 3px;  border-top: 2px solid #c10797;border-bottom: 1px solid #c10797;">
                            </div>
                        </div>
                        <div class="row">
                            @foreach(session('cart') as $id => $product)
                                @php $total += $product['price'] * $product['qty'] @endphp
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}"
                                                 width="60" height="60">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="item-details">
                                                <p class="#"
                                                   style="font-weight: bold;font-size: 16px;">{{ $product['name'] }}</p>
                                                <p class="#"
                                                   style="font-weight: bold;font-size: 16px; color: #0a53be;padding-bottom: -20px;">{{ $product['qty'] }}
                                                    x {{ $product['price'] }}</p>
                                            </div>
                                            <span class="text-muted"
                                                  style="color: white">د.إ{{ $product['qty'] * $product['price'] }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                        <li class="mini-cart-total">
                            <a href="{{ route('checkout') }}" style="background-color: #0961e2">
                                <button type="submit" class="badge badge-secondary badge-pill"
                                        style="font-weight: 600; font-size: 23px; color: #f5f1f2; background-color: #ee610a; border: none; outline: none;">
                                    Proceed To Checkout
                                </button>
                            </a>
                        </li>
                    @else
                        <li class="mini-cart-dropdown empty" style=" font-weight: bold; color: #c10797; font-family: Poppins; font-size: 15px">
                            Your cart is empty. There is no item in your cart.
                        </li>
                    @endif
                </ul>
            </li>
            <label for="menu-btn" class="btn menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
                </svg>
            </label>

        </ul>
    </div>
</nav>



