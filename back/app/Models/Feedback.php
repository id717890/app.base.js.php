<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = array('name', 'email', 'text_user', 'text_admin', 'is_show');

    protected $hidden = array('updated_at');
}
