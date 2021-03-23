@extends('frontend.layouts.app')


@section('main-content')
	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/frontend/assets/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
           Billing Form
        </h2>
    </section>


	<!-- About us Section -->
	<section class="about_us">
		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('customer.checkout.store') }}" method="POST" id="login-form-none">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="name" class="form-control">
                                            <font style="color: red;">{{ (@$errors->any('name'))? ($errors->first('name')) : "" }}</font>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mobile Number:</label>
                                            <input type="text" name="mobile_no" class="form-control">
                                            <font style="color: red;">{{ (@$errors->any('mobile_no'))? ($errors->first('mobile_no')) : "" }}</font>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" name="address" class="form-control">
                                            <font style="color: red;">{{ (@$errors->any('address'))? ($errors->first('address')) : "" }}</font>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

    <script>
        $(function () {
            $('#login-form-none').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                    },
                    mobile_no: {
                        required: "Please enter a mobile number",
                    },
                    address: {
                        required: "Please insert your address",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

@endsection

