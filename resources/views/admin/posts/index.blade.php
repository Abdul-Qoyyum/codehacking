@extends('layouts.admin')

@section('content')

<h3>Posts</h3>
 <table class="table">
  <thead>
   <tr>
    <th>id</th>
    <th>Photo</th>
    <th>Title</th>
    <th>Category</th>
    <th>Comments</th>
    <th>Posts</th>
    <th>Created_at</th>
    <th>Updated_at</th>
   </tr>
  </thead>
  <tbody>
  @if($posts)
   @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td><img height="50" src="{{$post->photo ? $post->photo->file : 'No prifile'}} " alt=""/></td>
      <td>{{$post->title}}</td>
      <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
      <td><a href="{{route('comments.show',$post->id)}}" >View Comments</a></td>
      <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
    </tr>
   @endforeach
  @endif
  </tbody>
 </table>

<div class="row">
 <div class="col-sm-6 col-sm-offset-5">
  {{$posts->links()}}
 </div>
</div>

@stop
