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
                    <h1>Footer Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Footer Settings</li>
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
                            <h3 class="card-title">Footer Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.general.footer') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="footer_heading_one">Footer Company Info</label>
                                    <textarea name="footer_heading_one" id="footer_heading_one"
                                              class="form-control  {{ $errors->has('footer_heading_one') ? 'is-invalid' : '' }}"
                                              placeholder="Enter Your company Detail">{{ get_static_option('footer_heading_one') }}</textarea>
                                    @error('footer_heading_one')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_btn_txt">Footer Button Text</label>
                                    <input type="text" name="footer_btn_txt"
                                        class="form-control  {{ $errors->has('footer_btn_txt') ? 'is-invalid' : '' }}"
                                        id="footer_btn_txt" value="{{ get_static_option('footer_btn_txt') }}"
                                        placeholder="Enter Footer Button Text">
                                    @error('footer_btn_txt')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_btn_url">Footer Button Permalink/url</label>
                                    <input type="text" name="footer_btn_url"
                                           class="form-control  {{ $errors->has('footer_btn_url') ? 'is-invalid' : '' }}"
                                           id="footer_btn_url" value="{{ get_static_option('footer_btn_url') }}"
                                           placeholder="Place Your permalink/url Here">
                                    @error('footer_btn_url')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_ofc_location">Office Location</label>
                                    <input type="text" name="footer_ofc_location"
                                           class="form-control  {{ $errors->has('footer_ofc_location') ? 'is-invalid' : '' }}"
                                           id="footer_ofc_location" value="{{ get_static_option('footer_ofc_location') }}"
                                           placeholder="Place Your Office Location Here">
                                    @error('footer_ofc_location')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_ofc_phone">Phone No</label>
                                    <input type="text" name="footer_ofc_phone"
                                           class="form-control  {{ $errors->has('footer_ofc_phone') ? 'is-invalid' : '' }}"
                                           id="footer_ofc_phone" value="{{ get_static_option('footer_ofc_phone') }}"
                                           placeholder="Enter Your Phone No ">
                                    @error('footer_ofc_phone')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_ofc_phone_url">Phone url</label>
                                    <input type="text" name="footer_ofc_phone_url"
                                           class="form-control  {{ $errors->has('footer_ofc_phone_url') ? 'is-invalid' : '' }}"
                                           id="footer_ofc_phone_url" value="{{ get_static_option('footer_ofc_phone_url') }}"
                                           placeholder="Enter Phone no with tel:num ">
                                    @error('footer_ofc_phone_url')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_ofc_email">Email</label>
                                    <input type="text" name="footer_ofc_email"
                                           class="form-control  {{ $errors->has('footer_ofc_email') ? 'is-invalid' : '' }}"
                                           id="footer_ofc_email" value="{{ get_static_option('footer_ofc_email') }}"
                                           placeholder="Enter Your E-mail ">
                                    @error('footer_ofc_email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_ofc_email_url">E-mail url</label>
                                    <input type="text" name="footer_ofc_email_url"
                                           class="form-control  {{ $errors->has('footer_ofc_email_url') ? 'is-invalid' : '' }}"
                                           id="footer_ofc_email_url" value="{{ get_static_option('footer_ofc_email_url') }}"
                                           placeholder="Enter Email with mailto: mail ">
                                    @error('footer_ofc_email_url')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_nav_heading">Nav Heading</label>
                                    <input type="text" name="footer_nav_heading"
                                           class="form-control  {{ $errors->has('footer_nav_heading') ? 'is-invalid' : '' }}"
                                           id="footer_nav_heading" value="{{ get_static_option('footer_nav_heading') }}"
                                           placeholder="Enter Navbar Title ">
                                    @error('footer_nav_heading')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_nav_heading1">Menu 1</label>
                                    <input type="text" name="footer_nav_heading1"
                                           class="form-control  {{ $errors->has('footer_nav_heading1') ? 'is-invalid' : '' }}"
                                           id="footer_nav_heading1" value="{{ get_static_option('footer_nav_heading1') }}"
                                           placeholder="Enter Menu Name ">
                                    @error('footer_nav_heading1')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_nav_heading_url1">Menu Permalink/url</label>
                                    <input type="text" name="footer_nav_heading_url1"
                                           class="form-control  {{ $errors->has('footer_nav_heading_url1') ? 'is-invalid' : '' }}"
                                           id="footer_nav_heading_url1" value="{{ get_static_option('footer_nav_heading_url1') }}"
                                           placeholder="Enter Menu Name ">
                                    @error('footer_nav_heading_url1')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_nav_heading2">Menu 2</label>
                                    <input type="text" name="footer_nav_heading2"
                                           class="form-control  {{ $errors->has('footer_nav_heading2') ? 'is-invalid' : '' }}"
                                           id="footer_nav_heading2" value="{{ get_static_option('footer_nav_heading2') }}"
                                           placeholder="Enter Navbar Title ">
                                    @error('footer_nav_heading2')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="footer_nav_heading_url2">Menu Permalink/url</label>
                                        <input type="text" name="footer_nav_heading_url2"
                                               class="form-control  {{ $errors->has('footer_nav_heading_url2') ? 'is-invalid' : '' }}"
                                               id="footer_nav_heading_url2" value="{{ get_static_option('footer_nav_heading_url2') }}"
                                               placeholder="Enter Menu Name ">
                                        @error('footer_nav_heading_url2')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_nav_heading3">Menu 3</label>
                                        <input type="text" name="footer_nav_heading3"
                                               class="form-control  {{ $errors->has('footer_nav_heading3') ? 'is-invalid' : '' }}"
                                               id="footer_nav_heading3" value="{{ get_static_option('footer_nav_heading3') }}"
                                               placeholder="Enter Navbar Title ">
                                        @error('footer_nav_heading3')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_nav_heading_url3">Menu Permalink/url</label>
                                        <input type="text" name="footer_nav_heading_url3"
                                               class="form-control  {{ $errors->has('footer_nav_heading_url3') ? 'is-invalid' : '' }}"
                                               id="footer_nav_heading_url3" value="{{ get_static_option('footer_nav_heading_url3') }}"
                                               placeholder="Enter Menu Name ">
                                        @error('footer_nav_heading_url3')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_nav_heading4">Menu 4</label>
                                        <input type="text" name="footer_nav_heading4"
                                               class="form-control  {{ $errors->has('footer_nav_heading4') ? 'is-invalid' : '' }}"
                                               id="footer_nav_heading4" value="{{ get_static_option('footer_nav_heading4') }}"
                                               placeholder="Enter Navbar Title ">
                                        @error('footer_nav_heading4')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_nav_heading_url4">Menu Permalink/url</label>
                                        <input type="text" name="footer_nav_heading_url4"
                                               class="form-control  {{ $errors->has('footer_nav_heading_url4') ? 'is-invalid' : '' }}"
                                               id="footer_nav_heading_url4" value="{{ get_static_option('footer_nav_heading_url4') }}"
                                               placeholder="Enter Menu Name ">
                                        @error('footer_nav_heading_url4')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_nav_heading5">Menu 5</label>
                                        <input type="text" name="footer_nav_heading5"
                                               class="form-control  {{ $errors->has('footer_nav_heading5') ? 'is-invalid' : '' }}"
                                               id="footer_nav_heading5" value="{{ get_static_option('footer_nav_heading5') }}"
                                               placeholder="Enter Navbar Title ">
                                        @error('footer_nav_heading5')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_nav_heading_url5">Menu Permalink/url</label>
                                        <input type="text" name="footer_nav_heading_url5"
                                               class="form-control  {{ $errors->has('footer_nav_heading_url5') ? 'is-invalid' : '' }}"
                                               id="footer_nav_heading_url5" value="{{ get_static_option('footer_nav_heading_url5') }}"
                                               placeholder="Enter Menu Name ">
                                        @error('footer_nav_heading_url5')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="site_white_logo"><strong>{{__('Logo')}}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $logo_img = get_attachment_image_by_id(get_static_option('footer_background_image'), null, true);
                                                $logo_image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($logo_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb"
                                                                src="{{ $logo_img['img_url'] }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $logo_image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="footer_background_image" name="footer_background_image"
                                            value="{{ get_static_option('footer_background_image') }}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                            data-btntitle="Select Site Logo Image" data-modaltitle="Upload Message Background Image"
                                            data-toggle="modal" data-target="#media_upload_modal">
                                            {{ __($logo_image_btn_label) }}
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

