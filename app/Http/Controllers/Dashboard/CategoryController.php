<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::Paginate(5);
        return view('dashboard.categories.index',compact('categories'));
    }

    
    public function create()
    {
        return view('dashboard.categories.create') ;

    }

 
    public function store(Request $request)
    {
        $request->validate([
            'ar.*'=>'required'
        ]);
        Category::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

  
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));

    }

    public function update(Request $request, Category $category)
    {
     
   

        $request->validate([
            'name'=>'required|unique:categories,name,'.$category->id,
        ]);

        $category->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.categories.index');    }
}
