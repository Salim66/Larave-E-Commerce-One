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
           Profile
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
                                    <img class="mb-2" style="display: block; margin: auto; width: 150px; height:150px; border-radius:50%;" src="{{ (!empty(@$user->image)) ? URL::to('upload/customer_images/'.$user->image) : URL::to('upload/no-image-found.png') }}" alt="">
                                    <h3 class="text-center m-2">{{ $user->name }}</h3>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>{{ $user->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $user->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>{{ $user->gender }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-primary btn-block" href="{{ route('customer.edit.profile') }}">Edit Profile</a>
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

