<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <style>
        h2{
            text-align:center;
            padding: 20px;
        }
        /* Slider */

        .slick-slide {
            margin: 0px 02px;
        }

        /*.slick-slide img {*/
        /*    width: 100%;*/
        /*    height:100%;*/
        /*}*/

        .slick-slider
        {
            position: relative;
            display: block;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list
        {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        .slick-list:focus
        {
            outline: none;
        }
        .slick-list.dragging
        {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list
        {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .slick-track
        {
            position: relative;
            top: 0;
            left: 0;
            display: block;
        }
        .slick-track:before,
        .slick-track:after
        {
            display: table;
            content: '';
        }
        .slick-track:after
        {
            clear: both;
        }
        .slick-loading .slick-track
        {
            visibility: hidden;
        }

        .slick-slide
        {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
        }
        [dir='rtl'] .slick-slide
        {
            float: right;
        }
        .slick-slide img
        {
            display: block;
        }
        .slick-slide.slick-loading img
        {
            display: none;
        }
        .slick-slide.dragging img
        {
            pointer-events: none;
        }
        .slick-initialized .slick-slide
        {
            display: block;
        }
        .slick-loading .slick-slide
        {
            visibility: hidden;
        }
        .slick-vertical .slick-slide
        {
            display: block;
            height: auto;
            border: 1px solid transparent;
        }
        .slick-arrow.slick-hidden {
            display: none;
        }
    </style>
</head>
<div class="container">
    <h2 class="font_2" style="font-size: 25px; text-align: center;"><span
            style="font-size:25px;"><span style="font-weight:bold"><span
                    style="font-family:raleway-semibold,raleway,sans-serif;color: #0B3259">Services</span></span></span><br>
        &nbsp;
    </h2>
    <section class="customer-logos slider">
        @php
            $message_img = get_attachment_image_by_id(get_static_option('message_background_image'), null, true);
            $message_img1 = get_attachment_image_by_id(get_static_option('message_background_image1'), null, true);
            $message_img2 = get_attachment_image_by_id(get_static_option('message_background_image2'), null, true);
        @endphp
        <div class="slide"><img src="{{ $message_img['img_url'] }}" style="max-width: 100%; height: auto;"></div>
        <div class="slide"><img src="{{ $message_img1['img_url'] }}" style="max-width: 100%; height: auto;"></div>
        <div class="slide"><img src="{{ $message_img2['img_url'] }}" style="max-width: 100%; height: auto;"></div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1
                }
            }]
        });
    });
</script>
