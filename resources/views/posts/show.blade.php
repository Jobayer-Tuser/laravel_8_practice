@extends('layouts.app')

@section('content')
    <br/>
    <a href="{{route('posts')}}" class="btn btn-primary">Go Back</a>
    <h3>{{$posts->title}}</h3>
    <div>
        <p>{{$posts->body}}</p>
    <div>

    <hr/>
    <small>Written On - {{$posts->created_at}}</small>

@endsection
