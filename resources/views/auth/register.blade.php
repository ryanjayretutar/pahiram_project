@extends('layouts.app')
@section('title','Registration')

@section('content')
    <br><br>
    <div class="container">
        <div class="container login">
            <div class="container login-form" style="">
                <div class="row">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('register.post') }}">
                            @csrf
                            <h2>Create Your Pahiram.ph Account</h2>

                            <div class="row">
                                <!-- COMPANY ACCOUNT -->
                                <div class="col-md-6" style="margin-left: 12rem; text-align: center;">
                                    <hr>
                                    <p >Creating Company&nbsp;Account?&nbsp;<a href="/company-register" style="text-decoration: none;"><strong style="color: #FF551F;">Sign Up Here!</strong></a></p>
                                    <hr>
                                </div>
                            </div>
                            <!-- INPUT USER LOGIN -->
                            <div class="row">
                                <!-- FIRST NAME INPUT -->
                                <div class="col-md-4" style="margin-left: 8rem;">
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('name') }}" placeholder="First Name" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- MIDDLE NAME INPUT -->
                                <div class="col-md-4">
                                    <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name (optional)">
                                </div>
                            </div>

                            <div class="row">
                                <!-- LAST NAME INPUT -->
                                <div class="col-md-4" style="margin-left: 8rem;">
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- SUFFIX NAME INPUT -->
                                <div class="col-md-4">
                                    <input id="suffix" type="text" class="form-control" name="suffix" placeholder="Suffix (optional)">

                                </div>
                            </div>

                            <div class="row">
                                <!-- EMAIL ADDRESS NAME -->
                                <div class="col-md-4" style="margin-left: 8rem;">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <input id="cellphone_number" type="text" class="form-control{{ $errors->has('cellphone_number') ? ' is-invalid' : '' }}" name="cellphone_number" placeholder="Cellphone Number" required>

                                    @if ($errors->has('cellphone_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cellphone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <!-- PASSWORD -->
                                <div class="col-md-4" style="margin-left: 8rem;">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!-- PASSWORD CONFIRMATION -->
                                <div class="col-md-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- TERMS AND CONDITION -->
                                <div class="col-md-6" style="margin-left: 12rem; text-align: center;">
                                    <hr>
                                    <p >By clicking<strong style="color: #FF551F;">SIGN UP</strong> you automatically agree to our <strong style="color: #FF551F;">Terms and Conditions</strong></p>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <!-- SIGN UP BUTTON -->
                                <div class="col-md-8" style="margin-left: 8.5rem;">
                                    <button type="submit" class="btn btn-block btn-md" style="border-radius: 50px; border:1px solid #dc4e41; background-color: #FF551F; padding: 0.5rem; color: #FFFFFF;">&nbsp;{{ __('Sign Up') }}&nbsp;<i class="fa fa-sign-in"></i>&nbsp;&nbsp;</button>
                                </div>
                            </div>

                            <br>
                            <!-- SOCIAL LINKS BUTTONS SIGN IN
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
                            -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
