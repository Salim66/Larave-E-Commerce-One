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
    .mytable tr td{
        padding: 10px;
    }
</style>
	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/frontend/assets/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Order Details
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
                        <table class="text-center mytable" width="100%" border="1">
                            <tr>
                                <td width="30%">
                                    <img src="{{ URL::to('/') }}/upload/logo_images/{{ $logo->image }}" alt="">
                                </td>
                                <td width="40%">
                                    <h4><strong>Furnish Furniture</strong></h4>
                                    <span><strong>Mobile no: </strong>{{ $contact->mobile }}</span><br>
                                    <span><strong>Email: </strong>{{ $contact->email }}</span><br>
                                    <span><strong>Address: </strong>{{ $contact->address }}</span>
                                </td>
                                <td width="30%">
                                    <strong>Order no: # {{ $order->order_no }} </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Billing Info:</strong></td>
                                <td colspan="2" class="text-left">
                                    <strong>Name: </strong>{{ $order->shipping->name }}
                                    <strong>Mobile no: </strong>{{ $order->shipping->mobile_no }}<br>
                                    <strong>Email: </strong>{{ $order->shipping->email }}
                                    <strong>Address: </strong>{{ $order->shipping->address }}<br>
                                    <strong>Payment: </strong>
                                    {{ $order->payment->payment_method }}
                                    @if($order->payment->payment_method == "Bkash")
                                        (Transaction no: {{ $order->payment->transaction_no }})
                                    @endif
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

