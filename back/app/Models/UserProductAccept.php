<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProductAccept extends Model
{
    use Relation\BelongsTo\Product;
    use Relation\BelongsTo\User;

    protected $table = 'user_product_accepts';

    protected $fillable = array('user_id', 'product_id', 'fio', 'age', 'city', 'email', 'phone');

    protected $hidden = array('created_at','updated_at');
}
