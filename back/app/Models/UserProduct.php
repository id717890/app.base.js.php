<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserProduct extends Model
{
    use Relation\BelongsTo\Product;

    protected $table = 'user_products';

    protected $fillable = array('user_id', 'product_id', 'payment_id', 'price');

    protected $hidden = array('created_at','updated_at');

    public static function getUserProducts($user_id) {
        $products = DB::table('products')
//            ->distinct()
            ->select('products.name', 'products.photo', 'user_products.price')
            ->join('user_products', function($join) use ($user_id) {
                $join
                    ->on('user_products.product_id', '=', 'products.id')
                    ->where('user_products.user_id', '=', $user_id);
            })
//            ->where('products.price', '=', 0)
//            ->orderBy('categoryorder.order')
            ->get();
        return $products;


        return UserProduct::where('price','=', 0)->where('user_id', '=', $user_id)->where('product', '=', 1)->get();
    }
}
