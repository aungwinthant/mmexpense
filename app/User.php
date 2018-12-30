<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
    public function getTransactionByDate(){
        return $this->transactions()->selectRaw(
                                        "category_id,
                                        COUNT(*) as count,
                                        SUM(amount) as amount,
                                        type,
                                        DATE(created_at) as created_date")
                                    ->whereDate('created_at',Carbon::today())
                                    ->groupBy('category_id','type','created_date')
                                    ->get();
    }
    public function getTodayExpense(){
        return $this->transactions()->where('type',2)
                                    ->whereDate('created_at',Carbon::today())
                                    ->sum('amount');
    }
    public function getTodayIncome(){
        return $this->transactions()->where('type',1)
                                    ->whereDate('created_at',Carbon::today())
                                    ->sum('amount');
    }
    public function getTransactionByCategory($category_id){
        return $this->transactions()->where('category_id',$category_id)
                                    ->whereDate('created_at',Carbon::today())->get();

    }
    public function getTransactionHistory(){
        return $this->transactions();
    }
}
