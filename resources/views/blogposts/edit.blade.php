@extends('layouts.master')
@section('title','Edit Post')
@section('content')

<h3 class="display-4 mb-5 text-primary"> Edit </h3>

@if($errors->any())
  @foreach($errors->all() as $error)
    <p class="text-danger">{{$error}}</p>
  @endforeach
@endif

<form action="{{ route('blog-posts.update',['blog_post'=>$post->id])}}" method="post">
  @csrf
  <input name="_method" type="hidden" value="PUT">
  <div class="form-group row">
    <label for="inputTitle" class="col-sm-2 col-form-label text-primary">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title" value="{{$post->title}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputAuthor" class="col-sm-2 col-form-label text-primary">Author</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputAuthor" name="author" placeholder="Author" value="{{$post->author}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputContent" class="col-sm-2 col-form-label text-primary">Content</label>
    <div class="col-sm-10">
      <textarea name="content" class="form-control" rows="8" cols="80">{{$post->content}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <a href="{{ url('blog-posts',['blog_post'=>$post->id]) }}" class="btn btn-info"> Cancel </a>
      <button type="submit" class="btn btn-primary float-right"> Save </button>
    </div>
  </div>
</form>


@endsection
