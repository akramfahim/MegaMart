@extends('layouts.shop')

@section('shop')

<div id="contact" class="container">

      <div class="row margin-bottom">
        <div class="col-md-10 col-md-offset-1">
          <div class="heading">
            <h2>Stay Connected With Us</h2>
          </div>
          </div>
      </div>
      <div class="row margin-bottom">
        <div class="col-md-4 box "style="background-color:#eee;">
          <div class="box-simple" >
            <div class="icon"><i class="fa fa-sign-in"></i></div>
            <div class="heading">
            <h2>Signin</h2>
          </div>
          <form  method="POST" action="{{ route('shoplogin') }}">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-12">
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">Email</label>
                     <input id="email" type="email" name="email" class="form-control">
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="col-sm-12">
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password">Password</label>
                  <input id="password" type="password" name="password" class="form-control">
                  @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
            <!-- /.row-->
          </form>
          </div>
        </div>

            <div class="col-md-8 ">

            <div class="box-simple">
                <div class="icon"><i class="fa fa-user-plus"></i></div>
                <div class="heading">
                <h2>Signup</h2>
            </div>
            <form  method="POST" role="form" action="{{ route('signupshop') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group{{ $errors->has('user_profile_name') ? ' has-error' : '' }}">
                    <label for="user_profile_name">Full Name</label>
                    <input id="user_profile_name" name="user_profile_name" type="text" class="form-control">
                    @if ($errors->has('user_profile_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user_profile_name') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">Email</label>
                     <input id="email"name="email" type="email" class="form-control">
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group{{ $errors->has('user_profile_number') ? ' has-error' : '' }}">
                  <label for="user_profile_number">Phone</label>
                  <input id="user_profile_number" name="user_profile_number"type="text" class="form-control">
                  @if ($errors->has('user_profile_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user_profile_number') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password">Password</label>
                  <input id="password" name="password"type="password" class="form-control">
                  @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
                  <label for="password-confirm">Password Confirm</label>
                  <input id="password-confirm"name="password-confirm" type="password" class="form-control">
                </div>
              </div>
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
            <!-- /.row-->
          </form>
        </div>
            

        </div>
        </div>
        
      
    </div>
@endsection

