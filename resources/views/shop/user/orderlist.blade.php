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
            <div class="row">
            <table class="table table-bordered">
    <thead>

      <tr>
        <th>ID</th>
        <th>Total Amount</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
       @foreach($orders->all() as $order)
      <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->item_id}}</td>
        <td> {{date('M j, Y H:i', 
                                            strtotime($order->updated_at))}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
            </div>
            <!-- /.row-->
          </form>
        </div>
      </div>
      <!-- /.row-->
    </div>
    @endsection
