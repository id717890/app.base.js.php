<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = array(
        'operation_id',
        'notification_type',
        'date',
        'amount',
        'withdraw_amount',
        'currency',
        'sender',
        'codepro',
        'label',
        'sha1hash',
        'sha1hash_server',
        'unaccepted',
        'yandex_string',
        'errors',
        'email'
    );
}
