@extends('layouts.master')
@section('title','Authors')
@section('content')

@if(!Auth::user())
<div class="row">
<div class="col-md-10"></div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-lg mb-5 main-bg-color float-right" data-toggle="modal" data-target="#exampleModal">
  Subscribe Now
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title main-text-color" id="exampleModalLabel">Subscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('subscribers.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name" class="main-text-color">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="name" class="main-text-color">Email</label>
            <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text secondary-text-color">We'll never share your email with anyone else.</small>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn main-bg-color">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
@endif

<div class="row">
  @if(session()->has('status'))
  <div class="col-md-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Congratulations ..!</strong> {{session()->get('status')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
  @endif

@forelse($authors as $author)

@if($author->role->name != 'admin' && $author->name != 'Unknown')
<div class="card my-3 mx-4" style="width:20rem;">
  <div class="card-body">
    <img src="https://www.pngkey.com/png/detail/230-2301779_best-classified-apps-default-user-profile.png" alt="" class="img-fluid rounded">
    <h5 class="card-title mt-3">
      {{$author->name}}
    </h5>
    <h6 class="card-subtitle mb-2 my-3 text-muted">
      Stars - 5
    </h6>

    <br>
    <p class="card-text my-3">

    </p>
    @if(Auth::user()->role->name == 'admin')
    <a href="{{route('author-delete',$author->id)}}" class="card-link btn btn-danger">Delete</a>
    @endif
    <a href="{{ route('blog-posts.show',['blog_post'=>$author->id]) }}" class="card-link float-right btn btn-primary"> Read More</a>
  </div>
</div>
@endif
@empty

<div class="jumbotron col-md-12">
  <h1 class="display-4">Woops , No data available ...</h1>
  <p class="lead text-info mt-5">You can also be a star author. Getting Started Now !</p>
  <hr class="my-4">
  <a class="btn btn-lg btn-primary float-right" href="{{ route('blog-posts.create') }}" role="button">Getting Started</a>
</div>

@endforelse

</div>

<div class="row mt-3">
  <div class="col-md-5"></div>
  <div class="col-md-7">  {{ $authors->links() }} </div>
</div>
@endsection
