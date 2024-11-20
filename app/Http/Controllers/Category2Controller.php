<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Category2;

use Illuminate\Http\Request;

class Category2Controller extends Controller
{
    public function index()
    {
        $subcategories=Category2::with('mainCategory')->get();

        return view('admin.categories2.index', compact('subcategories'));
    }


    public function create()
    {
        $categories=Category::all();

        return view('admin.categories2.create', compact('categories'));
    }




    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
        ]);

        Category2::create($validated);

        return redirect()->route('categories2.index')->with('success','サブカテゴリ');
    }


    public function update()
    {

    }
    public function show()
    {

    }

    public function destroy(Category2 $category2)
    {
        $category2->delete();
        return redirect()->route('categories2.index')->with('success', 'Category deleted successfully.');
    }
}
