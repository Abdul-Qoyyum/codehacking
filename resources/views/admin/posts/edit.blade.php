@extends('layouts.admin')

@section('content')

<h3>Edit post</h3>
<div class="row">

<div class="col-sm-3">
 <img src="{{$post->photo->file}}" alt='Profile pic' class="img-responsive"  />

</div>

<div class="col-sm-9">
{!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
  <div class='form-group'>
    {!! Form::label('title','Title:',['class'=>'control-label']) !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('photo_id','Photo:',['class'=>'control-label']) !!}
    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
  </div>
<div class='form-group'>
    {!! Form::label('category_id','Category:',['class'=>'control-label']) !!}
    {!! Form::select('category_id',['' => 'Choose category'] + $categories, null,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('body', 'Description') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::submit('Create',['class'=>'btn btn-primary'])  !!}
  </div>
 {!! Form::close() !!}

{!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])  !!}
{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}


</div>
<div class="row">
@include('includes.form_errors')
</div>
@stop
