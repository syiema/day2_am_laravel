<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //query all transactions from table transaction using Transaction.php model
        //sort 
        $users = \App\Models\User::orderBy('name','ASC')->paginate(10);

        // return view with transactions data
        // return view resources/views/transactions/index.php
        return view('users.index', compact('users'));
    }
} 
