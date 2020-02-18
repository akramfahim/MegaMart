@extends('layouts.sign')

@section('sign')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Register</h4>
                    <p class="center">Join to our community now !</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                        <input id="name" type="text"  name="name" value="{{ old('name') }}" required autofocus>
                        <label for="name" class="center-align">Name</label>
                            
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-communication-email prefix"></i>
                    <label for="email" class="center-aligh">E-Mail Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>      

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <label for="password" class="center-aligh">Password</label>
                    <input id="password" type="password" name="password" value="{{ old('password') }}" required autofocus>      

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <label for="password-confirm" class="center-aligh">Confirm Password</label>
                        <input id="password-confirm" type="password" name="password_confirmation" value="{{ old('password-confirm') }}" required autofocus>      
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">Register Now</a>
                    </div>
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
