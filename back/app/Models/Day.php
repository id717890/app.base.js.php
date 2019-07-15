<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use Relation\BelongsTo\Product;

    protected $table = 'days';

    protected $fillable = array('product_id', 'day', 'title', 'url', 'description');

    protected $hidden = array('created_at','updated_at');
}
