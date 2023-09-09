<!DOCTYPE html>
<html lang="zxx">

<head>
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
    @include('frontend.partials.head')
    @include('frontend.partials.shophead')

</head>

<body>
@include('frontend.partials.slider')
@include('frontend.partials.message')
@include('frontend.partials.service')
{{--@include('frontend.partials.gallery')--}}

<!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
</div>

{{--<!-- Header Section Begin -->--}}
{{--    <header class="header-section">--}}
{{--        <div class="container">--}}
{{--            <div class="logo">--}}
{{--                <a href="./index.html">--}}
{{--                    @if (!empty(get_static_option('site_logo')))--}}
{{--                        {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}--}}
{{--                    @else--}}
{{--                        <img src="{{ asset('frontend/img/logo.png') }}" alt="">--}}
{{--                    @endif--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
{{--<!-- Header End -->--}}




@include('frontend.partials.footer')
<!-- Footer Section End -->
@include('frontend.partials.scripts')
</body>

</html>
