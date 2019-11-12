@extends('layouts.app')

@section('title', 'Create request')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="post" action='/requests/store' id='request_form'>
                    @csrf()
                    <div>
                        <label for="address">Address</label>
                        <div>
                            <input type="text" name="address">
                        </div>
                    </div>

                    <div>
                        <label for="phone">Phone</label>
                        <div>
                            <input type="text" name="phone">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" value="{{ $user->id }}" name='user_id'>
                    </div>

                    <div>
                        <input type="submit" value="Submit">
                    </div>
                </form>
                <div>
                    <label for="select_category_id">Select Category</label>
                    <select name="seller_category_id" form='request_form'>
                        @foreach($categories as $category)
                            <option value={{ $category->id }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection