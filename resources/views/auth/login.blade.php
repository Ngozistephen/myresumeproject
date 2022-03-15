@extends('layout.auth')

@section('page-class', 'login-page')
@section('page=title', 'Login')

@section('scripts')
    
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
  
        <form id= "loginForm" action="/login" method="post">
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
          <a href="{{ route ('tofacebook')}}" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google mr-2"></i> Sign in using Google
          </a>
          <a href="#" class="btn btn-block btn-dark">
            <i class="fab fa-github mr-2"></i> Sign in using Github
          </a>
          <a href="#" class="btn btn-block btn-info">
            <i class="fab fa-twitter mr-2"></i> Sign in using Twitter
          </a>
          <a href="#" class="btn btn-block btn-link">
            <i class="fab fa-linkedin mr-2"></i> Sign in using Linkedin
          </a>
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
