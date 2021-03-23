<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
     //view Product
     public function view(){
        $all_product = Product::latest()->get();
        return view('backend.product.view-product', [
            'all_product' => $all_product,
        ]);
    }
    //add Product
    public function add(){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('backend.product.add-product', [
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
    //Store Product
    public function store(Request $request){
        DB::transaction(function () use ($request) {
            $this->validate($request, [
                'name' => 'required | unique:sizes,name',
                'category_id' => 'required',
                'brand_id' => 'required',
                'color_id' => 'required',
                'size_id' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
                'price' => 'required',
            ]);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $product_image = md5(time().rand()).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/product_image/'), $product_image);
            }

            $product = new Product();
            $product->category_id =  $request -> category_id;
            $product->brand_id =  $request -> brand_id;
            $product->name =  $request -> name;
            $product->slug =  Str::slug($request -> name);
            $product->short_desc =  $request -> short_desc;
            $product->long_desc =  $request -> long_desc;
            $product->price =  $request -> price;
            $product->image =  $product_image;
            if($product->save()){
                if($request->hasFile('sub_image')){
                    $images = $request->file('sub_image');
                    foreach($images as $image){
                        $image_unique = md5(time().rand()).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('upload/product_image/product_sub_image/'), $image_unique);

                        $subImage = new ProductSubImage();
                        $subImage->product_id = $product->id;
                        $subImage->sub_image =  $image_unique;
                        $subImage->save();
                    }
                }

                //color table data insert
                $colors = $request->color_id;
                if(!empty($colors)){
                    foreach($colors as $color){
                        $myColor = new ProductColor();
                        $myColor->product_id = $product->id;
                        $myColor->color_id = $color;
                        $myColor->save();
                    }
                }
                //size table data insert
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    foreach($sizes as $size){
                        $mySize = new ProductSize();
                        $mySize->product_id = $product->id;
                        $mySize->size_id = $size;
                        $mySize->save();
                    }
                }
            }else{
                return redirect()->back()->with('error', 'Sorry! Data not saved');
            }
        });
        return redirect()->route('products.view')->with('success', 'Product Added Successfully!');
    }
    //Edit Product
    public function edit($id){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $product = Product::find($id);
        $color_array = ProductColor::select('color_id')->where('product_id', $product->id)->orderBy('id', 'asc')->get()->toArray();
        $size_array = ProductSize::select('size_id')->where('product_id', $product->id)->orderBy('id', 'asc')->get()->toArray();
        return view('backend.product.add-product', [
            'product' => $product,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
            'categories' => $categories,
            'color_array' => $color_array,
            'size_array' => $size_array,
        ]);
    }
     //Update Product
     public function update(ProductRequest $request, $id){
        DB::transaction(function () use ($request, $id) {
            $this->validate($request, [
                'category_id' => 'required',
                'brand_id' => 'required',
                'color_id' => 'required',
                'size_id' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
                'price' => 'required',
            ]);

            $product = Product::find($id);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $product_image = md5(time().rand()).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/product_image/'), $product_image);
                if(file_exists('upload/product_image/'.$product->image) AND !empty($product->image)){
                    unlink('upload/product_image/'.$product->image);
                }
            }else{
                $product_image = $product->image;
            }


            $product->category_id =  $request -> category_id;
            $product->brand_id =  $request -> brand_id;
            $product->name =  $request -> name;
            $product->slug =  Str::slug($request -> name);
            $product->short_desc =  $request -> short_desc;
            $product->long_desc =  $request -> long_desc;
            $product->price =  $request -> price;
            $product->image =  $product_image;

            $files = $request->sub_image;
            if(!empty($files)){
                $subImage = ProductSubImage::where('product_id', $id)->get()->toArray();
                foreach($subImage as $image){
                    if(!empty($image)){
                        if(file_exists('upload/product_image/product_sub_image/'.$image['sub_image']) AND !empty($image['sub_image'])){
                            unlink('upload/product_image/product_sub_image/'.$image['sub_image']);
                        }
                    }
                }
                ProductSubImage::where('product_id', $id)->delete();
            }

            if($product->save()){
                if($request->hasFile('sub_image')){
                    $images = $request->file('sub_image');
                    foreach($images as $image){
                        $image_unique = md5(time().rand()).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('upload/product_image/product_sub_image/'), $image_unique);

                        $subImage = new ProductSubImage();
                        $subImage->product_id = $product->id;
                        $subImage->sub_image =  $image_unique;
                        $subImage->save();
                    }
                }



                //color table data update
                $colors = $request->color_id;
                if(!empty($colors)){
                    ProductColor::where('product_id', $id)->delete();
                }
                if(!empty($colors)){
                    foreach($colors as $color){
                        $myColor = new ProductColor();
                        $myColor->product_id = $product->id;
                        $myColor->color_id = $color;
                        $myColor->save();
                    }
                }
                //size table data update
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    ProductSize::where('product_id', $id)->delete();
                }
                if(!empty($sizes)){
                    foreach($sizes as $size){
                        $mySize = new ProductSize();
                        $mySize->product_id = $product->id;
                        $mySize->size_id = $size;
                        $mySize->save();
                    }
                }
            }else{
                return redirect()->back()->with('error', 'Sorry! Data not saved');
            }
        });
        return redirect()->route('products.view')->with('success', 'Product Updated Successfully!');
    }
    //Delete Product
    public function delete($id){
        $product = Product::find($id);
        if(file_exists('upload/product_image/'.$product->image) AND !empty($product->image)){
                unlink('upload/product_image/'.$product->image);
        }
        $subImage = ProductSubImage::where('product_id', $product->id)->get()->toArray();
        if(!empty($subImage)){
            foreach($subImage as $value){
                if(!empty($value)){
                    unlink('upload/product_image/product_sub_image/'.$value['sub_image']);
                }
            }
        }
        ProductSubImage::where('product_id', $product->id)->delete();
        ProductColor::where('product_id', $product->id)->delete();
        ProductSize::where('product_id', $product->id)->delete();
        $product->delete();
        return redirect()->route('products.view')->with('success', 'Products Deleted Successfully!');
    }
    //Details Product
    public function details($id){
        $product = Product::find($id);
        return view('backend.product.product-details', [
            'product' => $product
        ]);
    }
}
