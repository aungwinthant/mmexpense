<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\CurrencyExchange;

class CurrencyExchangeController extends Controller
{
    public function index(){

        $exchange_rates=CurrencyExchange::get();

        return view('index',compact('exchange_rates'));
    }
    //
}
