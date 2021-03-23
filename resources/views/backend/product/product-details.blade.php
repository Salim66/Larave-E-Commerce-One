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
                        Product Details Information

                    </h3>
                    <a href="{{ route('products.view') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-list"></i> View Product</a>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td width="50%">Category Name</td>
                            <td width="50%">{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Brand Name</td>
                            <td width="50%">{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Product Name</td>
                            <td width="50%">{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Product Colors</td>
                            <td width="50%">
                                @php
                                    $colors = App\Models\ProductColor::where('product_id', $product->id)->get();
                                @endphp
                                @foreach ($colors as $clr)
                                        {{ $clr->color->name }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">Product Sizes</td>
                            <td width="50%">
                                @php
                                    $sizes = App\Models\ProductSize::where('product_id', $product->id)->get();
                                @endphp
                                @foreach ($sizes as $sz)
                                        {{ $sz->sizes->name }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">Product Price</td>
                            <td width="50%">{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Short Description</td>
                            <td width="50%">{{ $product->short_desc }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Long Description</td>
                            <td width="50%">{{ $product->long_desc }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Product Image</td>
                            <td width="50%"><img width="100" height="100" src="{{ (@$product->image)? URL::to('upload/product_image/'.$product->image) : URL::to('upload/no-image-found.png') }}" alt=""></td>
                        </tr>
                        <tr>
                            <td width="50%">Product Sub Image</td>
                            <td width="50%">
                                @php
                                    $product_sub_image = App\Models\ProductSubImage::where('product_id', $product->id)->get();
                                @endphp
                                @foreach ($product_sub_image as $sub_image)
                                     <img width="100" height="100" src="{{  URL::to('upload/product_image/product_sub_image/'.$sub_image->sub_image)  }}" alt="">
                                @endforeach
                            </td>
                        </tr>
                    </table>
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
