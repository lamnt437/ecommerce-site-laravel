@extends('layouts.app')

@section('title', 'Request Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>
                    <ul>
                        @foreach($requests as $request)
                            <li>{{ $request->address }} ({{ ($request->status)? 'rejected' : 'pending'}})</li>
                            @if($request->status == false)
                                <form action="/requests/{{ $request->id }}/approve" method="post">
                                    @csrf()
                                    <input type="submit" value="Approve">
                                </form>
                            @endif
                            @if($request->status == false)
                                <form action="/requests/{{ $request->id }}/reject" method="post">
                                    @csrf()
                                    <input type="submit" value="Reject">
                                </form>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection