<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyExchange extends Model
{
    protected $table = 'currency_exchange';

    protected $fillable = ['title','currency','buy','sell','created_at','updated_at'];

    //
}
