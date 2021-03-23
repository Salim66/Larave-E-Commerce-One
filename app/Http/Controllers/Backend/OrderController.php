<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //Pending Order
    public function pendingList(){
        $orders = Order::where('status', '0')->get();
        return view('backend.order.pending-list', [
            'orders' => $orders,
        ]);
    }
    //Approved Order
    public function approvedList(){
        $orders = Order::where('status', '1')->get();
        return view('backend.order.approved-list', [
            'orders' => $orders,
        ]);
    }
    //Order Details
    public function detials($id){
        $order = Order::find($id);
        return view('backend.order.details', [
            'order' => $order,
        ]);
    }
    //Order Approved
    public function orderApproved(Request $request){
        $order_info = Order::find($request -> id);
        $order_info->status = 1;
        $order_info->update();
        return redirect()->route('orders.pending.list')->with('success', 'Order approved successfully ): ');
    }
}
