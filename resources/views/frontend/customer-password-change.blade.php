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
           Change Password
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
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('customer.password.update') }}" method="POST" id="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="password">Current Password:</label>
                                            <input type="password" name="current_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password:</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input type="password" name="confirm_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                           <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

