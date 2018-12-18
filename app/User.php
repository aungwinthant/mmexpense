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
    public static function getTodayTransaction(User $user){
        return $user->transactions()->whereDate('created_at',Carbon::today())->get();
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
}
