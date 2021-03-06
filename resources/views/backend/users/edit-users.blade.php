@extends('backend.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                        Edit Users

                    </h3>
                    <a href="{{ route('users.view') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-list"></i> Users List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="role">User Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="admin" {{ ($user -> role == "admin") ? "selected" : "" }}>Admin</option>
                                    <option value="admin" {{ ($user -> role == "user") ? "selected" : "" }}>User</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user -> name }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required value="{{ $user -> email }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" name="submit" class="btn btn-success" value="Update">
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
