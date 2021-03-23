@extends('backend.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Color</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Color</li>
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
                        @if (isset($color))
                             Edit Color
                        @else
                              Add Color
                        @endif

                    </h3>
                    <a href="{{ route('colors.view') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-list"></i> Color List</a>
                </div>
                <div class="card-body">
                    <form action="{{ (@$color) ? route('colors.update', $color->id) : route('colors.store') }}" method="POST" id="myForm">
                        @csrf
                        @if (isset($color))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Color Name</label>
                               <input type="text" name="name" class="form-control"  placeholder="Name" value="{{ @$color->name }}">
                               <font style="color:red;">{{ ($errors->has('name'))? $errors->first() : ' ' }}</font>
                            </div>
                            <div class="form-group col-md-6" style="margin-top: 32px;">
                                <input type="submit" name="submit" class="btn btn-success" value="{{ (@$color)? "Update" : "Submit" }}">
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
