@extends('layouts.shophome')

@section('shophome')
<!-- intro-->
<section id="intro" class="intro image-background">
      <!-- .overlay-->
      <div class="content">
        <div class="container clearfix">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12">
              <h2>Welcome to<br /><span class="h1">{{$shop->shop_name}}</span></h2>
            </div>
          </div>
        </div>
      </div><span class="scroll-btn"><a href="#navigation" class="scroll-to"><span class="mouse"><span>              </span></span></a></span>
    </section>
    <div role="navigation" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
        <div class="collapsed-search collapse">
          <form>
            <div class="input-group">
              <input type="text" placeholder="SEARCH" class="form-control"><span class="input-group-btn">
                <button type="button" class="btn"><i class="fa fa-search"></i></button></span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <section>
        <div class="row">
          <div class="col-md-12">
            <div class="heading">
              <h4>Category</h4>
            </div>
          </div>
        </div>
        <div class="row ">
            @foreach($item_categories->all() as $item_category)
          <div class="col-sm-12 col-lg-6"><a href="{{ url("/shop/productlist/{$item_category->id}")}}" class="btn btn-block btn-primary">{{$item_category->category_title}}</a></div>
          @endforeach
        </div>
      </section>
      <section>
        <div class="row">
          <div class="col-md-12">
            <div class="heading">
              <h4>New Products</h4>
            </div>
          </div>
        </div>
        <div class="row products">
        @foreach($items->all() as $item)
                <!-- product-->
                <div class="col-md-3 col-sm-6">
                  <div class="product"> 
                    <div class="image"><a href="{{ url("/shop/product/{$item->id}") }}"> <img src="{{$item->item_image}}" alt="" class="img-responsive" style="height: 300px;width: 400px;"></a>
                      <div class="quick-view-button"><a href="#" data-toggle="modal" data-target="#product-quick-view-modal{{$item->id}}" class="btn btn-default btn-sm">Quick view</a></div>
                    </div>
                    <div class="text">
                      <p class="brand"><a href="{{ url("/shop/product/{$item->id}") }}">{{$item->item_name}}</a></p>
                      <h3> <a href=""></a>{{$item->item_name}}</h3>
                      <p class="price">৳ {{$item->item_price}}</p>
                    </div>
                  </div>
                </div>
                <!-- /product-->
            @endforeach
          
        </div>
      </section>
     
      @foreach($items->all() as $item)
      <!-- quick view modal box-->
      <div id="product-quick-view-modal{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="false" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
              <div class="row quick-view product-main">
                <div class="col-sm-6">
                  <div class="quick-view-main-image"><img src="{{$item->item_image}}" alt="" class="img-responsive"></div>
                  <div class="ribbon ribbon-quick-view sale">

                  </div>
                  <!-- /.ribbon-->
                  <div class="ribbon ribbon-quick-view new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                  <div class="row thumbs">
                    <div class="col-xs-4"><a href="{{$item->item_image}}" class="thumb"><img src="img/detailsmall1.jpg" alt="" class="img-responsive"></a></div>
                    <div class="col-xs-4"><a href="{{$item->item_image}}" class="thumb"><img src="img/detailsmall2.jpg" alt="" class="img-responsive"></a></div>
                    <div class="col-xs-4"><a href="{{$item->item_image}}" class="thumb"><img src="img/detailsmall3.jpg" alt="" class="img-responsive"></a></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <h2 class="product__heading">{{$item->item_name}}</h2>
                  <div class="box">
                    <form>
                      <p class="price">৳ {{$item->item_price}}</p>
                      <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                          
                        </div>
                      </div>
                       @if ($item->admin_id!=Auth::user()->id) 
                      <p class="text-center">
                        <a href="{{ url("/shop/cart/addtocart/{$item->id}") }}" class="btn btn-primary">
                        
                          
                         

                          <i class="fa fa-shopping-cart"></i>&nbsp;Add to cart</a>
                         
                    
                      </p>
                       @endif
                    </form>
                  </div>
                  <!-- /.box-->
                  <div class="quick-view-social">
                    <h4>Show it to your friends</h4>
                    <p>
                      <a href="https://www.facebook.com/sharer/sharer.php?u={{url("/shop/product/{$item->id}")}}" data-animate-hover="pulse" class="external facebook">
                      <i class="fa fa-facebook"></i></a><a href="https://plus.google.com/share?url={{url("/shop/product/{$item->id}")}}" data-animate-hover="pulse" class="external gplus">
                      <i class="fa fa-google-plus"></i></a><a href="https://twitter.com/intent/tweet?text={{url("/shop/product/{$item->id}")}}" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal-dialog-->
      </div>
      <!-- /.modal-->
      <!-- /quick view modal box-->
      @endforeach
       
        <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">All Shop</h4>
                </div>
                <div class="modal-body">
                  <ul class="list-group">
              @auth
                @if(isset($allshop))
                  @foreach($allshop->all() as $shop)
                    
                        <li class="list-group-item">
                          <a href="/domain/{{$shop->shop_domain}}">{{$shop->shop_domain}}</a>
                        </li>
                      
                  @endforeach
                @endif
              @endauth
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  
    </div>
    
@endsection