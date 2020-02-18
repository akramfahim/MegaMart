@extends('layouts.sign')

@section('sign')
<div id="login-page" class="row">
    <div class="col s12  card-panel">
        <form class="login-form" method="POST" action="{{ url('dashboard/completeshop') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            

            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Complete Profile</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Registration</a>
                        </li>
                        <li class="active">Complete Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-shopping-cart prefix"></i>
                        <input id="shop_name" type="text"  name="shop_name" value="{{ old('shop_name') }}" required autofocus>
                        <label for="shop_name" class="center-align">Shop Name</label>
                            
                        @if ($errors->has('shop_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('shop_name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-domain prefix"></i>
                    <input id="shop_domain" type="text" name="shop_domain" length="20"  required >      
                    <label for="shop_domain" class="center-aligh">Shop Domain <span class="red-text text-darken-2">*</span></label>

                        @if ($errors->has('shop_domain'))
                            <span class="help-block">
                                <strong>{{ $errors->first('shop_domain') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-communication-call prefix"></i>
                    <input id="shop_number" type="text" name="shop_number" length="20" >      
                    <label for="shop_number" class="center-aligh">Phone Number </label>

                        @if ($errors->has('shop_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('shop_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>            
                <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-content-mail prefix"></i>
                    <input id="shop_email" type="email" name="shop_email" >      
                    <label for="shop_email" class="center-aligh">Email </label>

                        @if ($errors->has('shop_email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('shop_email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-home prefix"></i>
                        <input id="shop_location" type="text" name="shop_location" >      
                        <label for="shop_location" class="center-aligh">Address </label>
                        @if ($errors->has('shop_location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('shop_location') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-editor-mode-edit prefix"></i>
                        <textarea id="shop_info" class="materialize-textarea"></textarea>   
                        <label for="shop_info" class="center-aligh">Description (Optional)</label>
                        @if ($errors->has('shop_info'))
                            <span class="help-block">
                                <strong>{{ $errors->first('shop_info') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="file-field input-field col s12">
                        
                        <div class="file-path-wrapper">
                        <input id="shop_logo" name="shop_logo" class="file-path validate" type="text"  />     
                        </div>
                        <div class="btn ">
                        <span>Image</span>
                        <input type="file" name="shop_logo" />
                      </div>
                        @if ($errors->has('shop_logo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('shop_logo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">Finish</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection