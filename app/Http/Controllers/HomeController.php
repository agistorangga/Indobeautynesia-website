<?php

namespace App\Http\Controllers;

use App\Http\Traits\GlobalTrait;
use App\Models\About;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use GlobalTrait;

    public $global;

    public function __construct()
    {
        $this->global = $this->getAllVariables();
    }

    public function index()
    {
        $global = $this->global;

        $categories = Category::all();
        $brands = Brand::all()->random(5);
        $products = Product::all();
        $new_arrival = Product::limit(4)->latest()->get();
        $promo = Promo::where('is_active', true)->get();
        $promo_footer = Promo::where('is_active', true)->latest()->first();
        $packages = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.is_bundle', true)
            ->where('categories.name', 'Skincare')
            ->get();

        return view('front.home.index', compact('global', 'products', 'categories', 'brands', 'promo', 'packages', 'new_arrival', 'promo_footer'));
    }

    public function promo($id, Request $request)
    {
        $global = $this->global;

        $data = Product::join('promos', 'products.promo_id', '=', 'promos.id')->select('products.*', 'promos.name as promo_name')->where('products.promo_id', '=', $id);

        if ($request->has('bundling_id')) {
            $data->where('products.is_bundle', $request->query('bundling_id'));
        }

        if ($request->has('category_id')) {
            $data->where('products.category_id', $request->query('category_id'));
        }

        if ($request->has('brand_id')) {
            $data->where('products.brand_id', $request->query('brand_id'));
        }

        $products = $data->paginate(16);

        return view('front.promo.index', compact('global', 'products'));
    }
}
