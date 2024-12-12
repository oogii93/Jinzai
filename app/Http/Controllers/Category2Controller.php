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

        return redirect()->route('categories2.index')->with('success','サブカテゴリ作成完了しました。');
    }


    public function edit(Category2 $category2)
    {

        $categories=Category::all();
        return view('admin.categories2.edit', compact('category2','categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category2 $category2)
    {
        $validatedData = $request->validate([
            'category_id'=>'required|exists:categories,id',
            'name' => 'required|unique:categories,name,' . $category2->id,
        ]);

        $category2->update($validatedData);

        return redirect()->route('categories2.index')->with('success', 'カテゴリが正常に更新されました。');
    }


    public function destroy(Category2 $category2)
    {
        $category2->delete();
        return redirect()->route('categories2.index')->with('success', 'サブカテゴリが正常に削除されました。');
    }
}
