<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('back.promo.index', compact('promos'));
    }

    public function create()
    {
        $products = Product::all();
        return view('back.promo.create', compact('products'));
    }

    public function store(Request $request)
    {
        $filename = "no-image";
        if ($request->hasFile('photo')) {
            $filename = time() . '-' . rand() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move('photopromo/', $filename);
        }

        $promoId = Promo::insertGetId([
            'name' => $request->name,
            'photo' => $filename,
            'discount' => $request->discount,
            'description' => $request->description,
            'is_active' => $request->is_active ? 1 : 0
        ]);

        foreach ($request->products as $item) {
            $product = Product::find($item);
            $product->promo_id = $promoId;
            $product->save();
        }

        return redirect()->route('promo.index')
            ->with('success', 'Promo created successfully.');
    }

    public function show($id)
    {
        $promo = Promo::find($id);
        return view('back.promo.show', compact('promo'));
    }

    public function edit($id)
    {
        $promo = Promo::find($id);
        $products = Product::all();
        return view('back.promo.edit', compact('promo', 'products'));
    }

    public function update(Request $request, $id)
    {
        $promo = Promo::find($id);
        $promo->name = $request->name;
        $promo->discount = $request->discount;
        $promo->description = $request->description;
        $promo->is_active = $request->is_active ? 1 : 0;
        if($request->hasFile('photo')) {
            $filename = time() . '-' . rand() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move('photopromo/', $filename);
            $promo->photo = $filename;
        }

        $promo->save();
        
        foreach ($request->products as $item) {
            $product = Product::find($item);
            $product->promo_id = $id;
            $product->save();
        }

        return redirect()->route('promo.index');
    }

    public function destroy($id)
    {
        $promo = Promo::find($id);
        $promo->delete();

        return redirect()->route('promo.index');
    }
}
