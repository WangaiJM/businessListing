@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a List</div>

                <div class="card-body">
                    @include('inc.messages')
                    <form action="/listing" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="article-ckeditor" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group d-flex">
                            <input type="submit" value="Register" class="ml-auto btn btn-primary btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
