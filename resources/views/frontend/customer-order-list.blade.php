@extends('frontend.layouts.app')


@section('main-content')
<style type="text/css">
    .prof li {
        background-color: #1781BF;
        padding: 7px;
        margin: 3px;
        border-radius: 15px;
    }
    .prof a {
        color: #fff;
        padding-left: 15px;
    }
    .prof li:hover{
        background-color: #0c97e7;
    }
</style>
	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/frontend/assets/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Orders
        </h2>
    </section>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row" style="margin: 15px 0px 15px 0px;">
                <div class="col-md-2">
                    <ul class="prof">
                        <li><a href="{{ route('dashboard') }}">My Profile</a></li>
                        <li><a href="{{ route('customer.password.edit') }}">Change Password</a></li>
                        <li><a href="{{ route('customer.order.list') }}">My Orders</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
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
                                     <a title="Details" href="{{ route('customer.order.details', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>
                                     <a title="Print" target="_blank" href="{{ route('customer.order.print', $order->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> </a>
                                 </td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

