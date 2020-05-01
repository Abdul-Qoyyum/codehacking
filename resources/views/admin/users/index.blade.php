@extends('layouts.admin')

@section('content')

<table class='table'>
  <thead>
   <tr>
    <th>id</th>
    <th>Image</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Created at</th>
    <th>Updated at</th>
   <tr>
  </thead>
  <tbody>
   @if('users')
     @foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td><img height="50" src="{{$user->photo ? $user->photo->file : 'No profile picture'}}" alt="profile" /></td>
      <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
      <td>{{$user->email}}</td>
      <td>{{$user->role->name}}</td>
      <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at->diffForHumans()}}</td>
    </tr>
     @endforeach
   @endif
  </tbody>
</table>

@stop
