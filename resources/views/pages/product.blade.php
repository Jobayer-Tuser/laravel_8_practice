
@extends('layouts.app')
@section('content')

      <h1><?php echo $title ?></h1>

      @if (count($product) > 0)
      <ul class="list-group">
          @foreach($product AS $eachProduct)
          <li class="list-group-item">{{$eachProduct}}</li>
          @endforeach
      </ul>
      @endif

 @endsection
