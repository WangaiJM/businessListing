@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$listing->name}}</h2></div>

                @include('inc.messages')

                    <div class="card-body">
                        <h5>{{$listing->website}}</h5>
                        <br>
                        <h5>{{$listing->email}}</h5>
                        <br>
                        <h5>{{$listing->address}}</h5>
                        <br>
                        <h5>{{$listing->phone}}</h5>
                        <br>
                        <div class="card">
                            <p>
                                <div class="container">
                                    {!! $listing->bio !!}
                                </div>
                            </p>
                        </div>
                        <div class="container">
                            <div class=" d-flex">
                            @if(!Auth::guest())

                            @if(Auth::user()->id === $listing->user_id)
                                <form action="/listing/{{$listing->id}}" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" hidden value="{{$listing->name}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="website" hidden value="{{$listing->website}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" hidden value="{{$listing->email}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" hidden value="{{$listing->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" hidden value="{{$listing->address}}">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="bio" id="" cols="30" rows="10" class="form-control" hidden> {{$listing->bio}} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="DELETE" class="ml-auto btn btn-danger btn-lg">
                                    </div>
                                </form>
                                <a href="/listing/{{$listing->id}}/edit" class="btn btn-lg btn-primary ml-auto mt-4">EDIT</a>
                            
                            @endif
                            
                            @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
