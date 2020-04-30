@extends('layouts.admin')

@section('content')
 <h3>Create Users</h3>
 {!! Form::open(['url'=>'admin/users','method'=>'post','action'=>'AdminUsersController@store','files'=>true]) !!}
  <div class='form-group'>
    {!! Form::label('name','Name:',['class'=>'control-label']) !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('email','Email:',['class'=>'control-label']) !!}
    {!! Form::email('email', null,['class'=>'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('password','Password:',['class'=>'control-label']) !!}
    {!! Form::password('password',['class'=>'form-control']) !!}
  </div>

<div class='form-group'>
    {!! Form::label('photo_id','Photo:',['class'=>'control-label']) !!}
    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('role_id','Role:',['class'=>'control-label']) !!}
    {!! Form::select('role_id', [''=>'Choose Options'] + $roles,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('is_active','Status:',['class'=>'control-label']) !!}
    {!! Form::select('is_active',[0=>'Not active',1=>'Active'],0,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::submit('Create',['class'=>'btn btn-primary'])  !!}
  </div>
 {!! Form::close() !!}

@include('includes.form_errors')

@stop
