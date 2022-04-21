@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show</title>
</head>
<body>
    <div class="container">

        <div class="row">
          <div class="col">

            <div class="card" style="width: 18rem;">
                <img src="{{URL::asset($post->photo)}}" class="card-img-top" alt="{{$post->photo}}">
                <div class="card align-items-center">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <h5 class="card-content">{{$post->content}}</h5>
                  <p> Created at:   {{$post->created_at->diffForhumans() }}</p>
                  <p>  Updated at:    {{$post->updated_at->diffForhumans() }}</p>
                  @foreach ($tags as $item)

                   <label for="">{{$item->tag}}</label> -
                @endforeach
                </div>
                <a href="/index" class="btn btn-primary" style="margin-top:3%">All posts</a>
              </div>

          </div>

      </div>
</body>
</html>
  @endsection
