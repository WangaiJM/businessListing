@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit a List</div>

                <div class="card-body">
                    @include('inc.messages')
                    <form action="/listing/{{$listing->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$listing->name}}">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" value="{{$listing->website}}">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$listing->email}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$listing->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="{{$listing->address}}">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="article-ckeditor" cols="30" rows="10" class="form-control">{{$listing->bio}}</textarea>
                        </div>
                        <div class="form-group d-flex">
                            <input type="submit" value="EDIT" class="ml-auto btn btn-primary btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
