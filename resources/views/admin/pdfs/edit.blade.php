@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('service.index')}}">Service List</a></li>
                        <li class="breadcrumb-item active">Add New</li>
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
                            <h3 class="card-title">Update PDF </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::model($pdf, ['method' => 'PATCH','route' => ['pdf.update', $pdf->id],'class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Upload PDF</label>
                                <div class="col-sm-4">
                                    {{ Form::file('pdf_file', ['class' => 'form-control', 'id' => 'pdf_file', 'placeholder' => 'Add PDF']) }}
                                    <span class="text-danger">{{ $errors->first('pdf_file') }}</span>
                                    <div class="clearfix"></div>
                                    @if ($pdf->pdf_path)
                                        <div>
                                            <a href="{{ asset('uploads/product/' . $pdf->pdf_path) }}" target="_blank">View PDF</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('pdf.edit', $pdf->id) }}">Replace PDF</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('service.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            bsCustomFileInput.init();

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // DropzoneJS Demo Code End
    </script>
@endsection
