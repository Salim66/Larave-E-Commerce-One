@extends('frontend.layouts.app')


@section('main-content')
	<!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/frontend/assets/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
           Login Form
        </h2>
    </section>


<section>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('login') }}" method="post">
                            @csrf
                            @include('validation')
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="button" class="btn btn-info btn-md" value="Login">
                                <i class="fa fa-user"></i> No account yet ? <a href="{{ route('customer.signup') }}"><span>Signup new account</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

