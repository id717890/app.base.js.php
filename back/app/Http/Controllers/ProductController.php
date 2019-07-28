<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserProduct;
use App\Models\UserProductAccept;
use App\User;
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

            $findAcception = UserProductAccept::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
            $prod['accept'] = $findAcception != null ? true : false;
            array_push($result, $prod);
        }
        return response()->json($result, 200);
    }

    public function acceptProduct()
    {
        $user= Input::get('user');
        $product= Input::get('product');
        $fio= Input::get('fio');
        $age= Input::get('age');
        $city= Input::get('city');
        $email= Input::get('email');
        $phone= Input::get('phone');

        $findUser = User::find($user);
        if (!isset($findUser)) return response()->json(['success'=>false, 'error'=>['code'=>1, 'message'=>'Пользователь не найден']], 404);

        $findProduct = Product::find($product);
        if (!isset($findProduct)) return response()->json(['success'=>false, 'error'=>['code'=>1, 'message'=>'Программа не найдена']], 404);

        $accept = UserProductAccept::create([
            'user_id'=> $user,
            'product_id'=>$product,
            'fio'=>$fio,
            'age'=>$age,
            'city'=>$city,
            'email'=>$email,
            'phone'=>$phone
        ]);
        return response()->json(200);
    }
}
