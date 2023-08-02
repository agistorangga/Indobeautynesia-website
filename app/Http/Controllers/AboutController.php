<?php

namespace App\Http\Controllers;

use App\Http\Traits\GlobalTrait;
use App\Models\About;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        return view('front.about.index', compact('global'));
    }

    public function index()
    {
        $data = About::all();

        return view('back.about.index', compact('data'));
    }

    public function create()
    {
        $data = About::all();
        return view('back.about.create', compact('data'));
    }

    public function store(Request $request)
    {

        $data = About::create($request->all());

        return redirect()->route('about.index');
    }

    public function edit($id)
    {

        $data = About::find($id);
        return view('back.about.edit', compact('data'));
    }


    public function update(Request $request, $id) {

        $about = About::find($id);
        $about->key = $request->key;
        $about->value = $request->value;

        $about->save();

        return redirect()->route('about.index');
    }


    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();

        return redirect()->route('about.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = About::where('column', 'LIKE', '%' . $query . '%')->get();

        return view('search-results', compact('results'));
    }
}
