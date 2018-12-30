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
    public function index()
    {
        //
        $categories=Category::get();
        $transactions= auth()->user()->getTransactionByDate();
        $total_expense= auth()->user()->getTodayExpense();
        $total_income = auth()->user()->getTodayIncome();
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
            'amount' => 'required|numeric|min:100|digits_between: 0,9',
            'category_id'=> 'required|numeric',
            'description' => 'required|min:1|max:255',
            'expenseincome'=>'required'
        ]);
        if(request('expenseincome')=="income"){
            $validate_data['type']=1;//income
        }
        elseif(request('expenseincome')=="expense"){
            $validate_data['type']=2;//expense
        }
        $transaction = auth()->user()->transactions()->create(
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

        $this->authorize('update',$transaction);

        $transaction->delete();
        return redirect('/transactions');
    }
    
    public function getTransactionByCategory($category_id){
        $transactions=auth()->user()->getTransactionByCategory($category_id);
        //authorizations before passing views
        $this->authorizeTransactions($transactions);
       
        return view('transaction.viewbycategory',compact('transactions'));
    }
    public function getTransactionHistory(){
        $transactions=auth()->user()->getTransactionHistory()->paginate(10);

        $this->authorizeTransactions($transactions);

        return view('transaction.transactionhistory',compact('transactions'));
    }
    public function authorizeTransactions($transactions){
        
        if($transactions->isEmpty()){
            abort(404);
        }
        foreach ($transactions as $transaction) {
            $this->authorize('update',$transaction);
        }
    }
}
