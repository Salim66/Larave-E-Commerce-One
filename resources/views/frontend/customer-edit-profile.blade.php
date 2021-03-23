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
           Edit Profile
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
                                    <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data" id="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                            <font style="color: red;">{{ (@$errors->has('name'))? ($errors->first('name')) : " " }}</font>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                            <font style="color: red;">{{ (@$errors->has('email'))? ($errors->first('email')) : " " }}</font>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile No:</label>
                                            <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}">
                                            <font style="color: red;">{{ (@$errors->has('mobile'))? ($errors->first('mobile')) : " " }}</font>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Gender:</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Profile Photo:</label>
                                            <input type="file" name="image" class="form-control" id="customer_image">
                                        </div>
                                        <div class="form-group">
                                            <img id="customer_image_load" style="width: 130px; height:130px;" src="{{ (@$user->image)? URL::to('upload/customer_images/'.$user->image) : URL::to('upload/no-image-found.png') }}" alt="">
                                        </div>
                                        <div class="form-group">
                                           <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
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

