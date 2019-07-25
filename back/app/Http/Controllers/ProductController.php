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
        $products = Product::all();
        $result = [];
        foreach($products as $product) {
            $prod = [];
            $prod['product'] = $product->toArray();
            $findPayment = UserProduct::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
            if ($product->price == 0) {
                $prod['days'] = $product->days->toArray();
            } else if ($product->price != 0 && $findPayment != null) {
                $prod['days'] = $product->days->toArray();
            } else if ($product->price != 0 && $findPayment == null) {
                $prod['days'] = null;
            }
            array_push($result, $prod);
        }
        return response()->json($result, 200);
    }
}
