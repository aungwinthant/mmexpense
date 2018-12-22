<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\CurrencyExchange;
use Carbon\Carbon;
class CurrencyExchangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $exchange_rates=CurrencyExchange::whereDate('created_at',Carbon::today())->get();

        return view('currency_exchange.index',compact('exchange_rates'));
    }
    //
}
