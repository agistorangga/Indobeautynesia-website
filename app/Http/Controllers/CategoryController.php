<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('back.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('back.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Category::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index');
    }
}