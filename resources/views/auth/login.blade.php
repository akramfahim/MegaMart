@extends('layouts.sign')

@section('sign')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="input-field col s12 center">
                            <!-- <img src="images/3.png" alt="MegaMart" class="circle responsive-img valign profile-image-login"> -->
                            <h3>Login</h3>
                            <p class="center login-form-text">All in One Business Solution</p>
                        </div>
                        </div>

                        <div class="row margin">
                        <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                                <input id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email"  class="center-align" data-error="{{ $errors->has('name') ?  'wrong'  : '' }}" >E-Mail Address</label>
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
                        <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password" >Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">          
                        <div class="input-field col s12 m12 l12  login-text">
                                        <input type="checkbox" id="remember-me"  name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                        <label for="remember-me">Remember me</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                  <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>
                                </div>
                                          
                            </div>
                    </form>
                </div>
            </div>

@endsection
