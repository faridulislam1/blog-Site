<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private static $category;
    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request){
        Category::saveCategory($request);
        return back()->with('message','Category Saved');
    }

    public function manageCategory(){
        return view('admin.category.manage-category',[
            'categories'=>Category::all()
        ]);
    }

    public function categoryDelete(Request $request){

        Category::categoryDelete($request->id);
        return back()->with('message','Category is deleted.');
    }


    public function editCategory($id){
        self::$category = Category::find($id);
        return view('admin.category.edit-category',[
            'category'=>self::$category
        ]);
    }

    public function updateCategory(Request $request){
        Category::updateCategory($request);
        return back()->with('message','Category Updated');
    }
    public function categoryStatus($id){
        Category::categoryStatus($id);
        return back()->with('message', 'Info updated');



    }
}
