@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts AS $eachPost)
            <div class="well">
                <h3><a href="{{route('posts.show',$eachPost->id)}}">{{$eachPost -> title}}</a></h3>
                <small>Written On - {{$eachPost -> created_at}}</small>
            </div>
        @endforeach
        <a href="{{route('posts.create')}}" id="sliderWorkButton"> Create Post</a>

    @else
        <p>No result Found</p>

    @endif


@endsection
