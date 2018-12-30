<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
        'type',
        'description'
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    } 
    //
}
