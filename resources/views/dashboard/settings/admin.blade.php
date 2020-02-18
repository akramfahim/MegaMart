@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Employee Settings</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Settings</a>
          </li>
          <li class="active">Employee</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="containerlarge">
    <div class="section">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- alert -->

                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <br/>
                        <div class="col s12 m10 l6">
                        <div class="card-panel red lighten-2"><span class="white-text">{{$errors}}</span></div>
                        </div>
                        @endforeach
                    @endif
                    @if(session('response'))
                    <br/>
                    <div class="col s12 m10 l6">
                    <div class="card-panel  green lighten-2"><span class="white-text">{{session('response')}}</span></div>
                    </div>
                    @endif

    <div id="table-datatables">
            <div class="row">

                 <div class="col s12 m12 l5">
                        <div class="card-panel center">
                            <div class="row">
                                <figure class="card-profile-image">
                                    <img src="{{ $users->user_profile_image }}"  alt="profile image" class="circle z-depth-2 responsive-img activator">
                                </figure>
                            </div>
                            <div class="row">
                            <h4 class="teal-text lighten-2 header4">{{ $users->user_profile_name }}</h4>
                            </div>
                            <div class="row">
                            <h5 class="">Admin</h5>
                            </div>
                        </div>  
                     </div>  

            <div class="col s12 m12 l7">
                <div class="card-panel">
                <h4 class="header2">Profile Info</h4>
                    <div class="row">
                        
                    <form  method="POST" class="col s12" autocomplete="off" action="{{ url('dashboard/settings/adminupdated') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-shopping-cart prefix"></i>
                                    <input id="user_profile_name" type="text" value="{{ $users->user_profile_name}}" name="user_profile_name"  >
                                    <label for="user_profile_name" class="center-align">Name</label>
                                        
                                    @if ($errors->has('user_profile_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_profile_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="mdi-editor-mode-edit prefix"></i>
                                    <input id="user_profile_number" type="number"  value="{{ $users->user_profile_number}}"   name="user_profile_number"  >
                                    <label for="user_profile_number" class="center-align">Phone Number</label>
                                     @if ($errors->has('user_profile_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_profile_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="file-field input-field col s12">
                                    
                                    <div class="file-path-wrapper">
                                    <input id="user_profile_image" name="user_profile_image"  value="{{ $users->user_profile_image }}" class="file-path validate" type="text"  />     
                                    </div>
                                    <div class="btn ">
                                    <span>Image</span>
                                    <input type="file" name="user_profile_image" />
                                </div>
                                    @if ($errors->has('user_profile_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_profile_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light col s12">Update</a>
                                </div>
                            </div>
                         </form>
                    </div>
                </div> 
            </div>

            <!-- <div class="col s12 m12 offset-l5 l7">
                <div class="card-panel">
                <h4 class="header2">Password Changing</h4>
                    <div class="row">
                    <form  method="POST" role="form" action="{{ route('adminpass') }}">
                    {{ csrf_field() }}
                    <div class="row">
                      
                      <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password">Password</label>
                          <input id="password" name="password" type="password" class="form-control">
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
                          <input id="password-confirm" name="password-confirm" type="password" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary">Change</button>
                      </div>
                    </div>
                    /.row
                  </form>
                    </div>
                </div>
            
                    </div> -->
    </div>
</div>
@endsection

