@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Edit Post</h1>
                <a class="btn btn-success" href="/index"> all posts</a>
               </div>
          </div>

        </div>
        <div class="row">

            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $item)
                    <li>
                        {{$item}}
                    </li>
                @endforeach
            </ul>
            @endif


          <div class="col">
          <form action="{{route('post.update',['id'=> $post->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Title  </label>
                <input type="text" name="title" value="{{$post->title}}"  class="form-control"   >
                </div>




                <div class="form-group">
                  <label for="exampleFormControlTextarea1">content  </label>
                  <textarea class="form-control"   name="content"   rows="3"> {{$post->content}} </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Photo  </label>
                    <input type="file"  name="photo" class="form-control"   >
                  </div>

                  <div class="form-group" style="margin-top:3%">
                    <h5>Tags</h5>
                   @foreach ($tags as $item)
                   <input type="checkbox" name="tags[]"
                      value="{{$item->id}}"
                         @foreach ($post->tag as $item2)
                           @if ($item->id == $item2->id)
                             checked
                           @endif
                         @endforeach
                      >
                      <label for="">{{$item->tag}}</label>
                   @endforeach

                <div class="form-group">

                    <button class="btn btn-danger" type="submit">update</button>
                </div>

              </form>
          </div>
        </div>
      </div>
</body>
</html>
@endsection
