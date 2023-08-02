<?php

namespace App\Http\Controllers;

use App\Http\Traits\GlobalTrait;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use GlobalTrait;

    public $global;

    public function __construct()
    {
        $this->global = $this->getAllVariables();
    }

    public function indexfront(Request $request)
    {
        $global = $this->global;
        $data = Product::query();

        if ($request->has('bundling_id')) {
            $data->where('is_bundle', $request->query('bundling_id'));
        }

        if ($request->has('category_id')) {
            $data->where('category_id', $request->query('category_id'));
        }

        if ($request->has('brand_id')) {
            $data->where('brand_id', $request->query('brand_id'));
        }

        $products = $data->paginate(16);

        $categories = Category::all();
        $brands = Brand::all();

        return view('front.product.index', compact('global', 'products', 'categories', 'brands'));
    }

    public function detail($id)
    {
        $global = $this->global;
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        return view('front.product.detail', compact('global', 'categories', 'brands', 'product'));
    }

    public function index(Request $request)
    {
        $data = Product::paginate(25);
        return view('back.products.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('back.products.create', compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $filename = "no-image";
        if($request->hasFile('photo')) {
            $filename = time() . '-' . rand() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move('photoproduct/', $filename);
        }

        $data = Product::create([
            'name' => $request->name,
            'subtitle' => $request->subtitle,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'is_bundle' => $request->is_bundle ? 1 : 0,
            'price' => $request->price,
            'size' => $request->size,
            'description' => $request->description,
            'how_to_use' => $request->how_to_use,
            'ingredients' => $request->ingredients,
            'photo' => $filename,
        ]);


        return redirect()->route('products.index');
    }

    public function edit($id)
    {

        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('back.products.edit', compact('product', 'categories', 'brands'));
    }


    public function update(Request $request, $id) {

        $product = Product::find($id);
        $product->name = $request->name;
        $product->subtitle = $request->subtitle;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->is_bundle = $request->is_bundle ? 1 : 0;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->description = $request->description;
        $product->how_to_use = $request->how_to_use;
        $product->ingredients = $request->ingredients;

        if($request->hasFile('photo')) {
            $filename = time() . '-' . rand() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move('photoproduct/', $filename);
            $product->photo = $filename;
        }

        $product->save();

        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
