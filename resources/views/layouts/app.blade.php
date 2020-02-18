<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MegaMart') }}</title>
    
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- CORE CSS-->    
    <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ asset('css/custom-style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">    
    <!-- CSS style Horizontal Nav (Layout 03)-->    
    <link href="{{ asset('css/style-horizontal.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('../../../../cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('js/plugins/jvectormap/jquery-jvectormap.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
   {{--  <link href="{{ asset('js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"> --}}
</head>
<body>
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed con">
            <nav class="cyan">
                <div class="nav-wrapper">                    
                    
                    <ul class="left">
                      <li class="no-hover"><a href="#" data-activates="slide-out" class="menu-sidebar-collapse btn-floating btn-flat btn-medium waves-effect waves-light cyan"><i class="mdi-navigation-menu" ></i></a></li>
                      <li><h1 class="logo-wrapper"><a href="/" class="brand-logo darken-1">M e g a M a r t</a> <span class="logo-text">Materialize</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize"/>
                    </div>
                    <ul class="right hide-on-med-and-down">                        
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
<!--                        
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                        </li>                        
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li> -->
                    </ul>
                </div>
            </nav>

            <!-- HORIZONTL NAV START-->
             <nav id="horizontal-nav" class="white hide-on-med-and-down">
                <div class="nav-wrapper container">                  
                  <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li>
                        <a href="{{ url('/home' ) }}" class="cyan-text">
                            <i class="mdi-action-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-menu cyan-text" href="#!" data-activates="SalesDrop">
                            <i class="mdi-action-dashboard"></i>
                            <span>Sales<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-menu cyan-text" href="#!" data-activates="StockDrop">
                            <i class="mdi-action-dashboard"></i>
                            <span>Stock<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-menu cyan-text" href="#!" data-activates="AccountDrop">
                            <i class="mdi-action-dashboard"></i>
                            <span>Account<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-menu cyan-text" href="#!" data-activates="Formsdropdown">
                            <i class="mdi-action-dashboard"></i>
                            <span>Customer<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-menu cyan-text" href="#!" data-activates="Pagesdropdown">
                            <i class="mdi-action-dashboard"></i>
                            <span>Supplier<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>                   
                    <li>
                        <a class="dropdown-menu cyan-text" href="#!" data-activates="Usersdropdown">
                            <i class="mdi-action-account-circle"></i>
                            <span>Settings<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>
                
                  </ul>
                </div>
              </nav>

                <!-- Sales -->
                <ul id="SalesDrop" class="dropdown-content dropdown-horizontal-list">
                  <li><a href="{{ url('/dashboard/sales/makesale' ) }}" class="cyan-text">Make Sales</a></li>
                  <li><a href="{{ url('/dashboard/sales/salelist' ) }}" class="cyan-text">Sale List</a></li>
                </ul>

                <!-- StockDrop-->
                <ul id="StockDrop" class="dropdown-content dropdown-horizontal-list">
                <li><a href="{{ url('/dashboard/stock/newstock' ) }}" class="cyan-text">New Stock Entry</a></li>
                <li><a href="{{ url('/dashboard/stock/addcategory' ) }}" class="cyan-text">Item Category</a></li>
                <li><a href="{{ url('/dashboard/stock/stocklist' ) }}" class="cyan-text">Current Stock List</a></li>
                  <li><a href="{{ url('/dashboard/stock/emergencystock' ) }}" class="cyan-text">Emergency Stock Entry</a></li>
                  <li><a href="{{ url('/dashboard/stock/emergencystockreport' ) }}" class="cyan-text">Emergency Stock Report</a></li>                  
                  <li><a href="{{ url('/dashboard/stock/damageitem' ) }}" class="cyan-text">Damage Item Entry</a></li>
                </ul>
                

                <!-- AccountDrop -->
                <ul id="AccountDrop" class="dropdown-content dropdown-horizontal-list">
                  <li><a href="{{ url('/dashboard/account/voucher' ) }}" class="cyan-text">Voucher Posting</a></li>
                  <li><a href="{{ url('/dashboard/account/income' ) }}" class="cyan-text">Income Statement</a></li>
                </ul>

                <!-- Formsdropdown -->
                <ul id="Formsdropdown" class="dropdown-content dropdown-horizontal-list">
                  <li><a href="{{ url('/dashboard/customer/localcustomer' ) }}" class="cyan-text">Local Customer</a></li>
                  <li><a href="{{ url('/dashboard/customer/order' ) }}" class="cyan-text">Online Order</a></li>
                </ul>

                <!-- Pagesdropdown -->
                <ul id="Pagesdropdown" class="dropdown-content dropdown-horizontal-list">
                    
                    <li><a href="{{ url('/dashboard/suppliers/list' ) }}" class="cyan-text">Suppliers List</a></li>
                    <li><a href="{{ url('/dashboard/suppliers/add' ) }}" class="cyan-text">Add Suppliers</a></li>
                </ul>
                <!-- Usersdropdown -->
                <ul id="Usersdropdown" class="dropdown-content dropdown-horizontal-list">
                <?php 
                    use App\User_profile;
                    $user_id=Auth::user()->id;
                    $user_profile=DB::table('user_profiles')
                        ->join('users','user_profiles.user_id','=','users.id')
                        ->select('user_profiles.*')
                        ->where(['user_profiles.user_id'=>$user_id])
                        ->first();
                        
                   // $user_profile = User_profile::where('user_id','=',$user_id)->get();
                ?>
                    <li><a href="{{ url('/dashboard/settings/shops' ) }}"  class="cyan-text">Shop Setting</a></li>
                    <li><a href="{{ url('/dashboard/settings/employeelist' ) }}" class="cyan-text">Employee List</a></li>
                    <li><a href="{{ url('/dashboard/settings/adminsettings' ) }}" class="cyan-text">Admin Setting</a></li> 
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>

                <!-- Chartsdropdown -->
            <!-- HORIZONTL NAV END-->

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav leftside-navigation">
            <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="{{ url('/dashboard/settings/adminsettings' ) }}"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>>
                            </li>
                        </ul>
                        </i></a>
                        <p class="user-roal">Administrator</p>
                    </div>
                </div>
            </li>
            <li class="bold"><a href="/home" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Sales</a>
                        <div class="collapsible-body">
                            <ul>
                      <li><a href="{{ url('/dashboard/sales/makesale' ) }}" class="cyan-text">Make Sales</a></li>
                  <li><a href="{{ url('/dashboard/sales/salelist' ) }}" class="cyan-text">Sale List</a></li>
                            </ul>
                        </div>
                    </li>

                    
            
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Stock</a>
                        <div class="collapsible-body">
                            <ul>
                                               <li><a href="{{ url('/dashboard/stock/newstock' ) }}" class="cyan-text">New Stock Entry</a></li>
                <li><a href="{{ url('/dashboard/stock/addcategory' ) }}" class="cyan-text">Item Category</a></li>
                <li><a href="{{ url('/dashboard/stock/stocklist' ) }}" class="cyan-text">Current Stock List</a></li>
                  <li><a href="{{ url('/dashboard/stock/emergencystock' ) }}" class="cyan-text">Emergency Stock Entry</a></li>
                  <li><a href="{{ url('/dashboard/stock/emergencystockreport' ) }}" class="cyan-text">Emergency Stock Report</a></li>                  
                  <li><a href="{{ url('/dashboard/stock/damageitem' ) }}" class="cyan-text">Damage Item Entry</a></li>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Account</a>
                        <div class="collapsible-body">
                            <ul>
                     <li><a href="{{ url('/dashboard/account/voucher' ) }}" class="cyan-text">Voucher Posting</a></li>
                  <li><a href="{{ url('/dashboard/account/income' ) }}" class="cyan-text">Income Statement</a></li>
                            </ul>
                        </div>
                    </li>

                    
            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Customer</a>
                        <div class="collapsible-body">
                            <ul>
                      <li><a href="{{ url('/dashboard/suppliers/list' ) }}" class="cyan-text">Suppliers List</a></li>
                    <li><a href="{{ url('/dashboard/suppliers/add' ) }}" class="cyan-text">Add Suppliers</a></li>
                            </ul>
                        </div>
                    </li>

                    
            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Settings</a>
                        <div class="collapsible-body">
                            <ul>
<li><a href="{{ url('/dashboard/settings/shops' ) }}"  class="cyan-text">Shop Setting</a></li>
                    <li><a href="{{ url('/dashboard/settings/employeelist' ) }}" class="cyan-text">Employee List</a></li>
                    <li><a href="{{ url('/dashboard/settings/adminsettings' ) }}" class="cyan-text">Admin Setting</a></li> 
                            </ul>
                        </div>
                    </li>

                    
            
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
      </aside>
      <!-- END LEFT SIDEBAR NAV-->

        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- jQuery Library -->
    @yield('script')
    
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    
    <!--prism-->
    <script type="text/javascript" src="{{ asset('js/prism.js') }}"></script>
    <!-- chartist -->
  {{--   <script type="text/javascript" src="{{ asset('js/plugins/chartist-js/chartist.min.js') }}"></script> --}}   

    <!-- chartjs -->
 {{--    <script type="text/javascript" src="{{ asset('js/plugins/chartjs/chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/chartjs/chart-script.js') }}"></script>  --}}

    <!-- sparkline -->
    <script type="text/javascript" src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/sparkline/sparkline-script.js') }}"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="{{ asset('js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/data-tables/data-tables-script.js') }}"></script>
    <!-- google map api -->
   {{--  <script type="text/javascript" src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek') }}"></script> --}}

    <!--jvectormap-->
    <script type="text/javascript" src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/jvectormap/vectormap-script.js') }}"></script>    

    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
</body>
</html>
