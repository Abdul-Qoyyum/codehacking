@extends('layouts.admin')

@section('content')

 @if(count($comments))
  <h3>Comments</h3>
   <table class="table">
    <thead>
     <tr>
       <td>Id</td>
       <td>Author</td>
       <td>Email</td>
       <td>Body</td>
     </tr>
    </thead>
    <tbody>
       @foreach($comments as $comment)
         <tr>
           <td>{{$comment->id}}</td>
           <td>{{$comment->author}}</td>
           <td>{{$comment->email}}</td>
           <td>{{$comment->body}}</td>
           <td><a href="{{route('home.post',$comment->post_id)}}">View Post</a></td>
 <td><a href="{{route('replies.show',$comment->id)}}">View Replies</a></td>
            @if($comment->is_active)
            <td>
    {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]])  !!}
      <input type="hidden" name="is_active" value="0" />
     {!! Form::submit('Un-approve',['class'=>'btn btn-primary'])  !!}
    {!! Form::close()  !!}
            </td>
             @else
            <td>
    {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]])  !!}
      <input type="hidden" name="is_active" value="1" />
     {!! Form::submit('Approve',['class'=>'btn btn-success'])  !!}
    {!! Form::close()  !!}
            </td>
            @endif
         <td>
{!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]])  !!}
{!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
 {!! Form::close()  !!}
            </td>
         </tr>
       @endforeach
    </tbody>
   </table>
 @else
   <h3 class="text-center">No comment(s)</h3>
 @endif

@stop
