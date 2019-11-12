@extends('layouts.app')

@section('title', 'Create request')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1>Form Request</h1>
            </div>
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form method="post" action='/requests/store' id='request_form'>
                        @csrf()
                        <div class="form-group">
                            <label for="address">Address</label>
                            <div>
                                <input class="form-control" type="text" name="address" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <div>
                                <input class="form-control"type="text" name="phone" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select_category_id">Select Category</label>
                            <select class="form-control" name="seller_category_id" form='request_form'>
                                @foreach($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <input class="form-control" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection