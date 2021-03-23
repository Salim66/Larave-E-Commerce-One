<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Communicate;
use App\Models\Contacts;
use App\Models\Logo;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailContactUsConfirmationMail;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;

class FrontendController extends Controller
{
    //Home
    public function index(){
        $logo = Logo::first();
        $sliders = Slider::all();
        $contact = Contacts::first();
        return view('frontend.home', [
            'logo' => $logo,
            'sliders' => $sliders,
            'contact' => $contact,
        ]);
    }

    //About Us
    public function aboutUs(){
        $logo = Logo::first();
        $contact = Contacts::first();
        $about = About::first();
        return view('frontend.about-us', [
            'logo' => $logo,
            'contact' => $contact,
            'about' => $about,
        ]);
    }
    //All Product List
    public function allProduct(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.product-all-list', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }
    //Category Wise Product
    public function categoryWiseProduct($category_id){
        $logo = Logo::first();
        $contact = Contacts::first();
        $products = Product::where('category_id', $category_id)->get();
        return view('frontend.category-wise-product', [
            'logo' => $logo,
            'contact' => $contact,
            'products' => $products,
        ]);
    }
    //Brand Wise Product
    public function brnadWiseProduct($brand_id){
        $logo = Logo::first();
        $contact = Contacts::first();
        $products = Product::where('brand_id', $brand_id)->get();
        return view('frontend.brand-wise-product', [
            'logo' => $logo,
            'contact' => $contact,
            'products' => $products,
        ]);
    }
    //Single Product Details
    public function singleProductDetails($slug){
        $logo = Logo::first();
        $contact = Contacts::first();
        $product = Product::where('slug', $slug)->first();
        $sub_image = ProductSubImage::where('product_id', $product->id)->get();
        $colors = ProductColor::where('product_id', $product->id)->get();
        $sizes = ProductSize::where('product_id', $product->id)->get();
        return view('frontend.single-product-details', [
            'logo' => $logo,
            'contact' => $contact,
            'product' => $product,
            'sub_image' => $sub_image,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
    //News and Events
    public function shoppingCart(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.shopping-cart', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }

    //Contact Us
    public function contactUs(){
        $logo = Logo::first();
        $contact = Contacts::first();
        return view('frontend.contact-us', [
            'logo' => $logo,
            'contact' => $contact,
        ]);
    }

    //Users Contact
    public function communicateUser(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);

        Communicate::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'message' => $request->message,
        ]);

        $contact_details = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'message' => $request->message,
        ];

        Mail::to($request->email,)->send( new EmailContactUsConfirmationMail($contact_details));

        return redirect()->back()->with('success', 'Your message has been send successfully!');
    }

    //Product Search
    public function productSearch(Request $request){
        $product = Product::where('slug', $request->slug)->first();
        if($product != NULL){
            $logo = Logo::first();
            $contact = Contacts::first();
            $product = Product::where('slug', $request->slug)->first();
            $sub_image = ProductSubImage::where('product_id', $product->id)->get();
            $colors = ProductColor::where('product_id', $product->id)->get();
            $sizes = ProductSize::where('product_id', $product->id)->get();
            return view('frontend.single-product-search', [
                'logo' => $logo,
                'contact' => $contact,
                'product' => $product,
                'sub_image' => $sub_image,
                'colors' => $colors,
                'sizes' => $sizes,
            ]);
        }else {
            return redirect()->back()->with('error', 'Do not find any product, please try again!');
        }
    }

    //Product seach by ajax
    public function getProduct(Request $request){
        $slug = $request->slug;
        $products = Product::where('slug', 'LIKE', '%'.$slug.'%')->get();

        $html = '';
        $html .= '<div><ul>';
        if($products){
            foreach($products as $product){
                $html .= '<li>'.$product->slug.'</li>';
            }
        }
        $html .= "</ul></div>";
        return response()->json($html);
    }
}
