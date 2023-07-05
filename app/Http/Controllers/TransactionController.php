<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        //check if keyword exist
        if($request->keyword != null){
            //query using keyword only
            $user = auth()->user(); //user yg tengah login
            $transactions = $user->transactions()->orWhere('name', 'LIKE', "%$request->keyword%")
                            ->orWhere('amount', 'LIKE', "%$request->keyword%")
                            ->paginate();
        }
        else {
            // query current user -> transactions() sahaja
            $user = auth()->user(); //user yg tengah login
            
            //query all transaction from tables 'transactions' using Transaction model
            //$transactions = \App\Models\Transaction::paginate();
            $transactions = $user->transactions()->paginate();

        }

        // return view with transactions data
        // return view resources/views/transactions/index.php
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        //nak check data tu ade ke tidak
        //dd($request->all());

        //store to table transactions using Transaction model
        $transaction = new \App\Models\Transaction();
        $transaction->name = $request->name;
        $transaction->amount = $request->amount;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        // return redirect to transactions index page
        return redirect()->to('/transactions');
    }

    //Transaction tu adalah model...
    public function show(\App\Models\Transaction $transaction)
    {
        $this->authorize($transaction);
        return view('transactions.show', compact('transaction'));
    }

    public function edit(\App\Models\Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    //
    public function update(\App\Models\Transaction $transaction, Request $request)
    {
        // POPO= Plain Old PHP Object
        //nk update transaction dkt name, data dari form dh assign dlm $request
        $transaction->name= $request->name;
        $transaction->amount= $request->amount;
        $transaction->save();

        return redirect()->to('/transactions');

    }

    public function delete(\App\Models\Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
