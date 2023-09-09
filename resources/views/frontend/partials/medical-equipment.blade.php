@extends('frontend.layouts.master')
<head>
    <style>
        .products-grid .item {
            width: 22%;
            display: inline-block;
            vertical-align: top;
            box-sizing: border-box;
            /*padding: 10px;*/
        }


        /*.item {*/
        /*    flex: 1 1 240px;*/
        /*    margin: 4px;*/
        /*    width: 22%;*/
        /*}*/
    </style>
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMAC MEDICAL Equipment</title>
    <!-- Standard Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/bootstrap.min.css')}}">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/fontawesome.min.css')}}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/ionicons.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/animate.min.css')}}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/owl.carousel.min.css')}}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/jquery-ui-range-slider.min.css')}}">
    <!-- Utility -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/utility.css')}}">
    <!-- Main -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/bundle.css')}}">

    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <!-- Modernizr-JS -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/vendor/modernizr-custom.min.js')}}"></script>
    <!-- NProgress -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/nprogress.min.js')}}"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/bootstrap.min.js')}}"></script>
    <!-- Popper -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/popper.min.js')}}"></script>
    <!-- ScrollUp -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Elevate Zoom -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.elevatezoom.min.js')}}"></script>
    <!-- jquery-ui-range-slider -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery-ui.range-slider.min.js')}}"></script>
    <!-- jQuery Slim-Scroll -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.slimscroll.min.js')}}"></script>
    <!-- jQuery Resize-Select -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.resize-select.min.js')}}"></script>
    <!-- jQuery Custom Mega Menu -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.custom-megamenu.min.js')}}"></script>
    <!-- jQuery Countdown -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.custom-countdown.min.js')}}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/owl.carousel.min.js')}}"></script>
    <!-- Main -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/app.js')}}"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/newcss/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
@section('content')
    @php
        $product=\App\Models\Product::get();
    @endphp

    <body>
    <div class="page-style-a">
        <div class="container" style="padding-top: 50px">
            <div class="page-intro">
                <h2>Medical Equipment</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ route('medical-equipment')}}">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{ route('medical-equipment')}}">Medical
                            Equipment</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-maker" style="padding-top: 10px">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3"> Medical Distrubition Product </h3>
{{--                <ul class="nav tab-nav-style-1-a justify-content-center">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" data-toggle="tab" href="#men-latest-products">Latest Products</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">Best Selling</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" data-toggle="tab" href="#men-top-rating-products">Top Rating</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" data-toggle="tab" href="#men-featured-products">Featured Products</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="men-latest-products">
                            <div class="products-grid">
                                @foreach($product as $p)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link"
                                               href="{{ route('product_detail', ['id' => $p->id]) }}">
                                                <img class="img-fluid" src="{{asset('uploads/product/'.$p->image)}}"
                                                     alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
{{--                                                <a class="item-quick-look" data-toggle="modal" href="{{ route('product_detail', ['id' => $p->id]) }}">Quick--}}
{{--                                                    Look</a>--}}
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <p class="btn-holder"><a href="{{ url('add-to-cart/'.$p->id) }}"
                                                                         class="btn btn-warning btn-block text-center" role="button">Add to
                                                        cart</a></p>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
{{--                                                <ul class="bread-crumb">--}}
{{--                                                    <li class="has-separator">--}}
{{--                                                        <a href="shop-v1-root-category.html">M1</a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="has-separator">--}}
{{--                                                        <a href="shop-v2-sub-category.html">M2</a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="shop-v3-sub-sub-category.html">M3</a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
                                                <h6 class="item-title">
                                                    <a href="{{ route('product_detail', ['id' => $p->id]) }}">{{$p->name}}</a>
                                                </h6>
{{--                                                <div class="item-stars">--}}
{{--                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">--}}
{{--                                                        <span style='width:0'></span>--}}
{{--                                                    </div>--}}
{{--                                                    <span>(0)</span>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    د.إ{{$p->price}}
                                                </div>
                                                @if($p->discount > 0)
                                                    <div class="item-old-price">
                                                        د.إ{{$p->original_price}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>


@endsection




