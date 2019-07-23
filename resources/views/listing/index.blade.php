@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>Listings</h2>
                    <a href="/listing/create" class="btn btn-lg btn-primary ml-auto">Create a listing</a>
                </div>

                @include('inc.messages')

                @foreach($listings->all() as $listing)
                    <div class="card-body">
                        <a href="/listing/{{$listing->id}}">{{$listing->name}}</a>
                    </div>
                @endforeach

                <div class="container d-flex justify-content-center">
                    {{$listings->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
