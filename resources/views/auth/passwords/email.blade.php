@extends('layouts.app')

@section('content')
<div class="wrapper fadeInDown bodyb">
        <div id="formContent">&nbsp;
          <div class="wrap-login100"></div>&nbsp;
          
            <a><img src="{{ asset('others/') }}/{{ $shareData['web_logo'] }}" height="80"loading="lazy" /></a> 
            &nbsp;
            &nbsp;
            &nbsp;

            <h5>{{ __('RESET PASSWORD') }}</h5>
            <div>
                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                @endif
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div a>
                    <a>{{ __('Enter your email below and we will send ') }}</a>
                    <a>{{ __('the link to reset your password.') }}</a>
                </div>&nbsp;

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"  name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                </div>&nbsp;

                <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('SEND') }}
                        </button>
                </div>&nbsp;

                <div id="formFooter">
                    <a class="underlineHover" href="{{ url('/login') }}">Back</a>
                  </div>
            </form>
        </div>
    </div>
</div>                  
@endsection

