@extends('backend.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            @include('validation')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        @if (isset($product))
                             Edit Product
                        @else
                              Add Product
                        @endif

                    </h3>
                    <a href="{{ route('products.view') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-list"></i> Product List</a>
                </div>
                <div class="card-body">
                    <form action="{{ (@$product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @if (isset($product))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="category">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (@$product->category_id == $category->id)? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red;">{{ ($errors->has('category_id'))? $errors->first() : ' ' }}</font>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="brand">Brand</label>
                                <select name="brand_id" id="brand" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ (@$product->brand_id == $brand->id) ? "selected" : "" }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red;">{{ ($errors->has('brand_id'))? $errors->first() : ' ' }}</font>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Product Name</label>
                               <input type="text" name="name" class="form-control"  placeholder="Name" value="{{ @$product->name }}">
                               <font style="color:red;">{{ ($errors->has('name'))? $errors->first() : ' ' }}</font>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="color">Color</label>
                                <select name="color_id[]" id="color" class="form-control select2" multiple>
                                    @foreach($colors as $color)
                                    <option value="{{ $color->id }}" @if(isset($color_array)){{ (@in_array(['color_id' => $color->id], $color_array)) ? "selected" : "" }} @endif>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red;">{{ ($errors->has('color_id'))? $errors->first() : ' ' }}</font>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="size">Size</label>
                                <select name="size_id[]" id="size" class="form-control select2" multiple>
                                    @foreach($sizes as $size)
                                    <option value="{{ $size->id }}" @if(isset($size_array)){{ (@in_array(['size_id' => $size->id], $size_array)) ? "selected" : "" }} @endif>{{ $size->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red;">{{ ($errors->has('size_id'))? $errors->first() : ' ' }}</font>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Short Description</label>
                                <textarea name="short_desc" class="form-control" rows="2">{{ @$product->short_desc }}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Long Description</label>
                                <textarea name="long_desc" class="form-control" rows="4">{{ @$product->long_desc }}</textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label  for="price">Price</label>
                               <input type="number" name="price" class="form-control" value="{{ @$product->price }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Image</label>
                               <input type="file" name="image" class="form-control" id="product_image">
                            </div>
                            <div class="form-group col-md-3">
                                <img id="product_image_src" src="{{ (@$product->image)? URL::to('upload/product_image/'.$product->image) : URL::to('upload/no-image-found.png') }}" width="150" height="120">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sub Image</label>
                               <input type="file" name="sub_image[]" class="form-control" multiple>
                            </div>
                            <div class="form-group col-md-6" style="margin-top: 32px;">
                                <input type="submit" name="submit" class="btn btn-success" value="{{ (@$product)? "Update" : "Submit" }}">
                             </div>
                        </div>
                    </form>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
