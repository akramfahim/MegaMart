@extends('layouts.shop')

@section('shop')
<div class="container">
    <div class="col-md-12">
        <div class="row page-top">
            <div class="col-sm-4 col-sm-offset-4">
                <img src="{{$users->user_profile_image}}" alt="" class="img-circle img-responsive">
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <h1>{{$users->user_profile_name}}</h1>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <h4> { {{$users->email}} }</h4>
            </div>
        </div>
    </div>  
</div>
<div role="navigation" class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="{{ url("/shop/user")}}">Profile Edit</a></li>
              <li><a href="{{ url("/shop/user/orderlist")}}">My Orders</a></li>
              <li><a href="{{ url("/shop/user/shippingaddress")}}">Shipping Address</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row text-center margin-bottom">
        <div class="col-md-12">
          <div class="heading">
            <h2>Shipping Address</h2>
          </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
          <form  method="POST" autocomplete="off" action="{{ url('/shop/user/shippingupdated') }}"  enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="user_profile_name">Name*</label>
                  <input id="user_profile_name" value="{{$users->user_profile_name}}" name="user_profile_name" type="text" class="form-control">
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Email*</label>
                  <input id="email"name="email"value="{{$users->email}}" type="email" class="form-control" disabled>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="user_profile_number">Phone*</label>
                  <input id="user_profile_number"value="{{$users->user_profile_number}}" name="user_profile_number"type="number" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Divisin*</label>
                  <input id="email"name="email"value="{{$users->email}}" type="email" class="form-control">
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="user_profile_number">City*</label>
                  <input id="user_profile_number"value="{{$users->user_profile_number}}" name="user_profile_number"type="number" class="form-control">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="message">Address*</label>
                  <textarea id="message" name="user_profile_biography" class="form-control">{{$users->user_profile_biography}}</textarea>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <label for="message">Extra Info</label>
                  <textarea id="message" name="user_profile_biography" class="form-control">{{$users->user_profile_biography}}</textarea>
                </div>
              </div>
              <div class="col-sm-12 text-center">
              <input id="user_profile_imageexist" value="{{$users->user_profile_image}}" type="hidden" name="user_profile_imageexist">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
            <!-- /.row-->
          </form>
        </div>
      </div>
      <!-- /.row-->
    </div>
    @endsection
