@extends('layout.auth')

@section('page-class', 'login-page')
@section('page-title', 'Login')

@section('scripts')
{{-- learn Jquery --}}
    <script> 
          var form = $('#loginForm');
          form.on('submit', function(event) {
              event.preventDefault();
            $('#errorMsg').remove();

      // the 'this' is refers to the HTML element to which that event is attached to... 
              var formData = new FormData(this);

              axios.post(form.attr('action'), formData)
              .then(function(response) {
                window.location = "{{route('admin.porfolios.index')}}" ;
              })
              
              .catch(function(error) {
                  console.log(error.response.data.errors.email);
                  if(error.response.status == 422){
                      var errMsg = Object.values(error.response.data.errors)[0][0]
                      var div = $('<div></div>').addClass('alert alert-danger').attr('id', 'errorMsg').text(errMsg);
                      div.insertAfter($('#loginFormTitle'));
                  }else{
                      var errMsg = 'An unexpected error has occured. Please try again later.';
                      var div = $('<div></div>').addClass('alert alert-danger').attr('id', 'errorMsg').text(errMsg);
                      div.insertAfter($('#loginFormTitle'));
                  }
              })
          })
    </script>
@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" id="loginFormTitle">Sign in to start your session</p>

      <form id= "loginForm" action="{{route('porfolio.login')}}" method="post">
        <div class="input-group mb-3">
          <input name="email"  type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        @csrf
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google mr-2"></i> Sign in using Google
        </a>
        {{-- <a href="#" class="btn btn-block btn-dark">
          <i class="fab fa-github mr-2"></i> Sign in using Github
        </a>
        <a href="#" class="btn btn-block btn-info">
          <i class="fab fa-twitter mr-2"></i> Sign in using Twitter
        </a>
        <a href="#" class="btn btn-block btn-link">
          <i class="fab fa-linkedin mr-2"></i> Sign in using Linkedin
        </a> --}}
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('password.request') }}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection


{{-- <div class="container">
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
</div> --}}

