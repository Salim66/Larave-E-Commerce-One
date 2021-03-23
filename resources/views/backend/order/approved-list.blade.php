@extends('backend.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Approved Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
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
                        Order Approved List

                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Order No</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                             <tr>
                                 <td># {{ $order->order_no }}</td>
                                 <td>{{ $order->order_total }}</td>
                                 <td>
                                     {{ $order->payment->payment_method }}
                                     @if($order->payment->payment_method == "Bkash")
                                        {{ "(Transaction no:" }} {{ $order->payment->transaction_no }}{{ ")" }}
                                     @endif
                                    </td>
                                 @if($order->status == '0')
                                 <td><span class="badge badge-danger">Unapproved</span></td>
                                 @elseif($order->status == '1')
                                 <td><span class="badge badge-success">Approved</span></td>
                                 @endif
                                 <td>
                                     <a href="{{ route('orders.details', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Details</a>
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
