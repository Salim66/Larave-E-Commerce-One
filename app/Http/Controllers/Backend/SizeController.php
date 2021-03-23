<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    //view Size
    public function view(){
        $all_size = Size::all();
        return view('backend.size.view-size', [
            'all_size' => $all_size,
        ]);
    }
    //add Size
    public function add(){
        return view('backend.size.add-size');
    }
    //Store Size
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required | unique:sizes,name'
        ]);

        Size::create([
            'name'         => $request -> name,
            'created_by'         => Auth::user()->id,
        ]);
        return redirect()->route('sizes.view')->with('success', 'Size Added Successfully!');
    }
    //Edit Sise
    public function edit($id){
        $size = Size::find($id);
        return view('backend.size.add-size', [
            'size' => $size,
        ]);
    }
     //Update Size
     public function update(SizeRequest $request, $id){

         $size = Size::find($id);

         $size->name   = $request -> name;
         $size->updated_by   = Auth::user()->id;
         $size->update();

        return redirect()->route('sizes.view')->with('success', 'Size Updated Successfully!');
    }
    //Delete Size
    public function delete($id){
        $size = Size::find($id);
        $size->delete();
        return redirect()->route('sizes.view')->with('success', 'Size Deleted Successfully!');
    }
}
