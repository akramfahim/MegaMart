@extends('layouts.shop')

@section('shop')

   <!-- /.navbar-->
   <div class="container">
      <div class="row"> 
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="{{ url("/shop") }}">Home</a></li>
            <li><a href="{{ url("/shop/productlist/{$items->item_category}" )}}">{{ $items->category_title }}</a></li>
            <li>{{ $items->item_name }}</li>
          </ul>
          <div class="row page-top">
            <div class="col-sm-6 col-sm-offset-3">
              <h1 class="product__heading">{{ $items->item_name }}</h1>
              <!-- <p class="text-muted">A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row product__main">
            <div class="col-sm-5 col-sm-offset-1">
              <div class="mainImage"><img src="{{ $items->item_image }}" alt="" class="img-responsive"></div>
              <!-- <div class="ribbon sale">
                <div class="theribbon">SALE</div>
                <div class="ribbon-background"></div>
              </div> -->
              <div class="ribbon new">
                <div class="theribbon">NEW</div>
                <div class="ribbon-background"></div>
              </div>
              <div class="row product__thumbs">
                <div class="col-xs-4"><a href="{{ $items->item_image }}" class="thumb"><img src="{{ $items->item_image }}" alt="" class="img-responsive"></a></div>
                <div class="col-xs-4"><a href="{{ $items->item_image }}" class="thumb"><img src="{{ $items->item_image }}" alt="" class="img-responsive"></a></div>
                <div class="col-xs-4"><a href="{{ $items->item_image }}" class="thumb"><img src="{{ $items->item_image }}" alt="" class="img-responsive"></a></div>
              </div>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
              <form>
                <p class="price">৳ {{ $items->item_price }}</p>
                @if($items->admin_id!=Auth::user()->id)
                <div class="row">
                  
                  <div class="col-md-6 col-md-offset-3">
                    <!-- <div class="form-group">
                      <label for="size">Choose your size</label>
                      <select id="size" class="form-control">
                        <option>Small</option>
                        <option>Medium</option>
                      </select>-->
                    
                    <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input type="number" value="1" id="quantity" class="form-control">
                    </div>
                  </div> 
                  </div>
                </div>
                <p class="text-center">
                <a href="{{ url("/shop/cart/addtocartitem/{$items->id}") }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>&nbsp;Add to cart</a>
                  <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                </p>
                  @endif
                
              </form>
              <div class="product__details">
                <h4>Product details</h4>
                <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                <blockquote>
                  <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                </blockquote>
              </div>
              <div class="product__social social">
                <h4>Show it to your friends</h4>
                <p><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
            <hr>
            <div id="comments">
            <h4>2 comments</h4>
            <div class="row comment">
              <div class="col-sm-3 col-md-2 text-center-xs">
                <p><img src="{{ url('http://127.0.0.1:8000/images/person.png') }}" alt="" class="img-responsive img-circle"></p>
              </div>
              <div class="col-sm-9 col-md-10">
                <h5>Julie Alma</h5>
                <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2011 at 12:00 am</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a></p>
              </div>
            </div>
            <!-- /.comment-->
            <div class="row comment last">
              <div class="col-sm-3 col-md-2 text-center-xs">
                <p><img src="{{ url('http://127.0.0.1:8000/images/person.png') }}" alt="" class="img-responsive img-circle"></p>
              </div>
              <div class="col-sm-9 col-md-10">
                <h5>Louise Armero</h5>
                <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2012 at 12:00 am</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a></p>
              </div>
            </div>
            <!-- /.comment-->
          </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-7 col-sm-offset-1">
              <!-- recent products-->
              <div id="comment-form">
            <h4>Leave comment</h4>
            <form>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="comment">Comment <span class="required">*</span></label>
                    <textarea id="comment" rows="4" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 text-right">
                  <button class="btn btn-primary"><i class="fa fa-comment-o"></i> Post comment</button>
                </div>
              </div>
            </form>
          </div>
              <!-- /recent products-->
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

