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
            <h3><strong>Register</strong></h3>
            <p class="mb-4">Create your account</p>
            <form method="POST" action="/users/store">
                @csrf
              <div class="form-group first last mb-3">
                <label for="username">Username</label>

                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  id="name">
                @error('name')
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              <div class="form-group first last mb-3">
                <label for="username">Email</label>

                <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email"  id="name">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                 @enderror
            </div>
            <div class="form-group first last mb-3">
                <label for="username">Confirm password</label>

                <input type="password" class="form-control " name="password_confirmation"  id="password-confirm">
              </div>
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

              <input type="submit" value="Register" class="btn btn-block btn-success">

              <div class="text-center p-t-150">
                <a type="submit" class="btn btn-link" value="register" href="{{ route('login') }}"> I already have an account login?</a>
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
