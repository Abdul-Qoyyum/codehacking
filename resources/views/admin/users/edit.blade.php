@extends('layouts.admin')

@section('content')
 <h3>Edit Users</h3>
<div class="row">
<div class="col-sm-3">
  <img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/400×400'}}" class="img-responsive img-rounded" />
</div>

<div class="col-sm-9">
 {!! Form::model($user,['method'=>'PATCH','route'=>['users.update',$user->id],'files'=>true]) !!}
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
    {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('is_active','Status:',['class'=>'control-label']) !!}
    {!! Form::select('is_active',[0=>'Not active',1=>'Active'],null,['class'=>'form-control']) !!}
  </div>
<div class='form-group'>
    {!! Form::submit('Create',['class'=>'btn btn-primary'])  !!}
  </div>
 {!! Form::close() !!}

</div>
</div>
<div class="row">
 @include('includes.form_errors')
</div>
@stop
