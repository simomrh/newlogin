@extends('layouts.app')

@section('content')

@php
    $genderArray = ['Male','Female'];
    $provinceArray = ['casa','agadir','tanja','rabat','kheribga','eljadida'];
@endphp


<div class="container" style="padding-top: 3%">

    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger" role="alert">
        {{$item}}
      </div>
    @endforeach

    @endif


<form method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1"> Name </label>
      <input type="text" name="name" class="form-control"  value="{{$user->name}}">
      </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"> facebook </label>
        <input type="text" name="facebook" class="form-control"  value="{{$user->profile->facebook}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"> Gender </label>
          <select class="form-control" name="gender" >
              @foreach ($genderArray  as $item)
              <option value="{{$item}}" {{($user->profile->gender == $item) ? 'selected':''}}>{{$item}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> city </label>
            <input type="text" class="form-control" name="city" value="{{$user->profile->city}}">
          </div>


        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio  </label>
          <textarea class="form-control" name="bio" rows="3">
            {!! $user->profile->bio !!}
          </textarea>
        </div>
          <button type="submit" class="btn btn-success">Update</button>



    </form>
</div>


@endsection
