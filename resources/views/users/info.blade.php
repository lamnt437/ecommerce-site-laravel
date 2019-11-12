@extends('layouts.app')

@section('title', 'Account Information')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1>User Information</h1>
            </div>
            <div class="card">
                <div class="card-header">{{ $user->username }}</div>
                <div class="card-body">
                    <div>
                        <form action="#">
                            <div class="form-group">
                                <label for="fullname">Full name</label>
                                <div>
                                    <input class="form-control" type="text" name="fullname" value="{{ $user->fullname }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div>
                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <div>
                                    <input class="form-control" type="text" name="role" value="{{ $user->role->title }}" disabled>
                                </div>
                            </div>

                            @if($user->role_id == 2)
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <div>
                                        <input class="form-control" type="text" name="address" value="{{ $user->address }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <div>
                                        <input class="form-control" type="text" name="phone" value="{{ $user->phone }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="category">Seller category</label>
                                    <div>
                                        <input class="form-control" type="text" name="category" value="{{ $user->seller_category->title }}" disabled>
                                    </div>
                                </div>
                            @endif
                        </form>
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