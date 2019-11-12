@extends('layouts.app')

@section('title', 'Account Request')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->username }}</div>
                <div class="card-body">
                    <div>
                        @if($user->request == null)
                            <p>You don't have any request!</p>
                        @else
                            <h1>Request</h1>
                            <ul>
                                <li>{{ $user->request->address }}</li>
                                <li>{{ $user->request->phone }}</li>
                                <li>{{ $user->request->seller_category->title }}</li>
                                ({{ ($user->request->status == false)? 'pending' : 'rejected' }})
                            </ul>
                        @endif

                        @if($user->canRequest())
                            <a href="/requests/create">Become a Seller!</a>
                        @endif
                    </div>
                </div>
                <div>
                    @if($user->canRequest())
                        <a href="/requests/create">Become a Seller!</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection