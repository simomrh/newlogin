@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">All Users  </h1>
            <a class="btn btn-success" href="/user/create"> create User</a>
            <a class="btn btn-primary" href="/index"> all posts</a>
               </div>
          </div>
        </div>
        <div class="row">


            @if ($users->count() > 0 )
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col"> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $item)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                            <a class="text-danger" href="{{route('user.destroy',['id'=> $item->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>
                            </td>
                          </tr>
                        @endforeach

                    </tbody>
                  </table>


              </div>
            @else
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    Not Users
                  </div>
            </div>

            @endif


        </div>
      </div>
</body>
</html>

@endsection
