<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Category;
use App\User;
class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $categories=Category::get();
        $transactions= Transaction::getTodayTransaction($request->user());
        $total_expense= Transaction::getTodayExpense($request->user());
        $total_income = Transaction::getTodayIncome($request->user());
        $net_total=$total_expense-$total_income;
        $totals=[
            'total_expense'=>$total_expense,
            'total_income' =>$total_income,
            'net_total' =>$net_total
        ];
        return view('transaction.index',compact('transactions','categories','totals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_data=$this->validate($request,[
            'amount' => 'required|numeric',
            'category_id'=> 'required|numeric',
            'description' => 'required|max:255'
        ]);
        if(request('income')){
            $validate_data['type']=1;
        }
        elseif(request('expense')){
            $validate_data['type']=2;
        }
        $transaction = $request->user()->transactions()->create(
            $validate_data
        );
        
        
        return redirect('/transactions');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction=Transaction::findOrFail($id);
        $transaction->delete();
        return back();
    }
    public static function getTransactionByCategory($category_id,User $user){
        $transactions=Transaction::getTransactionByCategory($category_id,$user);
        return view('transaction.viewbycategory',compact('transactions'));
    }
    public static function getTransactionHistory(User $user){
        $transactions=Transaction::getTransactionHistory($user)->paginate(10);
        return view('transaction.transactionhistory',compact('transactions'));
    }
}
