
@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

    <form action="{{route('add.posts')}}" method="POST">
        @csrf
          <div class="">
            <label for="">Blog title</label>
            <input name="title" type="text" class="" id="">
          </div>
          <div class="">
            <label for="">Description</label>
            <input name="description" type="textarea" class="form-control" id="">
          </div>
          <button id="sliderWorkButton" type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
