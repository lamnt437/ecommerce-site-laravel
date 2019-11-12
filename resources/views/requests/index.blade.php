@extends('layouts.app')

@section('title', 'Request Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1>Request Dashboard</h1>
            </div>
            <div class="card">
                @foreach( $requests as $request )
                    <div class="card-header">
                        {{ $request->user->username }}
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="#">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <div>
                                        <input class="form-control" type="text" name="address" value="{{ $request->address }}" style="width:100%" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <div>
                                        <input class="form-control" type="text" name="phone" value="{{ $request->phone }}" style="width:100%" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="category">Seller Category</label>
                                    <div>
                                        <input class="form-control" type="text" name="category" value="{{ $request->seller_category->title }}" style="width:100%" disabled>
                                    </div>
                                </div>
                            </form>

                            <div class="text-danger">
                                <h3>({{ ($request->status)? 'rejected' : 'pending'}})</h3>
                            </div>

                            {{-- form approve/reject --}}
                            @if($request->status == false)
                                <form action="/requests/{{ $request->id }}/approve" method="post">
                                    @csrf()
                                    <input type="submit" value="Approve" class="border-0 p-2 bg-primary text-white" style="width:100%">
                                </form>
                                <form action="/requests/{{ $request->id }}/reject" method="post">
                                    @csrf()
                                    <input type="submit" value="Reject" class="border-0 p-2 bg-dark text-white" style="width:100%">
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection