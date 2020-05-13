@extends('layouts.blog-post')

@section('content')
           <!-- Blog Post -->
  @if(Session::has('comment_message'))
   <div class="alert alert-success">
     <p>{{session('comment_message')}}</p>
   </div>
  @endif

@if(Session::has('comment_reply'))
   <div class="alert alert-success">
    <p class="text-center white">{{session("comment_reply")}}</p>
   </div>
@endif
                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{!! $post->body !!}</p>
                <hr>

                <!-- Blog Comments -->

@if(Auth::check())
                <!-- Comments Form -->
<div class="well">
  {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store','role'=>'form']) !!}
<div class="form-group">
  <input type="hidden" name="post_id" value="{{$post->id}}" />
  {!! Form::label('body','Leave a Comment',['class'=>'control-label']) !!}
  {!! Form::textarea('body',null, ['class'=>'form-control','rows'=>'3'])  !!}
</div>
  {!! Form::submit('Create Comment',['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}
</div>
@endif

                <hr>

      <!-- Posted Comments -->
 @if(count($comments))
   @foreach($comments as $comment)

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64"  class="media-object" src="{{Auth::user()->gravatar}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
<button class="toggle-reply btn btn-primary">Reply</button>
<div class="replies">
         @if($comment->replies)
            @foreach($comment->replies as $reply)
       @if($reply->is_active)
                   <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="64"  class="media-object" src="{{$reply->photo->file}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$reply->body}}
                            </div>
                        </div>
                        <!-- End Nested Comment -->
       @endif

  {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply'])  !!}
   <input type="hidden" name="comment_id" value="{{$comment->id}}"/>
    <div class="form-group">
      {!! Form::label('body','Reply',['class'=>'control-label']) !!}
      {!! Form::textarea('body',null,['class'=>'form-control','rows'=>'2$'])  !!}
    </div>
    {!! Form::submit('Submit',['class'=>'btn btn-primary'])  !!}
  {!! Form::close() !!}

           @endforeach
         @endif
</div>
                    </div>
                </div>
   @endforeach
 @endif
@stop

@section('scripts')
<script>
 $('.toggle-reply').click(function(){
//   $(this).next().slideToggle("slow");
    $(this).next().removeClass("replies");
 })
</script>
@stop
