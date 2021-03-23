<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //Customer View
    public function view(){
        $all_users = User::where('userType', 'customer')->where('status', '1')->get();
        return view('backend.customer.customer-view', [
            'all_users' => $all_users,
        ]);
    }
    //Customer Draft View
    public function draftView(){
        $all_users = User::where('userType', 'customer')->where('status', '0')->get();
        return view('backend.customer.customer-draft-view', [
            'all_users' => $all_users,
        ]);
    }
    //Draft Customer Delete
    public function customerDraftDelete($id){
        $customer_info = User::find($id);
        $customer_info->delete();
        if(file_exists('upload/customer_images/'.$customer_info->image)){
            unlink('upload/customer_images/'.$customer_info->image);
        }
        return redirect()->back()->with('success', 'Customer Deleted Succesfully!');
    }
}
