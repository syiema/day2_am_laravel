@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transactions Create') }}</div>

                <div class="card-body">
                    <form action="" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" name="amount" class="form-control">
                        </div>

                        <div class="form-group pt-2">
                            <a href="{{ route('transactions.index') }}" class="btn btn-light">Back</a>
                            <button type="submit" class="btn btn-success">Save Transaction</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
