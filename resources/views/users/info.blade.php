@extends('layouts.app')

@section('title', 'Account Information')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->username }}</div>
                <div class="card-body">
                    <ul>
                        <li>{{ $user->fullname }}</li>
                        <li>{{ $user->email }}</li>
                        <li>{{ $user->role->title }}</li>

                        @if($user->role_id == 2)
                            <li>{{ $user->phone }}</li>
                            <li>{{ $user->address }}</li>
                            <li>{{ $user->seller_category->title }}</li>
                        @endif
                    </ul>
                </div>
                <div>
                    @if($user->canRequest())
                        <a href="/requests/create">Become a Seller!</a>
                    @endif
                </div>
                <div>
                    <a href="/users/{{ $user->id }}/request">View request status</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection