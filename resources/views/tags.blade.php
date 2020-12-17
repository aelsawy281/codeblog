@extends('layouts/app')

@section('title')
List Of Posts
@endsection
@section('content')
<h2 class="mt-3">All tags in website</h2>
<ul>
   @foreach($tags as $tag)
   <li> {{$tag->name}}</li>
    @endforeach
</ul>

@endsection