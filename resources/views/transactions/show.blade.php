@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transactions Show') }}</div>

                <div class="card-body">
                
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$transaction->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="number" name="amount" class="form-control" value="{{$transaction->amount}}" readonly>
                    </div>

                    <div class="form-group pt-2">
                    <!-- <a href="/transactions" class="btn btn-primary">Back</a> -->
                    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
