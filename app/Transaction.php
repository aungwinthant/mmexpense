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
    public static function getTodayTransaction(User $user){
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
    public static function getTodayExpense(User $user){
        return $user->transactions()->where('type',2)
                                    ->whereDate('created_at',Carbon::today())
                                    ->sum('amount');
    }
    public static function getTodayIncome(User $user){
        return $user->transactions()->where('type',1)
                                    ->whereDate('created_at',Carbon::today())
                                    ->sum('amount');
    }
    public static function getTransactionByCategory($category_id,User $user){
        return $user->transactions()->where('category_id',$category_id)
                                    ->whereDate('created_at',Carbon::today())->get();

    }
    public static function getTransactionHistory(User $user){
        return $user->transactions();
    }
    //
}
