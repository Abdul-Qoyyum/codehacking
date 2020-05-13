@extends('layouts.admin')

@section('styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" type="text/css" /> --}}
@stop

@section('content')

 <h3>Upload media</h3>
  {!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store','files'=>true,'class'=>'dropzone']) !!}
  {!! Form::file('file',null,['class'=>'form-control']) !!}
  {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}

@stop


@section('scripts')

{{-- <script src"https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script> --}}

@stop
