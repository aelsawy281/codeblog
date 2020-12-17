
@extends('layouts/app')

@section('title')
List Of Posts
@endsection
@section('content')
@foreach($posts as $post)
    <h2><a href="{{url('posts/show',$post->id)}}">{{$post->title}}</a></h2>
    <p>{{$post->body}}</p>
    <hr/>
    @endforeach
@endsection