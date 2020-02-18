@extends('layouts.shop')

@section('shop')

<div class="container">
      <div class="row"> 
        <div class="col-md-12">
          <div class="row page-top">
            <div class="col-sm-6 col-sm-offset-3">
              <h1>Product List</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <!-- menus and filters-->
          <div class="panel panel-default sidebar-menu">
            <div class="panel-heading">
              <h3 class="panel-title">Categories</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked category-menu">
              @foreach($item_categories->all() as $item_category)
                <li
                @if($category_id==$item_category->id)
                class="active"
                @endif
                >
                <a href="{{ url("/shop/productlist/{$item_category->id}")}}">{{ $item_category->category_title }}<span class="badge pull-right">
                {{ count($itemstotalcategory->where('item_category','=',$item_category->id))
                }}
                </span></a></li>
              @endforeach 
              </ul>
            </div>
          </div>

          <!-- /menus and filters-->
        </div>
        <div class="col-md-9">
          <div class="info-bar">
            <div class="row">
              <div class="col-sm-12 col-md-4 products-showing">Showing <strong>{{ count($items) }}</strong> of <strong>{{ count($itemstotal) }}</strong> products</div>
              <div class="col-sm-12 col-md-8 products-number-sort">
                <div class="row">
                  <div class="form-inline">
                    <div class="col-md-6 col-sm-6">
                      <div class="products-number"><strong>Show</strong> 
                        <a href="{{ route('shopitemlistcategory',['sort'=> request('sort'),'show'=>'12','id'=>$category_id ]) }}" 
                        @if( $requestShow=='12')
                        class="btn btn-default btn-sm btn-primary"
                        @else
                        class="btn btn-default btn-sm "
                        @endif
                        >
                        12</a>
                        <a href="{{ route('shopitemlistcategory',['sort'=> request('sort'),'show'=>'24','id'=>$category_id  ]) }}" 
                        @if( $requestShow==='24')
                        class="btn btn-default btn-sm btn-primary"
                        @else
                        class="btn btn-default btn-sm "
                        @endif>24</a><span class="hidden-md"> products
                       </span></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="products-sort-by"><strong>Sort by</strong>
                      <a href="{{ route('shopitemlistcategory',['show'=> request('show'),'sort'=>'updated_at' ,'id'=>$category_id ]) }}" 
                        @if( $requestSort=='updated_at')
                        class="btn btn-default btn-sm btn-primary"
                        @else
                        class="btn btn-default btn-sm "
                        @endif
                        >
                        Newest</a>
                        <a href="{{ route('shopitemlistcategory',['show'=> request('show'),'sort'=>'item_price'  ,'id'=>$category_id ]) }}" 
                        @if( $requestSort=='item_price')
                        class="btn btn-default btn-sm btn-primary"
                        @else
                        class="btn btn-default btn-sm "
                        @endif>
                        Price</a><span class="hidden-md"> products
                       </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row products">
          @foreach($items->all() as $item)
                <!-- product-->
                <div class="col-md-4 col-sm-6">
                  <div class="product"> 
                    <div class="image"><a href="{{ url("/shop/product/{$item->id}") }}"><img src="{{$item->item_image}}" alt="" class="img-responsive" style="height: 200px;width: 300px;"></a>
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
          <div class="row">
          </div>
          <div class="pages">
            <ul class="pagination">
            {{ $items->links() }}
            </ul>
          </div>
        </div>
      </div>
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
                      @if($item->admin_id!=Auth::user()->id)
                      <p class="text-center">
                        <a href="{{ url("/shop/cart/addtocart/{$item->id}") }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>&nbsp;Add to cart</a>

                        
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
    </div>

@endsection

