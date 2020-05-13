@extends('layouts.blog-home')

@section('content')
  @if($posts)

       @foreach($posts as $post)
                <!-- Title -->
     <h1><a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a></h1>

                <!-- Author -->
                <p class="lead">
                    by {{$post->user->name}}
                </p>

                <hr>

               <!-- Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{!! str_limit($post->body,300) !!}</p>
                <hr>
  @endforeach

    <div class="col-sm-6 col-sm-offset-5">
          <div>{{$posts->links()}}</div>
    </div>
@endif


@endsection
