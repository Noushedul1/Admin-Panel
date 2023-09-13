<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $this->validate($request,[
            'category'=>'required|max:20',
            'categoryDetails'=>'required'
        ]);
        Category::create($validation);
        return redirect()->route('category.index')->with('categoryCreate','Category Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.show',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $this->validate($request,[
            'category'=>'required|max:20',
            'categoryDetails'=>'required'
        ]);
        Category::where('id',$id)->update($validation);
        return redirect()->route('category.index')->with('updateCategory','Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index')->with('deleteCategory','Category Deleted');
    }
}
