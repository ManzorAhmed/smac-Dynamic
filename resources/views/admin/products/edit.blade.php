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
                            <h3 class="card-title">Update Service</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::model($product, ['method' => 'PATCH','route' => ['product.update', $product->id],'class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="col-sm-3 control-label">Upload Image</label>
                                <div class="col-sm-4">
                                    {{ Form::file('image', ['class' => 'form-control', 'id' => 'image', 'placeholder' => 'Add Image']) }}
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <div class="clearfix"></div>
                                    @if($product->image)
                                        <div>
                                            <img src="{{ asset('uploads/product/'.$product->image) }}"
                                                 style="height: 80px"/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name"
                                       class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       id="name"  value= "{{$product->name}}"
                                       placeholder="Update Your Product Name ">
                                @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <input type="text" name="description"
                                       class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                       id="name"  value= "{{$product->description}}"
                                       placeholder="Update Your Product Description ">
                                @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="paragraph">Product Paragraph</label>
                                <textarea name="paragraph" id="paragraph"
                                          class="form-control {{ $errors->has('paragraph') ? 'is-invalid' : '' }}"
                                          placeholder="Update Your Product Paragraph Detail">{{ $product->paragraph }}</textarea>
                                @error('paragraph')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input type="number" name="price"
                                       class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                       id="price"  value= "{{$product->price}}"
                                       placeholder="Update Your Product Price ">
                                @error('price')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="original_price">Original Price</label>
                                <input type="number" name="original_price"
                                       class="form-control  {{ $errors->has('original_price') ? 'is-invalid' : '' }}"
                                       id="original_price"  value= "{{$product->original_price}}"
                                       placeholder="Update Your Original Price ">
                                @error('original_price')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount"
                                       class="form-control  {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                                       id="discount"  value= "{{$product->discount}}"
                                       placeholder="Update Your Discount Price Here ">
                                @error('discount')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="discount">Save Price</label>
                                <input type="number" name="p_save"
                                       class="form-control  {{ $errors->has('p_save') ? 'is-invalid' : '' }}"
                                       id="p_save"  value= "{{$product->p_save}}"
                                       placeholder="Update Your Save Price Here ">
                                @error('p_save')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="text">Product Sku</label>
                                <input type="text" name="sku"
                                       class="form-control  {{ $errors->has('sku') ? 'is-invalid' : '' }}"
                                       id="sku"  value= "{{$product->sku}}"
                                       placeholder="Update Your Product SKU Here Example(SKU-078) ">
                                @error('sku')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="availability">Select Availability</label>
                                <select name="availability" class="form-control" id="availability">
                                    <option value="">-- Select Availability --</option>
                                    @foreach(['in_stock', 'out_of_stock'] as $availabilityOption)
                                        <option value="{{ $availabilityOption }}"
                                            {{ old('availability') == $availabilityOption ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('_', ' ', $availabilityOption)) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('availability')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select name="color" class="form-control" id="color">
                                    <option value="">-- Choose Color --</option>
                                    @foreach(['blue', 'white', 'black'] as $colorOption)
                                        <option value="{{ $colorOption }}"
                                            {{ old('color') == $colorOption ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('_', ' ', $colorOption)) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('color')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="size">Choose Size</label>
                                <select name="size" class="form-control" id="size">
                                    <option value="">-- Select Size --</option>
                                    @foreach(['small', 'medium', 'large'] as $sizeOption)
                                        <option value="{{ $sizeOption }}"
                                            {{ old('size') == $sizeOption ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('_', ' ', $sizeOption)) }}
                                        </option>
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
                                <input type="checkbox" name="active" id="active" {{ ($product->active) ?'checked':'' }} data-bootstrap-switch
                                       data-off-color="danger" data-on-color="success">
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
