<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Details</title>
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
</head>
<body>
    <div class="container">
        <div>
            <table class="text-center mytable" width="950px;" border="1" style="margin: auto">
                <tr>
                    <td width="30%">
                        <img src="{{ URL::to('/') }}/upload/logo_images/{{ $logo->image }}" alt="">
                    </td>
                    <td width="40%" style="text-align: center;">
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
            <button class="btn btn-danger d-print-none" onclick="window.print()">Print</button>
        </div>
    </div>
</body>
</html>
