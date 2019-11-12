@extends('layouts.app')

@section('title', 'Account Request')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1>Your Request</h1>
            </div>
            <div class="card">
                <div class="card-header">{{ $user->username }}</div>
                <div class="card-body">
                    <div>
                        @if($user->request == null)
                            @if($user->role_id == 2)
                                <p>You're already a seller!</p>
                            @else
                                <p>You don't have any request!</p>
                            @endif
                        @else
                            <h1>Request to become a Seller</h1>
                            <div>
                                <form action="#">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <div>
                                            <input class="form-control" type="text" name="address" value="{{ $user->request->address }}" style="width:100%" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <div>
                                            <input class="form-control" type="text" name="phone" value="{{ $user->request->phone }}" style="width:100%" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Seller Category</label>
                                        <div>
                                            <input class="form-control" type="text" name="category" value="{{ $user->request->seller_category->title }}" style="width:100%" disabled>
                                        </div>
                                    </div>
                                </form>

                                <div id="request-status" class="text-danger">
                                    <h3>({{ $user->request->status == true ? 'rejected' : 'pending' }})</h3>
                                </div>
                            </div>
                        @endif

                        @if($user->canRequest())
                            <a href="/requests/create">Become a Seller!</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection