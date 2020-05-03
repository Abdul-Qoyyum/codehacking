@extends('layouts.admin')

@section('content')

<h3>Categories</h3>
@if($categories)
 <div class="row">
  <div class="col-sm-6">
   {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
   <div class="form-group">
      {!! Form::label('name','Name',['class'=>'control-label']) !!}
      {!! Form::text('name',null,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
      {!! Form::submit('Create Category',['class'=>'form-control btn btn-primary']) !!}
   </div>
   {!! Form::close() !!}
  </div>
  <div class="col-sm-6">
   <table class="table">
     <thead>
      <tr>
       <th>id</th>
       <th>Name<th>
       <th>Created at</th>
      </tr>
     <thead>
     <tbody>
     @foreach($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
      </tr>
     @endforeach
     </tbody>
   </table>
  </div>
 </div>
@endif


@stop
