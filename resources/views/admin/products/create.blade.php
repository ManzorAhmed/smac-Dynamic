@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('service.index')}}">Products List</a></li>
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
                            <h3 class="card-title">Create Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open([ 'route' => 'product.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Upload Image</label>
                                <div class="col-sm-4">
                                    {{ Form::file('image', null, ['class' => 'form-control','id'=>'image','placeholder'=>'Add Image']) }}
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name"
                                       class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       id="name" value="{{ get_static_option('name') }}"
                                       placeholder="Enter Your Product Heading ">
                                @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <textarea name="description" id="description"
                                          class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                          placeholder="Enter Your description Detail"></textarea>
                                @error('description')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Paragraph">Product Paragraph</label>
                                <textarea name="Paragraph" id="Paragraph"
                                          class="form-control  {{ $errors->has('Paragraph') ? 'is-invalid' : '' }}"
                                          placeholder="Enter Your Paragraph Detail"></textarea>
                                @error('Paragraph')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       <div class ="card-body">
                           <div class="form-group">
                               <label for="price">Product Price</label>
                               <input type="number" name="price" id="price" min="0"  value="{{ old('price') }}"
                                      class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                      placeholder="Enter Product Price Here" />
                               @error('price')
                               <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div class ="card-body">
                           <div class="form-group">
                               <label for="original_price">Original Price</label>
                               <input type="number" name="original_price" id="original_price" min="0"  value="{{ old('original_price') }}"
                                      class="form-control {{ $errors->has('original_price') ? 'is-invalid' : '' }}"
                                      placeholder="Enter Product Original Price Here" />
                               @error('original_price')
                               <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div class ="card-body">
                           <div class="form-group">
                               <label for="discount">Discount</label>
                               <input type="number" name="discount" id="discount" min="0"  value="{{ old('discount') }}"
                                      class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                                      placeholder="Enter Product Discount Price Here" />
                               @error('discount')
                               <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div class ="card-body">
                           <div class="form-group">
                               <label for="save">Save Price</label>
                               <input type="number" name="p_save" id="p_save" min="0"  value="{{ old('p_save') }}"
                                      class="form-control {{ $errors->has('p_save') ? 'is-invalid' : '' }}"
                                      placeholder="Enter Product Save Price Here" />
                               @error('p_save')
                               <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>
                           <div class="form-group">
                               <label for="sku">SKU</label>
                               <input type="text" name="sku" id="sku" min="0"  value="{{ old('sku') }}"
                                      class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}"
                                      placeholder="Enter Product SKU Here Example(SKU-078)  " />
                               @error('sku')
                               <span class="error invalid-feedback">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                        <div class ="card-body">
                            <div class="form-group">
                                <label for="availability">Select Availability</label>
                                <select name="availability" class="form-control" id="availability">
                                    <option value="">-- Select Availability --</option>
                                    @foreach(['in_stock', 'out_of_stock'] as $availability)
                                        <option value="{{ $availability }}" {{ old('availability') == $availability ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $availability)) }}</option>
                                    @endforeach
                                </select>
                                @error('availability')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class ="card-body">
                            <div class="form-group">
                                <label for="availability">Choose Color</label>
                                <select name="color" class="form-control" id="availability">
                                    <option value="">-- Choose Color --</option>
                                    @foreach(['blue', 'white','black'] as $color)
                                        <option value="{{ $color }}" {{ old('color') == $color ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $color)) }}</option>
                                    @endforeach
                                </select>
                                @error('color')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class ="card-body">
                            <div class="form-group">
                                <label for="size">Choose Size</label>
                                <select name="size" class="form-control" id="availability">
                                    <option value="">-- Select Size --</option>
                                    @foreach(['small', 'medium','large'] as $size)
                                        <option value="{{ $size }}" {{ old('size') == $size ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $size)) }}</option>
                                    @endforeach
                                </select>
                                @error('size')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="qty">Product Quantity</label>
                                <input type="number" name="qty" id="qty" min="1" value="{{ old('qty', 1) }}"
                                       class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}"
                                       placeholder="Enter Product Quantity Here" />
                                @error('qty')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="active">Active</label>
                            <div>
                                <input type="checkbox" name="active" id="active" checked data-bootstrap-switch
                                       data-off-color="danger" data-on-color="success">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-footer">
                                <a href="{{ route('product.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    {{ Form::close() }}
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

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
