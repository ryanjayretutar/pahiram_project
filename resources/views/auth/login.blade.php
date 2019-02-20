@extends('layouts.app')
@section('title', 'Login Page')
@section('content')
    <br><br>
    <div class="container">
        <div class="container login">
            <div class="container login-form" style="">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2>Log In</h2>
                            @if (Route::has('register'))
                                <h5>Don't have an Account? <a href="{{ route('register') }}" style="color: #FF551F; text-decoration: none;">{{ __('Sign Up Here!') }}</a></h5>
                            @endif

                           {{--  SOCIAL LINKS BUTTONS SIGN IN
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3" align="right">
                                    <button class="btn btn-block btn-sm" style="border-radius: 50px; border:1px solid #3b5998; background-color: #3b5998; padding: 0.5rem; color: #FFFFFF;">&nbsp;&nbsp;<i class="fa fa-facebook"></i>&nbsp;Login with Facebook&nbsp;&nbsp;</button>
                                </div>
                                <div class="col-md-3" align="left">
                                    <button class="btn btn-block btn-sm" style="border-radius: 50px; border:1px solid #dc4e41; background-color: #dc4e41; padding: 0.5rem; color: #FFFFFF;">&nbsp;&nbsp;<i class="fa fa-google"></i>&nbsp;Login with Google&nbsp;&nbsp;</button>
                                </div>
                                <div class="col-md-3">

                                </div>
                            </div>
                            --}}

                            <!-- INPUT USER LOGIN -->
                            <div class="col-md-6" style="margin-left: 11.5rem;">
                                <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="border: none; border-bottom: 2px solid #ABB2B9;" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6" style="margin-left: 11.5rem;">
                                <input style="border: none; border-bottom: 2px solid #ABB2B9;" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row"  style="padding: 1rem;">
                                <div class="col-md-3">

                                </div>
                                <div class="ocl-md-3" style="padding-left: 2.5rem; margin-top: 0.5rem;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="coll-md-6">

                                </div>
                                <div class="col-md-4" align="right" style="padding-right: 1rem;">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #ABB2B9; text-decoration:none;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" align="center">
                                    <button class="btn btn-block btn-md" style="border-radius: 50px; border:1px solid #dc4e41; background-color: #FF551F; padding: 0.5rem; color: #FFFFFF;">&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;{{ __('Login') }}&nbsp;&nbsp;</button>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
