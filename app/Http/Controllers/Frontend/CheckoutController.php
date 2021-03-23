<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailConfirmationEmailCustomer;
use App\Models\Contacts;
use App\Models\Logo;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    //Customer Login Page
    public function loginCustomer(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.customer-login', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }
    //Customer Signup Page
    public function signupCustomer(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.customer-signup', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }
    //Customer Store
    public function signupStore(Request $request){
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required | unique:users,email',
            'mobile'  => ['required', 'unique:users,mobile', 'regex:/(^(\+8801|8801|01|008801))[1-9]{1}(\d){8}$/'],
            'password' => 'min:9 | required_with:password_confirmation | same:password_confirmation',
            'password_confirmation' => 'min:9',
        ]);

        //Verify Code Genarate
        $code = rand(0000, 9999);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'code' => $code,
            'status' => 0,
            'userType' => 'customer',
        ]);

        $verify_email_details = [
            'name' => $request->name,
            'email' => $request->email,
            'code' => $code,
        ];

        Mail::to($request->email)->send(new EmailConfirmationEmailCustomer($verify_email_details));

        return redirect()->route('verify.email')->with('success', 'You have successfully signed up, please verification your email!');
    }

    //Email Verifacation Page
    public function emailVerify(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.customer-verify-email', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }

    //Varified store
    public function verifyStore(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'code' => 'required',
        ]);
        $customer_info = User::where('email', $request->email)->where('code', $request->code)->first();
        if($customer_info){
            $customer_info->status = 1;
            $customer_info->update();
            return redirect()->route('customer.login')->with('success','Your verification successfully completed ): Please login !');
        }else{
            return redirect()->back()->with('error', 'Sorry ! email or verify code does not match. Please try again!');
        }
    }

    //Customer Checkout
    public function customerCheckout(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.customer-checkout', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }

    //Customer Checkout Store
    public function customerCheckoutStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'mobile_no' => ['required', 'regex:/(^(\+8801|8801|01|008801))[1-9]{1}(\d){8}$/'],
            'address' => 'required'
        ]);

        $Shipping = Shipping::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
        ]);
        $request->session()->put('shipping_id', $Shipping->id);
        return redirect()->route('customer.payment')->with("Shipping information added successfull ): ");
    }
}
