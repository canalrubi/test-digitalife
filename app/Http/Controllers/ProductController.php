<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Product;
use App\Helpers\FilesHelper;
use Illuminate\Http\Request;
use App\Helpers\MessagesHelper;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.forms.index');

    }

    public function store(ProductRequest $request) {
       
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Product::create($data);
        $product  = Product::latest()->first();
        FilesHelper::saveFiles($request, $product->id);
        return MessagesHelper::getMessage(trans('lang.add_message'), trans('lang.added_product'));

    }

    public function show($id)
    {
        $product = Product::find($id); 
        return view('products.forms.index', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
        FilesHelper::updateFiles($request, $id);
        return MessagesHelper::getMessage(trans('lang.add_message'), trans('lang.updated_product'));

    }

    public function destroy(int $id) {
        Product::find($id)->delete();
        return MessagesHelper::getMessage(trans('lang.delete_message'), trans('lang.product_removed'));
    }

}
