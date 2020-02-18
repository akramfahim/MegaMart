@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Edit Suppliers</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Supplier</a>
          </li>
          <li class="active">Edit Suppliers</li>
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


    <p class="caption">Aad New Suppliers</p>

    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                 <div class="col s12 m12 l8">
                        <div class="card-panel">
                        <div class="row">
                            <form  method="POST" class="col s12" action="{{ url("dashboard/suppliers/supplierupdated") }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-shopping-cart prefix"></i>
                                    <input id="supplier_name" type="text"  name="supplier_name" value="{{ $supplier->supplier_name }}" required autofocus>
                                    <label for="supplier_name" class="center-align">Supplier Name<span class="red-text text-darken-2">*</span></label>
                                        
                                    @if ($errors->has('supplier_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('supplier_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-social-domain prefix"></i>
                                <input id="supplier_address" type="text" name="supplier_address" value="{{ $supplier->supplier_address }}"  >      
                                <label for="supplier_address" class="center-aligh">Supplier Address</label>

                                    @if ($errors->has('supplier_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('supplier_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-communication-call prefix"></i>
                                <input id="supplier_number" type="text" name="supplier_number" value="{{ $supplier->supplier_number }}"  >      
                                <label for="supplier_number" class="center-aligh">Phone Number</label>

                                    @if ($errors->has('supplier_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('supplier_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>            
                            <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-content-mail prefix"></i>
                                <input id="supplier_email" type="email" name="supplier_email" value="{{ $supplier->supplier_email }}"  >      
                                <label for="supplier_email" class="center-aligh">Email </label>

                                    @if ($errors->has('supplier_email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('supplier_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="input-field col s12">
                                <input id="hide" type="hidden" name="id" value="{{ $supplier->id }}"  >      
                                    <button type="submit" class="btn waves-effect waves-light col s12">Update</a>
                                </div>
                            </div>
                         </form>
                    </div>
                </div>
            </div>  
            <div class="col s12 m12 l4">
                <div class="card-panel">
                    <div class="row">
                        <h4 class="header2 teal-text lighten-2"></h4>
                        <hr/>
                        <p>
                        
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

