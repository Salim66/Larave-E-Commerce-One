@extends('frontend.layouts.app')


@section('main-content')
		<!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:  url('/frontend/assets/images/bg-01.jpg');">
            <h2 class="ltext-105 cl0 txt-center">
                Shopping Cart
            </h2>
        </section>

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container-flud ml-2 mr-2">
            @include('validation')
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table-bordered">
							<tr class="table_head">
								<th>Product</th>
								<th>Image</th>
								<th>Size</th>
								<th>Color</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
                            @php
                                $contents = Cart::content();
                                $total = 0;
                            @endphp
                            @foreach($contents as $content)
                                <tr class="table_row">
                                    <td><div class="ml-4">{{ $content->name }}</div></td>
                                    <td>
                                        <div class="how-itemcart1" style="width: 90px; height: 90px;">
                                            <img style="width: 90px; height: 90px;" src="{{ URL::to('/') }}/upload/product_image/{{ $content->options->image }}" alt="IMG">
                                        </div>
                                    </td>
                                    <td>{{ $content->options->size_name }}</td>
                                    <td>{{ $content->options->color_name }}</td>
                                    <td>{{ $content->price }} TK</td>
                                    <td style="width: 200px; min-width:200px;">
                                        <form action="{{ route('update.cart') }}" method="POST">
                                            @csrf
                                            <div>
                                                <input class="mtext-104 cl3 txt-center num-product form-control" style="float: left;" id="qty" type="text" name="qty" value="{{ $content->qty }}">
                                                <input type="hidden" name="rowId" value="{{ $content->rowId }}">
                                                <input type="submit" value="Update" class="flex-c-m stext-101 cl2 bg8 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" style="height: 42px; border: 1px solid #e6e6e6">
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{ $content->subtotal }} TK</td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('delete.cart', $content->rowId) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @php
                                $total += $content->subtotal;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="6" style="text-align: right;"><strong>Grand Total: </strong></td>
                                <td colspan="2"><strong>{{$total}}</strong></td>
                            </tr>
						</table>
					</div>
				</div>

				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">
                                    <h5>What would you like to do next?</h5>
                                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                </th>
                            </tr>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="total_area">
                                        <ul>
                                        <li>Cart Sub Total <span>{{ $total }} Tk</span></li>
                                        <li>Eco Tax <span>0.00</span> Tk</li>
                                        <li>Shipping Cost <span>Free</span></li>
                                        <li>Total <span>{{ $total }} Tk</span></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <a href="{{ route('products.list') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Continue Shopping</a>
                            @if(@Auth::user()->id != NULL AND Session::get('shipping_id') == NULL)
                            <a href="{{ route('customer.checkout') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                            @elseif(@Auth::user()->id != NULL AND Session::get('shipping_id') != NULL)
                            <a href="{{ route('customer.payment') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                            @else
                            <a href="{{ route('customer.login') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                            @endif
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

