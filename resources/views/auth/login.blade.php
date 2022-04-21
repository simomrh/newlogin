<!doctype html>
<html lang="en">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    {!! NoCaptcha::renderJs() !!}

@include('auth.includes.header')

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image:url({{asset('loginpage/images/bg_1.jpg')}})"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3><strong>Login</strong></h3>
            <p class="mb-4">welcome.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="your-email@gmail.com" id="email" name="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your Password" id="password" name="password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
            </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0" ><span class="caption" name="remember">Remember me</span>
                  <input type="checkbox" name="remember" checked="checked"/>

                  <div class="control__indicator"></div>
                </label>
              </div>
              @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
              @endif

              <div class=" first last mb-3 wrap-input100 validate-input" data-validate = "Password is required">

                <div class="{{$errors->has('g-recaptcha-response')? 'has-error' : ''}}">

                    {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                    </div>
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif

                </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

        <div class="text-center p-t-150">
              <a type="submit" class="btn btn-link" value="register" href="{{ route('register') }}"> Create account</a>
        </div>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
  @include('auth.includes.footer')
  </body>
</html>




{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
