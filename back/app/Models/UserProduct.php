<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    use Relation\HasMany\Day;

    protected $table = 'products';

    protected $fillable = array('name', 'price', 'description', 'days', 'icon');

    protected $hidden = array('created_at','updated_at');

    protected $appends = ['count_days'];

    public function getCountDaysAttribute() {
        return $this->days()->count();
    }

    public static function getFree() {
        return Product::where('price','=', 0)->get();
    }
}
