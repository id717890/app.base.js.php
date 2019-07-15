<?php

namespace App\Models\Relation\BelongsTo;

trait Product
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}