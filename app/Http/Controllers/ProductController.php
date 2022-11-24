<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Redirect;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(7);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.form.product');

    }

    public function store(ProductRequest $request) {
        $data            = $request->all();
        $data['user_id'] = Auth::user()->id;
        Product::create($data);
        Session::flash(trans('lang.add_message'), trans('lang.added_product'));
        return Redirect::to('/products');	
    }

    public function show($id)
    {
        $product = Product::find($id); 
        return view('products.form.product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
        Session::flash(trans('lang.add_message'), trans('lang.updated_product'));
        return Redirect::to('/products');
    }

    public function destroy(int $id) {
        Product::find($id)->delete();
        Session::flash(trans('lang.delete_message'), trans('lang.product_removed'));
        return Redirect::to('/products');	
    }

}
