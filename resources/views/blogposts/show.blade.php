@extends('layouts.master')
@section('title','View Post')
@section('content')

  <h4 class="text-primary display-4 my-3">{{$post->title}} </h4>

  <p class="text-danger mb-4">(author - {{ $post->author }}  , view - {{$post->view-1}})</p>

  <p>{{$post->content}}</p>

  <span class="font-weight-bold">Comments</span>
  <form action="{{route('post-comment')}}" method="POST">
  @csrf
  @foreach($comments as $comment)
  <div class="form-group">
    <br>
    <span class="float-left text-primary">{{$comment->user->name}}</span>
    <span class="float-right text-primary">{{$comment->created_at->diffForHumans()}}</span>
    
    <input class="form-control" type="text" value="{{$comment->comment}}" readonly>

  </div>
  @endforeach

  @if(Auth::user())
  <input type="hidden" name="post_id" value="{{$post->id}}">
  <br>
  <span>Enter your comment :</span>
  <div class="row">

  <div class="form-group col-md-10">
    <label for="exampleFormControlFile1"></label>
    <input class="form-control" type="text" name="comment" value="" autofocus>
  </div>
  <button type="submit" class="col-md-2 mt-3 float-right btn btn-lg btn-primary mb-5" name="button">Done</button>

  @endif

    </div>
</form>

<div class="row my-5">
  <div class="col-md-12">

  <a href="{{ url('blog-posts') }}" class="float-left btn btn-success mt-4"> Back </a>

  @if(Auth::user())
  @if(Auth::user()->role->name == 'admin')
  <!---Start Admin Permision -->
  <form action="{{url('blog-posts/'.$post->id)}}" method="post">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
    <button type="submit" class="float-right btn btn-danger mt-4" name="button">Delete</button>
  </form>
  <a href="{{ route('blog-posts.edit',['blog_post'=>$post->id]) }}" class="float-right btn btn-info mt-4 mx-5"> Edit </a>
  <!--- End Admin Permision -->
  @endif

  @endif
  </div>
</div>
@endsection
