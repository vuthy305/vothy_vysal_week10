<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('categories.index',['categories'=>$categories]);
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|unique:categories',
            ]
        );
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect(route('category'));
    }
    public function edit(Category $category){
        $data = $category;
        return view('categories.update',['data'=>$data]);
    }
    public function update(Request $request,Category $category){

       $request->validate(
           [
                'name'=>'required|unique:categories',
           ]
        );

       $category = Category::findOrFail($category->id);
       $category->name = $request->name;
       $category->save();

       return redirect(route('category'));
    }
    public function delete(Category $category){
        $data = $category;
        return view('categories.delete',['data'=>$data]);
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect(route('category'));
    }
}
