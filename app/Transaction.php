<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'amount',
        'type'
];
    //
}
