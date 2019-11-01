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
                    <h3 class="login-heading mb-4">Creation de compte!</h3>
                    <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-label-group">
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name" autocomplete="name" required autofocus>
                                    <label for="email">{{ __('Name') }}</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                  </div>
                                  <div class="form-label-group">
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address" autocomplete="email" required >
                                        <label for="email">Email address</label>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                  </div>
                                  <div class="form-label-group">
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="password " autocomplete="new-password" required >
                                        <label for="password">{{ __('password') }}</label>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                  </div>
                                  <div class="form-label-group">
                                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"  placeholder="{{ __('Confirm Password') }} " >
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                  </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="col-md-9 ">
                                    J&apos;ai déja un compte ! <a href="{{ route('login') }}">Se connecter</a>

                                    </div>
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
