@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('backend/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/media-uploader.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">About Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('admin.partials._msg')

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.general.message') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="message_heading_one">About Heading One</label>
                                    <input type="text" name="message_heading_one"
                                        class="form-control  {{ $errors->has('message_heading_one') ? 'is-invalid' : '' }}"
                                        id="message_heading_one" value="{{ get_static_option('message_heading_one') }}"
                                        placeholder="Enter Message Heading One">
                                    @error('message_heading_one')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message_heading_two">About Heading Two</label>
                                    <input type="text" name="message_heading_two"
                                        class="form-control  {{ $errors->has('message_heading_two') ? 'is-invalid' : '' }}"
                                        id="message_heading_two" value="{{ get_static_option('message_heading_two') }}"
                                        placeholder="Enter Message Heading Two">
                                    @error('message_heading_two')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message_heading_three">About company Paragraph</label>
                                    <textarea name="message_heading_three" id="message_heading_three" rows="4"
                                              class="form-control  {{ $errors->has('message_heading_three') ? 'is-invalid' : '' }}"
                                              placeholder="Enter Your company portfolio Detail">{{ get_static_option('message_heading_three') }}</textarea>
                                    @error('message_heading_three')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message_btn_txt">Message Button Text</label>
                                    <input type="text" name="message_btn_txt"
                                        class="form-control  {{ $errors->has('message_btn_txt') ? 'is-invalid' : '' }}"
                                        id="message_btn_txt" value="{{ get_static_option('message_btn_txt') }}"
                                        placeholder="Enter Message Button Text">
                                    @error('message_btn_txt')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_white_logo"><strong>{{__('Message Background Image')}}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $message_img = get_attachment_image_by_id(get_static_option('message_background_image'), null, true);
                                                $message_image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($message_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                src="{{ $message_img['img_url'] }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $message_image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="message_background_image" name="message_background_image"
                                            value="{{ get_static_option('message_background_image') }}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                            data-btntitle="Select Site Logo Image" data-modaltitle="Upload Message Background Image"
                                            data-toggle="modal" data-target="#media_upload_modal">
                                            {{ __($message_image_btn_label) }}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="site_white_logo"><strong>{{__('Message Background Image')}}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $message_img1 = get_attachment_image_by_id(get_static_option('message_background_image1'), null, true);
                                                $message_image_btn_label1 = 'Upload Image';
                                            @endphp
                                            @if (!empty($message_img1))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                 src="{{ $message_img1['img_url'] }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $message_image_btn_label1 = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="message_background_image1" name="message_background_image1"
                                               value="{{ get_static_option('message_background_image1') }}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="Select Site Logo Image" data-modaltitle="Upload Message Background Image"
                                                data-toggle="modal" data-target="#media_upload_modal">
                                            {{ __($message_image_btn_label1) }}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="site_white_logo"><strong>{{__('Message Background Image')}}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $message_img2 = get_attachment_image_by_id(get_static_option('message_background_image2'), null, true);
                                                $message_image_btn_label2 = 'Upload Image';
                                            @endphp
                                            @if (!empty($message_img2))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                 src="{{ $message_img2['img_url'] }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $message_image_btn_label2 = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="message_background_image2" name="message_background_image2"
                                               value="{{ get_static_option('message_background_image2') }}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="Select Site Logo Image" data-modaltitle="Upload Message Background Image"
                                                data-toggle="modal" data-target="#media_upload_modal">
                                            {{ __($message_image_btn_label2) }}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update SMTP Settings</button>
                            </div>
                            {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    @include('admin.partials.media-upload.media-upload-markup')
@endsection
@section('scripts')
    <!-- dropzonejs -->
    @include('admin.partials.media-upload.media-js')
    <script>
        $(function() {
            bsCustomFileInput.init();

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // DropzoneJS Demo Code End
    </script>
@endsection

