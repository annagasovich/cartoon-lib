@extends('layouts.app')

@section('title', $genre->name)

@section('sidebar')
    @parent
    {{--some_content--}}
@endsection

@section('content')
    <h1>Все мультфильмы жанра "{{$genre->name}}"</h1>

    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4">
                @include('parts.listing_item', ['item' => $item])
            </div>
        @endforeach
    </div>

@endsection
