@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Settings</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Settings</a>
          </li>
          <li class="active">Shop Settings</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->

<!--start container-->
<div class="container">
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


    <p class="caption">Update Shop Information</p>

    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                 <div class="col s12 m12 offset-l2 l8">
                        <div class="card-panel">
                        <h4 class="header2">Shop Information Update</h4>
                        <div class="row">
                            <form  method="POST" class="col s12" action="{{ url('dashboard/settings/settingsupdate') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                            <div class="input-field col s12">
                                <select id="shop_category"  name="shop_category" required>
                                <option value="" disabled selected>Select Shop Category</option>
                                
                                @if(count($categories)>0)
                                    @foreach($categories->all() as $category)
                                        <option value="{{ $category->id }}"
                                        @if($category->id == $shopprofile->shop_category)
                                                selected
                                                @endif
                                        >
                                            {{ $category->category_name }}
                                            </option>
                                    @endforeach
                                @endif
                                </select>
                                
                                @if ($errors->has('shop_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-shopping-cart prefix"></i>
                                    <input id="shop_name" type="text"  name="shop_name" value="{{ $shopprofile->shop_name }}" required autofocus>
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
                                <input id="shop_domain" type="text" name="shop_domain"  value="{{ $shopprofile->shop_domain }}" length="20"  disabled >      
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
                                <input id="shop_number" type="text" name="shop_number"  value="{{ $shopprofile->shop_number }}">      
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
                                <input id="shop_email" type="email" name="shop_email"  value="{{ $shopprofile->shop_email }}" >      
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
                                    <input id="shop_location" type="text" name="shop_location"   value="{{ $shopprofile->shop_location }}">      
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
                                    <textarea id="shop_info" class="materialize-textarea">{{ $shopprofile->shop_info }}</textarea>   
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
                                        <input id="shop_logo" name="shop_logo"  value="{{ $shopprofile->shop_logo }}" class="file-path validate" type="text"  />    
                                    </div>
                                    <div class="btn ">
                                    <span>Image</span>
                                    <input type="file"  />
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
            </div>  
            
        </div>
    </div>
</div>
@endsection
