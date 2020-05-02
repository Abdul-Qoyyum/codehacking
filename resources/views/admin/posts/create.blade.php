@extends('layouts.admin')

@section('content')

<h3>Create post</h3>
<div class="row">
{!! Form::open(['method'=>'post','action'=>'AdminPostsController@store','files'=>true]) !!}
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
    {!! Form::select('category_id',[''=>'options'], null,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('body', 'Description') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::submit('Create',['class'=>'btn btn-primary'])  !!}
  </div>
 {!! Form::close() !!}
</div>
<div class="row">
@include('includes.form_errors')
</div>
@stop
