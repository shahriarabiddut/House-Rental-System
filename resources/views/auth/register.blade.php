@extends('base')
@section('title', 'Register')

@section('content')
        <!--	login   --->
        <div class="col col-md-4"></div>
        <div class="page-wrappers login-body col col-md-4 my-3 p-2 text-center bg-gray">
          <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                      <div class="login-right">
            <div class="login-right-wrap">
            @error('email')
            <div class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
            @enderror
            @error('password')
            <div class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
            @enderror
              <h1>Register</h1>
              <!-- Form -->
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <input required name="name" class="form-control" placeholder="Full name" type="text" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                  <input required name="email" class="form-control" placeholder="Email address" type="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <input required type="text"  name="mobile" class="form-control" placeholder="Your Phone*" maxlength="11">
                </div>
                <div class="form-group">
                  <input required name="password" class="form-control" placeholder="Create password" type="password" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                  <input required name="password_confirmation" class="form-control" placeholder="Repeat password" type="password" value="{{ old('password_confirmation') }}">
                </div>
                <div class="form-group">
                  <select name="type" id="" class="form-control" >
                    <option value="tenant">Tenant</option>
                    <option value="owner">Owner</option>
                  </select>
                </div> 
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Sign Up </button>
                </div>
                <hr>
                <p class="text-center">Have an account ? 
                  <a href="{{ route('login') }}">Log In</a>
                </p>
              </form>
              
              <div class="login-or">
                <span class="or-line"></span>
                <span class="span-or">or</span>
              </div>
            
              
            </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <div class="col col-md-4"></div>
<!--	login  -->
@section('scripts')
@endsection
@endsection
