@extends('backend.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Contacts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
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
                        Add Contacts

                    </h3>
                    <a href="{{ route('contacts.view') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-list"></i> Contacts List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('contacts.store') }}" method="POST" id="myForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="facebook">Facebook Link</label>
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook Link" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="twitter">Twitter Link</label>
                                <input type="text" name="twitter" class="form-control" placeholder="Twitter Link" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="youtube">Youtube Link</label>
                                <input type="text" name="youtube" class="form-control" placeholder="Youtube Link" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="google_plus">Google Plus Link</label>
                                <input type="text" name="google_plus" class="form-control" placeholder="Google Plus Link" >
                            </div>
                            <div class="form-group col-md-6" style="margin-top: 32px;">
                                <input type="submit" name="submit" class="btn btn-success" value="Submit">
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
