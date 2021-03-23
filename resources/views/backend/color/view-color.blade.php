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
                        Color List

                    </h3>
                    <a href="{{ route('colors.add') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus-circle"></i> Add Color</a>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <th width="6%">SL</th>
                            <th>Color Name</th>
                            <th width="12%">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($all_color as $color)
                            @php
                                $count_color = App\Models\ProductColor::where('color_id', $color->id)->count();
                            @endphp
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $color->name }}</td>
                                <td>
                                    <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    @if ($count_color<1)
                                    <a title="delete" id="user_delete"  href="{{ route('colors.delete', $color->id) }}"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
