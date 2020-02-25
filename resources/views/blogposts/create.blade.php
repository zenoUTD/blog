@extends('layouts.master')
@section('title','Create Post')
@section('content')

<h3 class="display-4 mb-5 text-primary"> Create new post </h3>

@if($errors->any())
  @foreach($errors->all() as $error)
    <p class="text-danger">{{$error}}</p>
  @endforeach
@endif

<form action="{{url('blog-posts')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="inputTitle" class="col-sm-2 col-form-label text-primary">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title" vlaue={{old('title')}}>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputTitle" class="col-sm-2 col-form-label text-primary">Upload Image</label>
    <div class="col-sm-10">
      <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputContent" class="col-sm-2 col-form-label text-primary">Content</label>
    <div class="col-sm-10">
      <textarea name="content" class="form-control" rows="8" cols="80">{{old('content')}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary float-right"> Submit </button>
    </div>
  </div>
</form>


@endsection
