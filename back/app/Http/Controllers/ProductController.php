<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function update(Request $request)
    {
        $findProduct = Product::find(Input::get('id'));
        if ($findProduct !== null) {
            $findProduct->price = Input::get('price');
            $findProduct->save();
            return response()->json(200);
        } else return response()->json('ID Not found', 404);
    }

    public function get()
    {
        $free = Product::getFree();
        $products = UserProduct::getUserProducts(Auth::user()->id);
        dd($products);
        dd($free->merge($products));
        dd($free->merge($products));
        array_merge($products, Product::getFree()->toArray());
        return response()->json(UserProduct::getUserProducts(Auth::user()->id));
    }
}
