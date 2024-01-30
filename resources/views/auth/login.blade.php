
@extends('base')
@section('title', 'Login')

@section('content')
        <!--	login   --->
        <div class="col col-md-3"></div>
        <div class="page-wrappers login-body col col-md-6 my-3 p-2 text-center bg-gray">
          <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                      <div class="login-right">
            <div class="login-right-wrap">
              @if(Session::has('success'))
              <div class="p-3 mb-2 bg-success text-white">
                  <p>{{ session('success') }} </p>
              </div>
              @endif
            @error('email')
            <div class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
            @enderror
            @error('password')
            <div class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
            @enderror
              <h1 class="mb-5" style="color: black;">Login</h1>
             
              <!-- Form -->
              <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input required name="email" class="form-control" placeholder="Enter Email address" type="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <input required name="password" class="form-control" placeholder="Enter password" type="password" value="{{ old('password') }}">
                </div>
                
                  <button class="btn btn-success btn-block" name="login" value="Login" type="submit">Login</button>
                
              </form>
              
              <div class="login-or">
                <span class="or-line"></span>
                <span class="span-or">or</span>
              </div>
              
                  <hr>
                    @if (Route::has('password.request'))
                    <p class="text-center">Forgot Your Password?
                      <a href="{{ route('password.request') }}">Request New Password</a>
                    </p>
                    @endif
                    <hr>
                    @if (Route::has('register'))
                    <p class="">Don't Have an account?
                        <a href="{{ route('register') }}" class="">
                            <i class="fa fa-signup m-2"></i>Create an Account</a>
                    </p>
                    @endif
              
            </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <div class="col col-md-3"></div>
<!--	login  -->
@section('scripts')
@endsection
@endsection
