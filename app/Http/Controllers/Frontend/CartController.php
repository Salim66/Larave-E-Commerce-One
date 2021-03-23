<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Logo;
use App\Models\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart;


class CartController extends Controller
{
    public function inserCart(Request $request){
        $this->validate($request, [
            'size_id' => 'required',
            'color_id' => 'required',
        ]);
       $product = Product::where('id', $request->id)->first();
       $productColor = Color::where('id', $request->color_id)->first();
       $productSize = Size::where('id', $request->size_id)->first();
        $cart = app(Cart::class);
        $cart->add([
            'id' => $request->id,
            'qty' => $request->qty,
            'name' => $product->name,
            'price' => $product->price,
            'weight' => 550,
            'options' => [
                'size_id' => $request->size_id,
                'size_name' => $productSize->name,
                'color_id' => $request->color_id,
                'color_name' => $productColor->name,
                'image' => $product->image,
            ]
        ]);
        return redirect()->route('show.cart')->with('success', 'Product Added Successfully ):');
    }

    //Show Product Cart Details
    public function showCart(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.shopping-cart',[
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }

    //Update Cart
    public function updateCart(Request $request){
        $cart = app(Cart::class);
        $cart->update($request->rowId, $request->qty);
        return redirect()->route('show.cart')->with('success', 'Cart Updated Successfull ): ');
    }

    //Delete Cart
    public function deleteCart($rowId){
        $cart = app(Cart::class);
        $cart->remove($rowId);
        return redirect()->route('show.cart')->with('success', 'Cart Deleted Successfull ): ');
    }
}
