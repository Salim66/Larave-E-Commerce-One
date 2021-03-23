<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Logo;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\User;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //Customer Profile
    public function dashboard(){
        $logo = Logo::first();
        $contact = Contacts::first();
        $user = Auth::user();
        return view('frontend.customer-dashboard', [
            'logo' => $logo,
            'contact' => $contact,
            'user' => $user,
        ]);
    }

    //Customer Edit Page
    public function editProfile(){
        $logo = Logo::first();
        $contact = Contacts::first();
        $user = User::find(Auth::user()->id);
        return view('frontend.customer-edit-profile', [
            'logo' => $logo,
            'contact' => $contact,
            'user' => $user,
        ]);
    }

    //Customer Update Profile
    public function updateProfile(Request $request){
        $customer = User::find(Auth::user()->id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | unique:users,email,'.$customer->id,
            'mobile' => ['required', 'unique:users,mobile,'.$customer->id, 'regex:/(^(\+8801|8801|01|008801))[1-9]{1}(\d){8}$/'],
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $unique_image_name = md5(time().rand()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/customer_images/'), $unique_image_name);
            if(file_exists('upload/customer_images/'.$customer->image) AND !empty($customer->image)){
                unlink('upload/customer_images/'.$customer->image);
            }
        }else {
            $unique_image_name = $customer->image;
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->image = $unique_image_name;
        $customer->update();
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully ): ');
    }

    //Customer Password Edit
    public function editPassword(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.customer-password-change', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }

    //Customer Password Update
    public function updatePassword(Request $request){
        $customer_info = User::find(Auth::user()->id);
        if(Auth::attempt(['id' => $customer_info->id, 'password' => $request->current_password])){
            $customer_info->password = password_hash($request->new_password, PASSWORD_DEFAULT);
            $customer_info->update();
            return redirect()->route('dashboard')->with('success', 'Password updated successfully ): ');
        }else {
            return redirect()->back()->with('error', 'Sorry! your current password does not match! ');
        }
    }

    //Customer Payment
    public function customerPayment(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.customer-payment', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }

    //Customer Payment Store
    public function customerPaymentStore(Request $request){
        if($request->product_id == NULL){
            return redirect()->back()->with('error', 'Please add your product.');
        }else{
            $this->validate($request, [
                'payment_method' => 'required'
            ]);

            //Bkash Payment Validation
            if($request->payment_method == "Bkash" AND $request->transaction_no == NULL){
                return redirect()->back()->with('error', 'Please insert your bkash payment transaction no.');
            }

            //Payment
            $payment = Payment::create([
                'payment_method' => $request->payment_method,
                'transaction_no' => $request->transaction_no,
            ]);

            //Order
            $order_data = Order::orderBy('id', 'desc')->first();
            if($order_data == null){
                $firstReg = 0;
                $order_no = $firstReg+1;
            }else {
                $order_data = Order::orderBy('id', 'desc')->first()->order_no;
                $order_no = $order_data+1;
            }
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'shipping_id' => Session::get('shipping_id'),
                'shipping_id' => Session::get('shipping_id'),
                'payment_id' => $payment->id,
                'order_no' => $order_no,
                'order_total' => $request->order_total,
                'status' => 0,
            ]);

            //Order Details
            $cart = app(Cart::class);
            $contents = $cart->content();
            foreach($contents as $contact){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $contact->id,
                    'color_id' => $contact->options->color_id,
                    'size_id' => $contact->options->size_id,
                    'quantity' => $contact->qty,
                ]);
            }

        }
        $cart->destroy();
        return redirect()->route('customer.order.list')->with('success', 'Data added successfully ): ');
    }

    //Customer Order List
    public function customerOrderList(){
        $logo = Logo::first();
        $contact = Contacts::first();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('frontend.customer-order-list', [
            'logo' => $logo,
            'contact' => $contact,
            'orders' => $orders,
        ]);
    }

    //Customer Order Detials
    public function customerOrderDetails($id){
        $orderData = Order::find($id);
        $order = Order::where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
        if($order == false){
            return redirect()->back()->with('error', 'Do not try to be over smatt!');
        }else{
            $logo = Logo::first();
            $contact = Contacts::first();
            $order = Order::where('id', $order->id)->where('user_id', Auth::user()->id)->first();
            return view('frontend.customer-order-details', [
                'logo' => $logo,
                'contact' => $contact,
                'order' => $order,
            ]);
        }

    }

    //Customer Order Details Print
    public function customerOrderPrint($id){
        $orderData = Order::find($id);
        $order = Order::where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
        if($order == false){
            return redirect()->back()->with('error', 'Do not try to be over smatt!');
        }else{
            $logo = Logo::first();
            $contact = Contacts::first();
            $order = Order::where('id', $order->id)->where('user_id', Auth::user()->id)->first();
            return view('frontend.customer-order-print', [
                'logo' => $logo,
                'contact' => $contact,
                'order' => $order,
            ]);
        }
    }
}
