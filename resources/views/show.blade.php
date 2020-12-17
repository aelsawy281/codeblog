@extends('layouts/app')

@section('title')
show Of Post
@endsection
@section('content')
    <h1 class="mt-3">{{$post->title}}</h1>
<h5>{{$post->body}}</h5>
<div class="mt-3">
    <a href="{{url('posts/edit',$post->id)}}" class="btn btn-primary">Edit</a>
    <a href="{{url('posts/delete',$post->id)}}" class="btn btn-danger">Delete</a>
   
</div>
@endsection



