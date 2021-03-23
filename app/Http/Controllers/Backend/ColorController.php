<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    //view Color
    public function view(){
        $all_color = Color::all();
        return view('backend.color.view-color', [
            'all_color' => $all_color,
        ]);
    }
    //add Color
    public function add(){
        return view('backend.color.add-color');
    }
    //Store Color
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required | unique:colors,name'
        ]);

        Color::create([
            'name'         => $request -> name,
            'created_by'         => Auth::user()->id,
        ]);
        return redirect()->route('colors.view')->with('success', 'Color Added Successfully!');
    }
    //Edit Color
    public function edit($id){
        $color = Color::find($id);
        return view('backend.color.add-color', [
            'color' => $color,
        ]);
    }
     //Update Color
     public function update(ColorRequest $request, $id){

         $color = Color::find($id);

         $color->name   = $request -> name;
         $color->updated_by   = Auth::user()->id;
         $color->update();

        return redirect()->route('colors.view')->with('success', 'Color Updated Successfully!');
    }
    //Delete Color
    public function delete($id){
        $color = Color::find($id);
        $color->delete();
        return redirect()->route('colors.view')->with('success', 'Color Deleted Successfully!');
    }
}
