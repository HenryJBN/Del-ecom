<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['PageTitle'] = "All Transaction";
        // $data['trans']= Transaction::orderby('created_at','desc')->get();
        $data['trans']= DB::table('transactions')
         ->leftJoin('users','transactions.email_address','=','users.email')
         ->orderby('transactions.transaction_date','desc')->get();


        //  dd($data['trans']);
        return view('admin.trans.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Transaction $transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Transaction $transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Transaction         $transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Transaction $transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
    }
}
