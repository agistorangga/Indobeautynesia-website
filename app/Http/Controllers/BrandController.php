<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::all();
        return view('back.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);

        $filename = "no-image";
        if($request->hasFile('image')) {
            $filename = 'photobrand/' . time() . '-' . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('photobrand/', $filename);
        }

        Brand::create([
            'name' => $request->name,
            'image' => $filename
        ]);

        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Brand::find($id);
        return view('back.brand.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $brand = Brand::find($id);
        $brand->name = $request->name;

        if($request->hasFile('image')) {
            $filename = 'photobrand/' . time() . '-' . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('photobrand/', $filename);
            $brand->image = $filename;
        }

        $brand->save();

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->route('brand.index');
    }
}
