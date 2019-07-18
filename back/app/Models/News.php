<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = array('title', 'image', 'text');

    protected $hidden = array('updated_at');
}
