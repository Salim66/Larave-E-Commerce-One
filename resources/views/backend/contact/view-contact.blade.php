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
                        Service List

                    </h3>
                    @if($contact_count<1)
                    <a href="{{ route('contacts.add') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus-circle"></i> Add Contacts</a>
                    @endif
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <th>SL</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Youtube</th>
                            <th>Google Plus</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($all_contact as $contact)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->mobile }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->facebook }}</td>
                                <td>{{ $contact->twitter }}</td>
                                <td>{{ $contact->youtube }}</td>
                                <td>{{ $contact->google_plus }}</td>
                                <td>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a id="user_delete" href="{{ route('contacts.delete', $contact->id) }}"   class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
