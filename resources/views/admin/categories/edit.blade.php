@extends('layouts.admin')

@section('content')

<h3>Categories</h3>
@if($category)
 <div class="row">
  <div class="col-sm-6">
   {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}
   <div class="form-group">
      {!! Form::label('name','Name',['class'=>'control-label']) !!}
      {!! Form::text('name',null,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
      {!! Form::submit('Update Category',['class'=>'form-control btn btn-primary']) !!}
   </div>
   {!! Form::close() !!}

  <div class="form-group">
   {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
    {!! Form::submit('Delete Category',['class'=>'btn btn-danger form-control']) !!}
   {!! Form::close() !!}
  </div>

 </div>

 </div>
@endif
@stop
