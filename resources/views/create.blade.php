@extends('layouts/app')

@section('content')
<div class="mt-3">
<form method="post" action="{{url('posts/store')}}">
@csrf
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Post Title</label>
  <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleFormControlInput1" placeholder="title">
        @error('title'){{$message}}@enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Post Body</label>
  <input type="text" name="body" value="{{old('body')}}" class="form-control" id="exampleFormControlInput1" placeholder="body">
    @error('body'){{$message}}@enderror
</div>

<button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
@endsection