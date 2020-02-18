<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Item Stock List</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Stock</a>
          </li>
          <li class="active">Item List</li>
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


    <div class="raw">
        <div class="col s12 m12 l8">
            <p class="caption">Item List</p>
            <div class="divider"></div>
        </div>
    </div>

    <div id="table-datatables">
            <div class="row">
                 <div class="col s12 m12 l7">
                        <div class="card-panel">
                        <h4 class="header2">Item List</h4>
                        <div class="row">
                        <div id="table-datatables">
                        <div class="row">
                          <div class="col s12">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr class="hide-on-med-and-down">
                                      <th>Name</th>
                                      <th>Stock</th>
                                      <th>Price</th>
                                      <th class="center-align" >Actions</th>
                                  </tr>
                              </thead>
                           
                              <tfoot>
                                  <tr>
                                      <th>Total Price</th>
                                      <th></th>
                                      <th></th>
                                      <th>{{ $totalprice }}</th>
                                      <th></th>
                                  </tr>
                              </tfoot>
                           
                              <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item['item']['item_name'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                        <td>{{ $item['price'] }}</td>
                                        <td class="center-align">
                                            <i class="mdi-action-delete red-text text-darken-2"></i>
                                        </td>
                                    </tr>
                                  @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div> 
   
                    </div>
                </div>
            </div>  
            <div class="col s12 m12 l5">
                <div class="card-panel">
                <h4 class="header2">Add Category</h4>
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

///////////////////////////////////product

<!DOCTYPE html>
<html lang="en">

<head>
  <title>eCommerce Products Page </title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ asset('css/custom-style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CSS style Horizontal Nav (Layout 03)-->    
    <link href="{{ asset('css/style-horizontal.css') }}" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{ asset('css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">                    
                    
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="shop" class="brand-logo darken-1"><img src="{{ asset('images/x.png')}}" alt="shop"></a> <span class="logo-text">Shop logo</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search"/>
                    </div>
                    <ul class="right hide-on-med-and-down">                        
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-action-perm-identity"></i></a>
                        </li>                        
                        <li><a href="{{ url("/shop/cart/cartlist") }}" >
                        <span class="new badge">{{Session::has('cart')? Session::get('cart')->totalQuantity : '0'}}</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- HORIZONTL NAV START-->
            <nav id="horizontal-nav" class="white hide-on-med-and-down">
                <div class="nav-wrapper">                  
                    
                  </ul>
                </div>
              </nav>

        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START CONTENT -->
      <section id="content">
        
        <!--start container-->
        <div class="container">
          <div class="section">
            <!-- statr products list -->
            <div id="products" class="row">
                <div class="product-sizer"></div>
                @foreach($items->all() as $item)
                <div class="product">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">${{$item->item_price}}</a>
                            

                            <a href="#"><img src="{{$item->item_image}}" alt="product-img">
                            </a>
                        </div>
                        <ul class="card-action-buttons">
                            <li><a href="{{ url("/shop/cart/addtocart/{$item->id}") }}" class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-favorite"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">{{$item->item_name}}</a>
                                    </p>
                                </div>
                                <div class="col s4 no-padding">
                                </div>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i>{{$item->item_name}}</span>
                            <p>Stock: {{$item->item_stock}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--/ end items list -->
          </div>
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->

    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2015 </span>
        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
    <!--prism-->
    <script type="text/javascript" src="{{ asset('js/prism.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- chartist -->
    <script type="text/javascript" src="{{ asset('js/plugins/chartist-js/chartist.min.js') }}"></script>   
    <!-- chartist -->
    <script type="text/javascript" src="{{ asset('js/plugins/chartist-js/chartist.min.js') }}"></script>   

    <!-- masonry -->
    <script src="{{ asset('js/plugins/masonry.pkgd.min.js') }}"></script>
    <!-- imagesloaded -->
    <script src="{{ asset('js/plugins/imagesloaded.pkgd.min.js') }}"></script>    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>

    <script type="text/javascript">
    /*
     * Masonry container for eCommerce page
     */
    var $containerProducts = $("#products");
    $containerProducts.imagesLoaded(function() {
      $containerProducts.masonry({
        itemSelector: ".product",
        columnWidth: ".product-sizer",
      });
    });
    </script>

    
</body>

</html>


@extends('layouts.shop')

@section('shop')
<section id="content">

<!--start container-->
<div class="container">
          <div class="section">
            <!-- statr products list -->
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
                        <div id="products" class="row">
                            <div class="product-sizer"></div>
                            @foreach($items->all() as $item)
                                <div class="product">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">${{ $item->item_price }}</a>
                                            
                                            @if(!empty($item->item_image))                
                                            <a href="#">
                                            <img src="{{$item->item_image}}" alt="" >
                                            </a>
                                            @else
                                            <a href="#">
                                            <img src="{{url('https://mir-s3-cdn-cf.behance.net/project_modules/disp/ce54bf11889067.562541ef7cde4.png')}}" alt="" >
                                            </a>
                                            @endif
                                        </div>
                                        <ul class="card-action-buttons">
                                            <li><a class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-av-repeat"></i></a>
                                            </li>
                                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-favorite"></i></a>
                                            </li>
                                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                                            </li>
                                        </ul>
                                        <div class="card-content">

                                            <div class="row">
                                                <div class="col s8">
                                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">{{ $item->item_name }}</a>
                                                    </p>
                                                </div>
                                                <div class="col s4 no-padding">
                                                    <a href=""></a><img src="images/amazon.jpg" alt="shop" class="responsive-img">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i>{{ $item->item_name }}</span>
                                            <p>Avalible Item: {{ $item->item_stock }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection

