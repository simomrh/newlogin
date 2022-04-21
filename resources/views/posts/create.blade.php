@extends('layouts.app')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Create Post</h1>
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
        <form action="/post/store" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">Title  </label>
                <input type="text" name="title" class="form-control"   >
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">content  </label>
                <textarea class="form-control"  name="content"   rows="3"></textarea>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlInput1">Photo  </label>
                  <input type="file"  name="photo" class="form-control"   >
                </div>

                <div class="form-group">
                    @foreach ($tags as $item)
                    <input type="checkbox" name="tags[]"
                       value="{{$item->id}}"  >
                       <label for="">{{$item->tag}}</label>
                    @endforeach

                  </div>


              <div class="form-group" style="margin-top:3%">
                  <button class="btn btn-danger" type="submit">save</button>
              </div>

            </form>
        </div>
      </div>

</body>
</html>




@endsection
