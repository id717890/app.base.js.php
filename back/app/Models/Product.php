<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Relation\HasMany\Day;

    protected $table = 'products';

    protected $fillable = array('name', 'price', 'description', 'days');

    protected $hidden = array('created_at','updated_at');

    protected $appends = ['count_days'];

    public function getCountDaysAttribute() {
        return $this->days()->count();
    }
}
