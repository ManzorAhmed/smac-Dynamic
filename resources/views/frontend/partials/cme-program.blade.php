@extends('frontend.layouts.master')
@section('content')
    @php
        $service=\App\Models\Service::get();
    @endphp
    <style>
        .container.mt-40.mb-30 {
            margin-top: 98px;
        }
        /*********************** Demo - 1 *******************/
        .box1 img, .box1:after, .box1:before {
            width: 100%;
            transition: all .3s ease 0s
        }

        .box1 .icon, .box2, .box3, .box4, .box5 .icon li a {
            text-align: center
        }

        .box10:after, .box10:before, .box1:after, .box1:before, .box2 .inner-content:after, .box3:after, .box3:before, .box4:before, .box5:after, .box5:before, .box6:after, .box7:after, .box7:before {
            content: ""
        }

        .box1, .box11, .box12, .box13, .box14, .box16, .box17, .box18, .box2, .box20, .box21, .box3, .box4, .box5, .box5 .icon li a, .box6, .box7, .box8 {
            overflow: hidden
        }

        .box1 .title, .box10 .title, .box4 .title, .box7 .title {
            letter-spacing: 1px
        }

        .box3 .post, .box4 .post, .box5 .post, .box7 .post {
            font-style: italic
        }

        body {
            background-color: #f1f1f2
        }

        .mt-30 {
            margin-top: 30px
        }

        .mt-40 {
            margin-top: 40px
        }

        .mb-30 {
            margin-bottom: 30px
        }

        /*********************** Demo - 2 *******************/

        @media only screen and (max-width: 990px) {
            .box20 {
                margin-bottom: 30px
            }
        }

        @media only screen and (max-width: 479px) {
            .box20 .title {
                font-size: 20px
            }
        }

        /*********************** Demo - 21 *******************/
        .box21 {
            text-align: center;
            position: relative
        }

        .box21:after, .box21:before {
            content: "";
            width: 2px;
            height: 2px;
            border-radius: 50%;
            background: rgba(184, 11, 196, 0.35);
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0)
        }

        .box21:hover:after, .box21:hover:before {
            -webkit-transform: scale(400);
            -moz-transform: scale(400);
            -ms-transform: scale(400);
            -o-transform: scale(400);
            transform: scale(400)
        }

        .box21:before {
            -o-transition: all .5s linear .3s;
            -moz-transition: all .5s linear .3s;
            -ms-transition: all .5s linear .3s;
            -webkit-transition: all .5s linear .3s;
            transition: all .5s linear .3s
        }

        .box21:hover:before {
            -moz-transition-delay: 0s;
            -webkit-transition-delay: 0s;
            -o-transition-delay: 0s;
            -ms-transition-delay: 0s;
            transition-delay: 0s
        }

        .box21:after {
            -o-transition: all .5s linear .6s;
            -moz-transition: all .5s linear .6s;
            -ms-transition: all .5s linear .6s;
            -webkit-transition: all .5s linear .6s;
            transition: all .5s linear .6s
        }

        .box21:hover:after {
            -moz-transition-delay: .2s;
            -webkit-transition-delay: .2s;
            -o-transition-delay: .2s;
            -ms-transition-delay: .2s;
            transition-delay: .2s
        }

        .box21 img {
            width: 100%;
            height: auto
        }

        .box21 .box-content {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: 0 0;
            color: #fff;
            padding-top: 25px;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
            -ms-transition: all .3s linear 0s;
            -o-transition: all .3s linear 0s;
            -webkit-transition: all .3s linear 0s;
            -moz-transition: all .3s linear 0s;
            transition: all .3s linear 0s;
            z-index: 1
        }

        .box21:hover .box-content {
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
            -moz-transition-delay: .4s;
            -webkit-transition-delay: .4s;
            -o-transition-delay: .4s;
            -ms-transition-delay: .4s;
            transition-delay: .4s
        }

        .box21 .title {
            font-size: 21px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 1px solid #fff;
            padding-bottom: 20px;
            margin-top: 20px
        }

        .box21 .description {
            font-size: 14px;
            font-style: italic;
            padding: 0 10px;
            margin: 15px 0
        }

        .box21 .read-more {
            display: block;
            width: 120px;
            background: #178993;
            border-radius: 5px;
            font-size: 14px;
            color: #fff;
            text-transform: capitalize;
            padding: 10px 0;
            margin: 0 auto
        }

        @media only screen and (max-width: 990px) {
            .box21 {
                margin-bottom: 30px
            }
        }

        @media only screen and (max-width: 479px) {
            .box21 .box-content {
                padding-top: 0
            }
        }

        @media only screen and (max-width: 359px) {
            .box21 .title {
                padding-bottom: 10px
            }
        }

    </style>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <div style="position:relative; width:100%; height:200px;">
        <img alt=""
             src="https://img.freepik.com/free-vector/healthcare-medical-blue-background-banner_1017-20041.jpg?w=1380&t=st=1681199139~exp=1681199739~hmac=1c5f3e90df96130377f8ab0f067cdd3ad41188e3b8ee2f49d9bd6c0396fd34cb"
             style="width: 100%; height: 150%; object-fit: cover;">
        <span
            style="position:absolute; top:70%; left:50%; transform: translateX(-50%); color:#ffffff; font-size: 54px; font-weight:bold; text-align: center; z-index: 1;">CONTINUING MEDICAL EDUCATION</span>
        <div
            style="position: absolute; width: 100%; height: 150%; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 0;"></div>
    </div>

    <div class="container mt-40 mb-30">
        <h2 class="font_1" style="font-size: 25px; text-align: center;"><span
                style="font-size:25px;"><span style="font-weight:bold"><span
                        style=" margin-top:80px; font-family:raleway-semibold,raleway,sans-serif;color: #0B3259">CME PROGRAMS</span></span></span><br>
            &nbsp;
        </h2>
        @foreach($service as $r)
            <div class="col-md-4 col-sm-6">
                <div class="box21">
                    <img class="pic-1" src="{{asset('uploads/gallery/'.$r->image)}}">
                    <h2 class="font_1" style="font-size: 25px; text-align: center;"><span
                            style="font-size:25px;"><span style="font-weight:bold"><span
                                    style="font-family:raleway-semibold,raleway,sans-serif;color: #0B3259">{{$r->name}}</span></span></span><br>
                        &nbsp;
                    </h2>
                    <div class="box-content">
                        <h4 class="title">{{$r->name}}</h4>
                        {{--                    <p class="description">{{$r->paragraph}}</p>--}}
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#myModal-{{$r->id}}">
                            Read more
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal-{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{$r->name}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>{{$r->paragraph}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
@endsection




