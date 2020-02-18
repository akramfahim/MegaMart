  <!DOCTYPE html>
  <html>
    
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>MegaMart</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <!-- StoreSwift Css and Font Awesome css-->
      <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/shopmaterializedcsss.css') }}">
      <!-- Google fonts - Montserrat for headings, Raleway for copy-->
      <link rel="stylesheet" href="{{ url('http://fonts.googleapis.com/css?family=Raleway:400,700') }}">
      <link rel="stylesheet" href="{{ url('http://fonts.googleapis.com/css?family=Montserrat:400,700') }}">
      <link rel="stylesheet" href="{{ asset('css/shopcarousel.css') }}">
      <link rel="stylesheet" href="{{ asset('css/shoptheme.css') }}">
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="{{ asset('css/shopdefault.css') }}" id="theme-stylesheet">
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="{{ asset('css/shopcustom.css') }}">
    </head>
    <body>
      <!-- navbar-->
      <header class="header">
        <div class="topbar">
          <div class="container"> 
            <div class="topbar__content row">
              <div class="col-sm-3 col-sm-offset-1 hidden-xs">
                <div class="topbar__cart">
                  <a href="{{ url("/shop") }}" class="btn btn-transparent"><i class="fa fa-shopping-bag"></i><span>Shop</span></a>
                  <a href="{{ url("/shop/cart/cartlist") }}" class="btn btn-transparent"><i class="fa fa-shopping-cart"></i><span>Cart ({{Session::has('cart')? Session::get('cart')->totalQuantity : '0'}})</span></a>
                  
                </div>
              </div>
              <div class="col-sm-4 topbar__logo">
                <a href="{{ url("/shop") }}"><img src="{{ asset('images/3.png') }}" alt="" class="topbar__logo__normal"><img src="{{ asset('images/3.png') }}" alt="" class="topbar__logo__small"></a>
              </div>

              <div class="col-sm-3 hidden-xs">
                <div class="topbar__cart">
                    @if (Route::has('login'))
                      <div class="top-right links">
                          @auth
                          
                          <a href="{{ url("/shop/user") }}" class="btn btn-transparent"><i class="fa fa-user"></i><span>Profile</span></a>
                          <a href="/logout" class="btn btn-transparent">
                                              <i class="fa fa-sign-out"></i>
                                  Logout
                              </a>
                          @else
                              <a href="{{ url("/shop/user/login") }}" class="btn btn-transparent"><i class="fa fa-shopping-cart"></i><span>Login</span></a>
                          @endauth
                      </div>
                  @endif
                </div>
              </div>
              <!-- <div class="col-sm-12 hidden-xs">
                <form class="topbar__search">
                  <div class="input-group"><span class="input-group-btn">
                      <button type="button" class="btn"><i class="fa fa-search"></i></button></span>
                    <input type="text" placeholder="SEARCH" class="form-control">
                  </div>
                </form>
              </div> -->
            </div>
          </div>
        </div>
        <div role="navigation" class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" data-toggle="collapse" data-target=".collapsed-search" class="navbar-toggle btn btn-transparent"><i class="fa fa-search"></i><span class="sr-only">Toggle navigation</span></button><a href="" class="navbar-toggle btn btn-transparent"><i class="fa fa-shopping-cart"></i><span class="hidden-xs">3 Items in cart</span></a>
              <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggle btn btn-transparent"><i class="fa fa-align-justify"></i><span class="sr-only">Toggle navigation</span></button>
            </div>

            <!-- <div class="collapsed-search collapse">
              <<form>
                <div class="input-group">
                  <input type="text" placeholder="SEARCH" class="form-control"><span class="input-group-btn">
                    <button type="button" class="btn"><i class="fa fa-search"></i></button></span>
                </div>
              </form>
            </div> -->
          </div>
        </div>
      </header>

      @yield('shop')
  <!-- Footer -->
  <footer class="footer">
        <div class="footer__copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p>&copy; <b>MegaMart</b></p>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script>window.jQuery || document.write('<script src="{{ asset('js/jquery-1.11.0.min.js') }}"><\/script>')</script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
      <script src="{{ asset('js/jquery.cookie.js') }}"></script>
      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('js/front.js') }}"></script>
    </body>
  </html>
