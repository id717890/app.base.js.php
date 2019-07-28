<?php

namespace App\Models\Relation\BelongsTo;

trait User
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}