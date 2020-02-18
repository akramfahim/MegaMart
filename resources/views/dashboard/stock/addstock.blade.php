@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Add New Item</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Stock</a>
          </li>
          <li class="active">Make New Stock</li>
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


    <p class="caption">Aad New Item</p>

    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                 <div class="col s12 m12 offset-l2  l8">
                        <div class="card-panel">
                        <div class="row">
                            <form  method="POST" class="col s12" action="{{ url('/dashboard/stock/stockadded') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <select id="item_category"  name="item_category" required>
                                <option value="" disabled selected>Select Item Category</option>

                                @if(count($categories)>0)
                                    @foreach($categories->all() as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_title }}
                                            </option>
                                    @endforeach
                                @endif
                                </select>
                                
                                @if ($errors->has('item_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('item_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select id="supplier_id"  name="supplier_id" required>
                                <option value="" disabled selected>Select Item Supplier</option>

                                @if(count($suppliers)>0)
                                    @foreach($suppliers->all() as $supplier)
                                        <option value="{{ $supplier->id }}">
                                            {{ $supplier->supplier_name }}
                                            </option>
                                    @endforeach
                                @endif
                                </select>
                                
                                @if ($errors->has('supplier_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('supplier_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-shopping-cart prefix"></i>
                                    <input id="item_name" type="text"  name="item_name" required autofocus>
                                    <label for="item_name" class="center-align">Item Name<span class="red-text text-darken-2">*</span></label>
                                        
                                    @if ($errors->has('item_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('item_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-social-domain prefix"></i>
                                <input id="item_stock" type="text" name="item_stock"   >      
                                <label for="item_stock" class="center-aligh">Item Quantity</label>

                                    @if ($errors->has('item_stock'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('item_stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-action-info prefix"></i>
                                <input id="item_price" type="text" name="item_price"  >      
                                <label for="item_price" class="center-aligh">Per Unit Price</label>

                                    @if ($errors->has('item_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('item_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>            
                            <!-- <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-action-info prefix"></i>
                                <input id="item_discount" type="number" name="item_discount" length="2"  >      
                                <label for="item_discount" class="center-aligh">Discount </label>
                            
                                    @if ($errors->has('item_discount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('item_discount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="row margin">
                                <div class="file-field input-field col s12">
                                    
                                    <div class="file-path-wrapper">
                                    <input id="item_image" name="item_image"   class="file-path validate" type="text"  />     
                                    </div>
                                    <div class="btn ">
                                    <span>Image</span>
                                    <input type="file"  name="item_image" />
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
                                    <button type="submit" class="btn waves-effect waves-light col s12">Add Item</a>
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

