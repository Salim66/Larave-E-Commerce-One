@extends('frontend.layouts.app')


@section('main-content')
		<!-- Title page -->
        <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:  url('/frontend/assets/images/bg-01.jpg');">
            <h2 class="ltext-105 cl0 txt-center">
               Payment Method
            </h2>
        </section>

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container-flud ml-2 mr-2">
            @include('validation')
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table striped">
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
						</table>
					</div>
				</div>

				<div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Select Payment Method</h3>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{ route('customer.payment.store') }}" method="POST">
                                @csrf
                                @foreach($contents as $content)
                                    <input type="hidden" name="product_id" value="{{ $content->id }}">
                                @endforeach
                               <div class="form-group">
                                   <input type="hidden" name="order_total" value="{{ $total }}">
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="">Select Payment Type</option>
                                    <option value="Hand Cash">Hand Cash</option>
                                    <option value="Bkash">Bkash</option>
                                </select>
                                <font style="color:red;">{{ (@$errors->any('payment_method'))? ($errors->first('payment_method')) : "" }}</font>
                               </div>
                               <div class="form-group">
                                <div class="show-field" style="display: none;">
                                    <span>Bkash No is: 01773980593</span>
                                    <input type="text" name="transaction_no" class="form-control" placeholder="Write Transaction No">
                                </div>
                               </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
    <script>
        $(document).ready(function(){
            $(document).on('change', "#payment_method", function(e){
                e.preventDefault();
                let payment_method = $(this).val();
                if(payment_method == "Bkash"){
                    $(".show-field").show();
                }else{
                    $(".show-field").hide();
                }
            });
        });
    </script>
@endsection

