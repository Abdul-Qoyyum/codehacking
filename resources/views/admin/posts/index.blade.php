@extends('layouts.admin')

@section('content')

<h3>Posts</h3>
 <table class="table">
  <thead>
   <tr>
    <th>id</th>
    <th>Photo</th>
    <th>Owner</th>
    <th>Category</th>
    <th>Title</th>
    <th>Body</th>
    <th>Created_at</th>
    <th>Updated_at</th>
   </tr>
  </thead>
  <tbody>
  @if($posts)
   @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td><img height="50" src="{{$post->photo ? $post->photo->file : 'No profile'}}" alt=""/></td>
      <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
      <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->body}}</td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
    </tr>
   @endforeach
  @endif
  </tbody>
 </table>
@stop
