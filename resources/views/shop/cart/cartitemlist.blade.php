@extends('layouts.shop')

@section('shop')
    <div class="container">
      <div class="col-md-12">
        <div class="row page-top">
          <div class="col-sm-10 col-sm-offset-1">
            <h1>Shopping cart</h1>
          </div>
        </div>
      </div>
      <div id="basket" class="col-md-9">
        <div class="box">
          <form method="post" action="checkout">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Product</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Discount</th>
                    <th colspan="2">Total</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($items)>0)
                @foreach($items as $item)
                  <tr> 
                    <td><a href="detail.html"><img src="{{ $item['item']['item_image'] }}" alt="White Blouse Armani"></a></td>
                    <td><a href="detail.html">{{ $item['item']['item_name'] }}</a></td>
                    <td><input type="number" value="{{ $item['qty'] }}" class="form-control"></td>
                    <td>৳ {{ $item['item']['item_price'] }}</td>
                    <td>৳ 0.00</td>
                    <td>৳ {{ $item['price'] }}</td>
                    <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <div class="box-footer">
              <div class="pull-left"><a href="{{ url("/shop") }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
              <div class="pull-right">
                <a href="{{ url("/shop/cart/clear") }}" class="btn btn-default"><i class="fa fa-refresh"></i> Clear Cart</a>
                <a href="{{ url("/shop/cart/checkouts") }}"class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
          </form>
        </div>
        <!-- similar products-->
        <!-- /similar products-->
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
                </tr>
              @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection

