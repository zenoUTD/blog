@extends('layouts.master')
@section('title','View Post')
@section('content')

  <h4 class="text-primary display-4 my-3">{{$post->title}} </h4>

  <p class="text-danger mb-4">(author - {{ $post->author }}  , view - {{$post->view-1}})</p>

  <p>{{$post->content}}</p>

  <form action="{{url('blog-posts/'.$post->id)}}" method="post">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
    <button type="submit" class="float-left btn btn-danger mt-4" name="button">Delete</button>
  </form>


  <a href="{{ url('blog-posts') }}" class="float-right btn btn-success mt-4"> Back </a>


  <a href="{{ route('blog-posts.edit',['blog_post'=>$post->id]) }}" class="float-right btn btn-info mt-4 mx-5"> Edit </a>

@endsection
