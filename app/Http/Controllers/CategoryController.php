<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
    		$data = $request->all();
    		$category = new Category();
    		$category->name = $data['category_name'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
    		$category->save();
    		return redirect('/admin/view-categories')->with('flash_message_success','Category Added Successfully');
    	}
    	return view('admin.categories.add-category');
    }

    public function viewCategories()
    {
    	$categories = Category::get();
    	return view('admin.categories.view-categories')->with(compact('categories'));	
    }

    public function editCategory(Request $request, $id = null)
    {
    	if ($request->isMethod('post'))
    	{
    		$data = $request->all();
    		Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
    		return redirect('/admin/view-categories')->with('flash_message_success','Category Updated Successfully');
    	}
    	$categoryDetails = Category::where(['id'=>$id])->first();
    	return view('admin.categories.edit-category')->with(compact('categoryDetails'));
    }
}
