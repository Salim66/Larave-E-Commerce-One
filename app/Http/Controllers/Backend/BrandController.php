<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    //view Brand
    public function view(){
        $all_brand = Brand::all();
        return view('backend.brand.view-brand', [
            'all_brand' => $all_brand,
        ]);
    }
    //add Brand
    public function add(){
        return view('backend.brand.add-brand');
    }
    //Store Brand
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required | unique:brands,name'
        ]);

        Brand::create([
            'name'         => $request -> name,
            'created_by'         => Auth::user()->id,
        ]);
        return redirect()->route('brand.view')->with('success', 'Brand Added Successfully!');
    }
    //Edit Brand
    public function edit($id){
        $brand = Brand::find($id);
        return view('backend.brand.add-brand', [
            'brand' => $brand,
        ]);
    }
     //Update Brand
     public function update(BrandRequest $request, $id){

         $brand = Brand::find($id);

         $brand->name   = $request -> name;
         $brand->updated_by   = Auth::user()->id;
         $brand->update();

        return redirect()->route('brand.view')->with('success', 'Brand Updated Successfully!');
    }
    //Delete Brand
    public function delete($id){
        $brnad = Brand::find($id);
        $brnad->delete();
        return redirect()->route('brand.view')->with('success', 'Brand Deleted Successfully!');
    }
}
