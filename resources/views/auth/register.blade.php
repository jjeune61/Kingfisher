@extends('layouts.app')

@section('content')

<div class="wrapper fadeInDown bodyb" >
        <div id="formContent">&nbsp;
        <div class="wrap-login100"></div>&nbsp;
            <a><img src="{{ asset('others/') }}/{{ $shareData['web_logo'] }}" height="80"loading="lazy" /></a> <br><br>
            
            <h5>{{ __('REGISTER') }}</h5>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter name">
                        <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                        <span class="focus-input100"></span>

                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>&nbsp;

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        <span class="focus-input100"></span>

                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>&nbsp;

                    <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        <span class="focus-input100"></span>

                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>&nbsp;
                    
                    <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                    </div>

                    {{-- script for checkbox and submit button --}}
                    <script>
                        function terms_changed(termsCheckBox){
                            //If the checkbox has been checked
                            if(termsCheckBox.checked){
                                //Set the disabled property to FALSE and enable the button.
                                document.getElementById("submit_button").disabled = false;
                            } else{
                                //Otherwise, disable the submit button.
                                document.getElementById("submit_button").disabled = true;
                                alert("If you do not accept the terms and conditions you can not register.");
                            }
                        }
                    </script>

                        <div class="form-check justify-content-center">
                            <input type="checkbox" id="terms" name="terms" onclick="terms_changed(this)">
                            <label for="terms">
                                <a class="underlineHover a" href="{{ url('/termscondition') }}">
                                {{ __('Terms and Conditions') }}
                                </a>
                            </label>
                        </div>
                        &nbsp;

                        <div class="container-login100-form-btn">
                            <button type="submit" id="submit_button" class="login100-form-btn" disabled>
                                {{ __('Register') }}
                            </button>   
                        </div>
                    &nbsp;

                    <div id="formFooter">
                        <a >Already have account?</a>
                        <a class="underlineHover a" href="{{ url('/login') }}">Login</a>
                    </div>

                </form>
        </div>
    </div>
</div>
@endsection
