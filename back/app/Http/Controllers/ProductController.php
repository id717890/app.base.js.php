<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserProduct;
use App\Models\UserProductAccept;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;

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

    public function getPrices () {
        return response()->json([
            ['value' => 2, 'text' => '2500 р.'],
            ['value' => 2.1, 'text' => '5000 р.']
        ], 200);
    }

    public function getMembers () {
        $challenge = DB::select('
        SELECT
        upa.*
        FROM user_product_accepts as upa
        LEFT JOIN user_products up ON up.user_id = upa.user_id and up.product_id = upa.product_id
        where upa.product_id = 2
        ');

        $flow = DB::select('
        SELECT
        upa.*,
        CASE
          WHEN up.price = 2 THEN "blue"
          WHEN up.price = 2.1 THEN "pink"
          ELSE "grey loghten2"
        END AS color,
        up.price
        FROM user_product_accepts as upa
        LEFT JOIN user_products up ON up.user_id = upa.user_id and up.product_id = upa.product_id
        where upa.product_id = 1
        ');
//        dd($challenge);
        return response()->json([
            'challenge' => $challenge,
            'flow' => $flow
        ], 200, ['Content-Type'=>'application/json; charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }
}
