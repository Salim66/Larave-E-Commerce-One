@extends('backend.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Order Details</h1>
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
                        Order Details Info

                    </h3>
                    <a href="{{ route('orders.approved.list') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-list"></i> Order approved list</a>
                </div>
                <div class="card-body">
                    <table class="text-center mytable" width="100%" border="1">
                        <tr>
                            <td width="30%"><strong>Billing Info:</strong></td>
                            <td  width="70%" colspan="2" class="text-left">&nbsp;
                                <strong>Name: </strong>{{ $order->shipping->name }}&nbsp;
                                <strong>Mobile no: </strong>{{ $order->shipping->mobile_no }}<br>&nbsp;
                                <strong>Email: </strong>{{ $order->shipping->email }} &nbsp;
                                <strong>Address: </strong>{{ $order->shipping->address }}<br>&nbsp;
                                <strong>Payment: </strong>
                                {{ $order->payment->payment_method }}
                                @if($order->payment->payment_method == "Bkash")
                                    (Transaction no: {{ $order->payment->transaction_no }})
                                @endif &nbsp;
                                <strong>Order no: # {{ $order->order_no }} </strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Order Details</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Product name & Image</strong></td>
                            <td><strong>Color & Size</strong></td>
                            <td><strong>Quantity & Price</strong></td>
                        </tr>
                        @foreach($order->orderDetails as $details)
                        <tr>
                            <td>
                                <img style="width: 50px; height:55px;" src="{{ URL::to('/') }}/upload/product_image/{{ $details->product->image }}" alt=""> &nbsp;
                                 {{ $details->product->name }}
                            </td>
                            <td>
                                {{ $details->color->name }} & {{ $details->size->name }}
                            </td>
                            <td>
                                @php
                                    $sub_total = $details->quantity * $details->product->price;
                                @endphp
                                {{ $details->quantity }} x {{ $details->product->price }} = {{$sub_total}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="text-align: right;"><strong>Grand Total</strong></td>
                            <td><strong>{{$order->order_total}}</strong></td>
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
