@extends('layouts.admin')

@section('content')

 <h3>Media</h3>
 @if(count($photos))
   <form action="/admin/delete/media" method="POST">
    {{csrf_field()}}
    {{method_field('DELETE')}}

    <div class="form-group">
     <select class="form-control" name="checkBoxArray">
       <option value="">Options</option>
     </select>
    </div>
     <input type="submit" name="delete_all"  value="Delete" class="btn btn-primary"/>


   <table class="table">
    <thead>
     <tr>
      <th><input id="options" type="checkbox" /></th>
      <th>id</th>
      <th>Name</th>
      <th>Created at</th>
     </tr>
    </thead>
    <tbody>
     @foreach($photos as $photo)
      <tr>
       <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" /></td>
       <td>{{$photo->id}}</td>
       <td><img height="50" src="{{ $photo->file }}" alt="profile pics" /></td>
       <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : "No date"}}</td>
       <td>

       <input type="hidden" name="photo" value="{{$photo->id}}" />
       <input type="submit" name="delete_single" value="Delete" class="btn btn-danger"/>
       </td>
      </tr>
     @endforeach
    </tbody>
   </table>

 </form>
 @endif

@stop
@section('scripts')
 <script>
   $(document).ready(function(){

     $("#options").click(function(){
        if(this.checked){
           $('.checkBoxes').each(function(){
              this.checked = true;
            });
        }else{
            $('.checkBoxes').each(function(){
              this.checked = false;
            });
        }
      });
   });
 </script>
@stop
