@extends("master")
@section("content")
<div class="pagetitle">
    <h1>Blog</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Show</a></li>
        <li class="breadcrumb-item active">Post</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

   <!-- Card with header and footer -->
   <div class="card">
    <div class="card-header">POST N°S00{{$post->id}}</div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      {{$post->description}}
    </div>
    <div class="card-footer text-center">
      @if (Auth::id()===$post->user_id)
      <form action="{{url('/post/'.$post->id)}}" method="post">
        @csrf
        @method('delete')
        <a  href="{{url('/post/'.$post->id.'/edit')}}" class="btn btn-primary">Update</a>
        <button type="submit" class="btn btn-danger" onclick="return confirm(&quote; confirm delete? &quote)">Delete</button>
      </form>
      @else
        <span class="text text-primary" > Your action is limited on this post, because it does not belong to you!</span>
      @endif
      

    </div>
  </div><!-- End Card with header and footer -->


@endsection