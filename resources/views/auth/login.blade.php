@extends('layouts.app')

@section('content')
<div class="wrapper fadeInDown bodyb">
        <div id="formContent">&nbsp;
          <div class="wrap-login100"></div>&nbsp;
          
            <a><img src="{{ asset('others/') }}/{{ $shareData['web_logo'] }}" height="80"loading="lazy" /></a> <br><br>

            <h5>{{ __('LOGIN') }}</h5>
            <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"  name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>&nbsp;

                    <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"  name="password" placeholder="Password" required autocomplete="current-password">
                            <span class="focus-input100"></span>
                            
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                  
                    <div class="form-check justify-content-center">
                      <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="remember">
                        {{ __('Remember Me') }}
                      </label>
                    </div>&nbsp;

                    <div class="container-login100-form-btn" >
                        <button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                                    <a class="btn btn-link a" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                        @endif
                  </div>
                  <div id="formFooter">
                    <a>Don't have account?</a>
                    <a class="underlineHover a " href="{{ url('/register') }}" >Register</a>
                  </div>
            </form>
        </div>
    </div>
</div>

@endsection


    