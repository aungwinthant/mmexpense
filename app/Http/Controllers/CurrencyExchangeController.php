<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;

class CurrencyExchangeController extends Controller
{
    public function index(){
        $data = (new Helper())->get_currency_data();

        return view('index',compact('data'));
    }
    //
}
