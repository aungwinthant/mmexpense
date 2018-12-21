<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
    public static function getTransactionByCategory(){
        return $user->transactions()->selectRaw(
                        "category_id,
                        COUNT(*) as count,
                        SUM(amount) as amount,
                        type,
                        DATE(created_at) as created_date")
                    ->whereDate('created_at',Carbon::today())
                    ->groupBy('category_id','type','created_date')
                    ->get();
    }
    //
}
