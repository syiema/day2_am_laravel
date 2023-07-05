@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Total transactions: {{ $transactions->count()}}
                    <br>
                    Total Amount Transactions: RM{{ $transactions->sum('amount')}}
                    <br>
                    Average Amount Transactions: RM{{ number_format($transactions->avg('amount'), 2)}}
                    <br>
                    Maximum Amount Transactions: RM{{ $transactions->max('amount')}}
                    <br>
                    Minimum Amount Transactions: RM{{ $transactions->min('amount')}}
                    <br>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transactions') }}</div>                   
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" value="{{ request()->get('keyword') }}" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create New Transaction</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">User</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                       <tr>
                        <th scope="row">{{$transaction->id}}</th>
                        <td>{{$transaction->name}}</td>
                        <td>{{$transaction->amount}}</td>
                        <!-- ini nak display data dari 2 table yang dah join.. nk display name dari table user dalam transaction -->
                        <td>{{$transaction->user->name}}</td>
                        <td>
                            <!-- Ada 2 cara 1. Guna html 2. Guna route -->
                            <!-- <a href="/transactions/{{$transaction->id}}" class="btn btn-primary">Show</a> -->
                            <a href="{{ route('transactions.show', $transaction) }}" class="btn btn-primary mx-2">Show</a>

                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-success">Edit</a>

                            <a href="{{ route('transactions.delete', $transaction) }}" class="btn btn-danger mx-2" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
