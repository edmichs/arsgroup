@extends('layouts.app')

@section('css')
@endsection
@section('content')

<div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Bienvenu Chez ARSGROUP!</h3>
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                  <div class="form-label-group">
                    <input type="email" id="email" name="email" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Email address" autocomplete="email" required autofocus>
                    <label for="email">Email address</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                  </div>

                  <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="password">
                    <label for="password">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>

                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Creer un compte</a>
                  </div>
                  <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot password?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slim.js') }}"></script>
@endsection
