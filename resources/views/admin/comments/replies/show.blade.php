@extends('layouts.admin')

@section('content')

 @if(count($replies))
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
     @foreach($replies as $reply)
         <tr>
           <td>{{$reply->id}}</td>
           <td>{{$reply->author}}</td>
           <td>{{$reply->email}}</td>
           <td>{{$reply->body}}</td>
<td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
            @if($reply->is_active))
            <td>
    {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])  !!}
      <input type="hidden" name="is_active" value="0" />
     {!! Form::submit('Un-approve',['class'=>'btn btn-primary'])  !!}
    {!! Form::close()  !!}
            </td>
             @else
<td>
{!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])  !!}
   <input type="hidden" name="is_active" value="1" />
     {!! Form::submit('Approve',['class'=>'btn btn-success'])  !!}
   {!! Form::close()  !!}
            </td>
            @endif
         <td>
{!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]])  !!}
{!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
 {!! Form::close()  !!}                                                                                 </td>
         </tr>                                                                                        @endforeach
    </tbody>
   </table>
  @else
<h3 class="text-center">No comment(s)</h3>
     @endif

  @stop
