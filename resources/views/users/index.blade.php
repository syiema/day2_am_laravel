@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Nric</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total transactions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                       <tr>
                        <th scope="row">{{($users->perPage() * ($users->currentPage() - 1)) + $key + 1 }}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->nric}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->transactions->count()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
