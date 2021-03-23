@extends('frontend.layouts.app')


@section('main-content')
	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/frontend/assets/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
           Signup Form
        </h2>
    </section>


<section>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('signup.store') }}" method="POST">
                            @csrf
                            <h3 class="text-center text-info">Signup</h3>
                            <div class="form-group">
                                <label class="text-info">Full Name:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                                <font style="color:red;">{{ ($errors->has('name'))? ($errors->first('name')) : "" }}</font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                                <font style="color:red;">{{ ($errors->has('email'))? ($errors->first('email')) : "" }}</font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Mobile No:</label><br>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                                <font style="color:red;">{{ ($errors->has('mobile'))? ($errors->first('mobile')) : "" }}</font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <font style="color:red;">{{ ($errors->has('password'))? ($errors->first('password')) : "" }}</font>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Confirmation Password:</label><br>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                <font style="color:red;">{{ ($errors->has('password_confirmation'))? ($errors->first('password_confirmation')) : "" }}</font>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="signup" class="btn btn-info btn-md" value="Signup">
                                <i class="fa fa-user"></i> Have you account ? <a href="{{ route('customer.login') }}"><span>Login your account</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

