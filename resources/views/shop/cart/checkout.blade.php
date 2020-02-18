@extends('layouts.shop')

@section('shop')
<div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="url("shop")">Home</a></li>
          <li>Checkout - Address </li>
        </ul>
      </div>
      <div class="row page-top">
        <div class="col-sm-6 col-sm-offset-3">
          <h1>Checkout</h1>
        </div>
      </div>
      <div id="checkout" class="col-md-9">
        <div class="box">
          <form method="post" action="storecheckout">

            {{ csrf_field() }}
            <ul class="nav nav-pills nav-justified">
              <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a></li>
            </ul>
            <div class="content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="fullname">Full Name*</label>
                    <input type="text" id="firstname" name="fullname" class="form-control" required="This field is required">
                  </div>
                </div>
              </div>
                <div class="row"> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="Company">Company*</label>
                      <input type="text" id="Company" name="company" class="form-control" required="This field is required">
                    </div>
                  </div>
            
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="Street">Street*</label>
                        <input type="text" id="Street" name="street" class="form-control" required="This field is required">
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label for="City">City*</label>
                      <input type="text" id="City" name="city" class="form-control" required="This field is required">
                    </div>
                  </div>
                

                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="ZIP">ZIP*</label>
                    <input type="text" id="ZIP" name="zip" class="form-control" required="This field is required">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="State">State</label>
                    <input type="text" id="State" name="state" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="Country">Country*</label>
                    <input type="text" id="Country" name="country" class="form-control" required="This field is required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="Telephone">Telephone*</label>
                    <input type="text" id="Telephone" name="telephone" class="form-control" required="This field is required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="Email">Email*</label>
                    <input type="text" id="Email" name="email" class="form-control" required="This field is required">
                  </div>
                </div>
              </div>
            </div>
            

            <ul class="nav nav-pills nav-justified">

              <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a></li>

            </ul>

            <div class="content clearfix"> 
              <div class="col-sm-6">
                <div class="box shipping-method">
                  <h4>USPS Next Day</h4>
                  <p>Get it right on next day - fastest option possible.</p>
                  <div class="box-footer text-center">
                    <input type="radio" name="delivery" value="0">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="box shipping-method">
                  <h4>USPS Next Day</h4>
                  <p>Get it right on next day - fastest option possible.</p>
                  <div class="box-footer text-center">
                    <input type="radio" name="delivery" value="1">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="box shipping-method">
                  <h4>USPS Next Day</h4>
                  <p>Get it right on next day - fastest option possible.</p>
                  <div class="box-footer text-center">
                    <input type="radio" name="delivery" value="2">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="box shipping-method">
                  <h4>USPS Next Day</h4>
                  <p>Get it right on next day - fastest option possible.</p>
                  <div class="box-footer text-center">
                    <input type="radio" name="delivery" value="3">
                  </div>
                </div>
              </div>
            </div>

            <ul class="nav nav-pills nav-justified">
              <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a></li>
            </ul>

            <div class="content clearfix">
              <div class="col-sm-6">
                <div class="box payment-method">
                  <h4>Paypal</h4>
                  <p>We all love it.</p>
                  <div class="box-footer text-center">
                    <input type="radio" name="payment" value="0">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="box payment-method">
                  <h4>Cash on delivery</h4>
                  <p>We accept Cash On Delivery</p>
                  <div class="box-footer text-center">
                    <input type="radio" name="payment" value="1">
                  </div>
                </div>
              </div>
            </div>

            <ul class="nav nav-pills nav-justified">
              <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a></li>
            </ul>

            <div class="content clearfix">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Product</th>
                          <th>Quantity</th>
                          <th>Unit price</th>
                          <th>Discount</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if(count($items)>0)
                            @foreach($items as $item)
                              <tr> 
                                <td><a href="detail.html"><img src="{{ $item['item']['item_image'] }}" alt="White Blouse Armani"></a></td>
                                <td><a href="detail.html">{{ $item['item']['item_name'] }}</a></td>
                                <td><input type="number" value="{{ $item['qty'] }}" class="form-control"disabled></td>
                                <td>৳ {{ $item['item']['item_price'] }}</td>
                                <td>৳ 0.00</td>
                                <td>৳ {{ $item['price'] }}</td>
                                <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                              </tr>
                              <input type="hidden" name="product[]" value="{{ $item['item']['id'] }}">
                              <input type="hidden" name="qty[]" value="{{ $item['qty'] }}">
                              <input type="hidden" name="total[]" value="{{ $item['item']['item_price'] }}">
                              <input type="hidden" name="unit_price[]" value="{{ $item['price'] }}">
                              @endforeach
                              @endif
                      </tbody>
                      <tfoot>
                       @if(isset($totalprice))
                <tr>
                  <td>Order subtotal</td>
                  <th>৳ {{ $totalprice }}</th>
                </tr>
                <tr>
                  <td>Shipping and handling</td>
                  <th>৳ 0.00</th>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <th>৳ {{ $totalprice }}<th>
                              <input type="hidden" name="total_all_price" value="{{$totalprice }}">
                </tr>
              @endif
                    </tfoot>
                  </table>
                </div>
              </div>  

            <div class="box-footer">
              <div class="pull-left"><a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a></div>
              <div class="pull-right">
                <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-3">
        <div id="order-summary" class="box">
          <div class="box-header">
            <h3>Order summary</h3>
          </div>
          <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
          <div class="table-responsive">
            <table class="table">
              <tbody>
              @if(isset($totalprice))
                <tr>
                <tr class="total">
                  <td>Total</td>
                  <th>৳ {{ $totalprice }}</th>
                </tr>
              @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
@endsection

