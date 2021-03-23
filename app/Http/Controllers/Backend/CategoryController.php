<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    ///view Category
    public function view(){
        $all_category = Category::all();
        return view('backend.category.view-category', [
            'all_category' => $all_category,
        ]);
    }
    //add Category
    public function add(){
        return view('backend.category.add-category');
    }
    //Store Category
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required | unique:categories,name'
        ]);

        Category::create([
            'name'         => $request -> name,
            'created_by'         => Auth::user()->id,
        ]);
        return redirect()->route('categories.view')->with('success', 'Category Added Successfully!');
    }
    //Edit About us
    public function edit($id){
        $category = Category::find($id);
        return view('backend.category.edit-category', [
            'category' => $category,
        ]);
    }
     //Update Category
     public function update(CategoryRequest $request, $id){

         $category = Category::find($id);

         $category->name   = $request -> name;
         $category->updated_by   = Auth::user()->id;
         $category->update();

        return redirect()->route('categories.view')->with('success', 'Category Updated Successfully!');
    }
    //Serice About us
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.view')->with('success', 'Category Deleted Successfully!');
    }
}
