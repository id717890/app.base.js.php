<?php

namespace App\Models\Relation\HasMany;

trait Day
{
    public function days()
    {
        return $this->HasMany('App\Models\Day', 'product_id');
    }
}