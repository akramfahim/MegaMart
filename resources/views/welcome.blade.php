<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MegaMart</title>

    
    <link rel="stylesheet" href="css/r_bootstrap.min.css">
    <link rel="stylesheet" href="css/r_font-awesome.min.css">
    <link rel="stylesheet" href="css/r_owl.carousel.css">
   
    <link rel="stylesheet" href="css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo-lightbox/nivo-lightbox-theme.css">
    <link rel="stylesheet" href="css/r_animate.css">
    <link rel="stylesheet" href="css/r_style.css">
    <link href="css/r_white.css" rel="stylesheet">


    <script src="js/modernizr.custom_r.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <a href="#header" id="back-to-top" class="top"><i class="fa fa-chevron-up"></i></a>
    <!-- HHHHHHHHHHHHHHHHHH        Preloader          HHHHHHHHHHHHHHHH -->
    <!-- <div id="preloader"></div> -->
    <!-- HHHHHHHHHHHHHHHHHH        Header          HHHHHHHHHHHHHHHH -->
    <section id="header" class="header1">
        <div class="top-bar">
            <div class="container">
                <div class="navigation" id="navigation-scroll">
                        <div class="row">
                            <div class="col-md-11 col-xs-10">
                                <a href="/"><span id="logo">YOU SEE <strong class="strong">MegaMart</strong></span></a>

                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                        <a class="btn btn-download wow animated fadeInRight" href="{{ url('/home') }}">Dashboard</a>
                                        <a class="btn btn-download wow animated fadeInRight" href="{{ url('/shop') }}">Shop</a>
                                        @else
                                            <a class="btn btn-download wow animated fadeInRight" href="{{ route('login') }}">Login</a>
                                            <a class="btn btn-download wow animated fadeInRight" href="{{ route('register') }}">Register</a>
                                        @endauth
                                    </div>
                                @endif

                            </div>
                           
                        </div><!-- /.row -->
                    </div><!-- /.navigation -->
                </div><!--/.container-->
            </div><!--/.top-bar-->

        <div class="container">
            <div class="starting">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/bigMockup2.png" alt="LUCY" class="wow flipInY animated animated">
                    </div>
                    <div class="col-md-6">
                        <div class="banner-text">
                             <h2 class="animation-box wow bounceIn animated"><strong class="strong">One business solution for all</strong><br></h2>
                            <p>
                                 
                                MegaMart has been downloaded and loved by over 100+ shop from Bangladesh & all over the world in last 3 months. Use this software for your shop on your PC also on Android and iOS device. Reviews and ratings are much appreciated.
                            </p>
                            
                            <a href="/login" class="btn btn-download wow animated fadeInRight">
                            <strong> GET STARTED </strong>
                            <br/> </a>   
                        </div> <!-- /.banner-text -->
                    </div>
                </div>
            </div>
            <!-- /.starting -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#header -->

    <!-- HHHHHHHHHHHHHHHHHH        Video          HHHHHHHHHHHHHHHH -->
    <div id="video" class="wrapper">
        <div class="container">
            <h2 class="animation-box wow bounceIn animated">FEATURES</h2>
            <div class="virticle-line"></div>
            <div class="circle"></div>
           
            <p>
                Use MegaMart– the Best Software to orgasize your Shop or Business.
            </p>
        </div> <!-- /.container -->
    </div> <!-- /#video -->

    <!-- HHHHHHHHHHHHHHHHHH        Bigfeature         HHHHHHHHHHHHHHHH -->
    <section id="bigfeatures" class="img-block-3col wrapper">

        <div class="container">

            <div class="row">
                <div class="col-sm-4">
                    <ul class="item-list-right item-list-big">
                        <li class="wow fadeInLeft animated"> <i class="fa fa-film"></i> 
                            <h3>Responsive design</h3>
                            <p>MegaMart looks great on any device. Content can be easily read and a user understands freely what user wanted.</p>
                        </li>
                        <li class="wow fadeInLeft animated"> <i class="fa fa-bolt"></i> 
                            <h3>Remote access</h3>
                            <p>Access from anywhere,just need a device & internet</p>
                        </li>
                        <li class="wow fadeInLeft animated"> <i class="fa fa-heart"></i> 
                            <h3> Multiple Platform </h3>
                            <p>MegaMart have web, android as well as PC version.</p>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-sm-push-4">
                    <ul class="item-list-left item-list-big">
                        <li class="wow fadeInRight animated"> <i class="fa fa-life-ring"></i>
                            <h3>Well Documentation</h3>
                            <p>SMegaMartis shipped with well documented moduler codes. Meaningfull Comments in code will help you to customize it easily.</p>
                        </li>
                        <li class="wow fadeInRight animated"> <i class="fa fa-lock"></i>
                            <h3>Easily Customizable</h3>
                            <p>MegaMartt is easy to customize. No heavy coding is required to customize it with your real contents.</p>
                        </li>
                        <li class="wow fadeInRight animated"> <i class="fa fa-star"></i>
                            <h3>Future Support</h3>
                            <p>We will updateMegaMartt and fix bugs if you found one for a long time.</p>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-sm-pull-4 text-center">
                    <div class="animation-box wow bounceIn animated">
                        <img class="highlight-left wow animated" src="img/spark.png" height="192" width="48" alt=""> 
                        <img class="highlight-right wow animated" src="img/spark.png" height="192" width="48" alt="">
                        <img class="screen" src="img/cart1.gif" alt="" height="581" width="300">
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
    </section> <!-- /#bigfeatures -->

    <!-- HHHHHHHHHHHHHHHHHH        Speciality         HHHHHHHHHHHHHHHH -->
    <div id="speciality" class="wrapper">
        <div class="container">
            <h2 class="animation-box wow bounceIn animated">SPECIALITY</h2>
            <div class="virticle-line"></div>
            <div class="circle"></div>
            <div class="row">
                <div class="col-sm-4 wow animated fadeInLeft">
                    <div class="special-icon">
                        <i class="fa fa-rocket"></i>
                    </div>
                    <h3>Free version</h3>
                    <p>
                       Free version available for everyone.
                    </p>
                </div>
                <div class="col-sm-4 animation-box wow bounceIn animated">
                    <div class="special-icon">
                        <i class="fa fa-usd"></i>
                    </div>
                    <h3>Purchases version</h3>
                    <p>
                        Can purchases premium version with more speciall feature.
                    </p>
                </div>
                <div class="col-sm-4 wow animated fadeInRight">
                    <div class="special-icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <h3>Easy to Use</h3>
                    <p>
                        Very easy to use,even a uneducated person can manage this software.
                    </p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#speciality -->


   

    
    <!-- ====== Screenshots Section ====== -->
    <section id="screenshots">
      <div class="screenshots section-padding dark-bg">
<div id="speciality" class="wrapper">
        <div class="container">    
         
            <h2 class="animation-box wow bounceIn animated"> Screenshots</h2>
            <div class="virticle-line"></div>
            <div class="circle"></div>
           
        
            

                 
          <div class="owl-carousel owl-theme">
            <div class="item">
              <img class="img-responsive" src="img/11.png" alt="item photo">
            </div> <!-- end item -->
            <div class="item">
             <img class="img-responsive"src="img/22.png" alt="item photo">
            </div> <!-- end item -->
            <div class="item">
              <img class="img-responsive" src="img/33.png" alt="item photo">
            </div> <!-- end item -->
 
          </div>  

        </div>
          </div><!-- .container -->
      </div> <!-- end .screenshots -->  
    </section>
    <!-- ====== End Screenshots Section ====== -->



   

    <!-- HHHHHHHHHHHHHHHHHH      Development Team      HHHHHHHHHHHHHHHH -->

    <div id="team" class="wrapper" style="background-color:#4BBEB7">
        <div class="container-fluid">
            <h2 class="animation-box wow bounceIn animated">DEVELOPMENT TEAM</h2>
            <div class="virticle-line"></div>
            <div class="circle"></div>
            <div class="row">
                
                <div class="col-md-2 col-sm-4 col-md-offset-3 wow animated fadeInLeft">
                    <img src="img/riadSir.jpg" alt="team" style="height:205px">
                    <img src="img/icon-p.png" alt="icon-p" class="icon-p">
                    <!-- <h3>Minhajur Hoque Bhuyian</h3>
                    <h4>Assistant Professor</h4>
                    <h5> Computer Science & Engineering</h5>
                    <p>ADVISOR</p> -->
                    <div class="img-hover">
                         <ul class="social-icon text-center">
                            <li class="wow animated fadeInLeft facebook"><a href="https://www.facebook.com/minhazulriad" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="wow animated fadeInLeft twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                            <li class="wow animated fadeInRight linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li class="wow animated fadeInRight googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <img src="img/icon-m.png" alt="icon-m" class="icon-m">   
                    </div>
                </div>

                <div class="col-md-2 col-sm-4 wow animated fadeInLeft">
                    
                    <h3>Minhajul Hoque Bhuyian</h3>
                    <h4><strong>Associate Professor</strong></h4>
                    <h4>Computer Science & Engineering</h4>
                    <h5>ADVISOR</h5>

                </div>
                
            </div>
            <br>
            <br>
            <div class="row">
                
                <div class="col-md-2 col-sm-4 col-md-offset-3 wow animated fadeInLeft">
                    <img src="img/fahim2.jpg" alt="team" style="height:205px">
                    <img src="img/icon-p.png" alt="icon-p" class="icon-p">
                    <h3>Akram Fahim</h3>
                    <p>BACKEND DEVELOPER</p>
                    <div class="img-hover">
                         <ul class="social-icon text-center">
                            <li class="wow animated fadeInLeft facebook"><a href="https://www.facebook.com/akramulislam.fahim" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="wow animated fadeInLeft twitter"><a href="https://twitter.com/akram_fahim30" target="_blank"><i class="fa fa-twitter"></i></a>
                            <li class="wow animated fadeInRight linkedin"><a href="https://www.linkedin.com/in/akramfahim/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li class="wow animated fadeInRight googleplus"><a href="https://plus.google.com/u/0/102675624097198950101" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <img src="img/icon-m.png" alt="icon-m" class="icon-m">   
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 animation-box wow bounceIn animated">
                    <img src="img/tas.jpg" alt="team" style="height:205px">
                    <img src="img/icon-p.png" alt="icon-p" class="icon-p">
                    <h3>Syeda Tasnim</h3>
                    <p>FRONTEND DEVELOPER</p>
                    <div class="img-hover">
                         <ul class="social-icon text-center">
                            <li class="wow animated fadeInLeft facebook"><a href="https://www.facebook.com/tasnim.tabassum.1466" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="wow animated fadeInLeft twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                            <li class="wow animated fadeInRight linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li class="wow animated fadeInRight googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <img src="img/icon-m.png" alt="icon-m" class="icon-m">   
                    </div>
                </div>
                  <div class="col-md-2 col-sm-4 animation-box wow bounceIn animated">
                    <img src="img/shu.jpg" alt="team" style="height:205px">
                    <img src="img/icon-p.png" alt="icon-p" class="icon-p">
                    <h3>Sourov Shuvo</h3>
                    <p>UI/UX DESIGNER</p>
                    <div class="img-hover">
                         <ul class="social-icon text-center">
                            <li class="wow animated fadeInLeft facebook"><a href="https://www.facebook.com/shovod1" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="wow animated fadeInLeft twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                            <li class="wow animated fadeInRight linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li class="wow animated fadeInRight googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <img src="img/icon-m.png" alt="icon-m" class="icon-m">   
                    </div>
                </div>
                
            </div><!-- /.row -->
             
        </div> <!-- /.container -->
    </div> <!-- /#team -->




    <!-- HHHHHHHHHHHHHHHHHH        Price Table          HHHHHHHHHHHHHHHH -->
    
    <div id="team" class="wrapper">
        <div class="container-fluid">
            <h2 class="animation-box wow bounceIn animated">Price Table</h2>
            <div class="virticle-line"></div>
            <div class="circle"></div>

    <section id="pricing" class="wrapper">
        <div class="banner-overlay bg-color-grad"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <ul class="pricing-table">
                        <li class="wow flipInY animated animated" style="visibility: visible;">
                            <h3>FREE!</h3>
                            <span> $ 0.00 <small>per month</small> </span>
                            <ul class="benefits-list">
                                <li>Responsive</li>
                                <li>Documentation</li>
                                <li class="not">Multiplatform</li>
                                <li class="not">Video background</li>
                                <li class="not">Support</li>
                            </ul>
                            <a href="#" target="_blank" class="buy"><i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <li class="gold wow flipInY animated animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                            <div class="stamp"><i class="fa fa-star-o"></i>Best choice</div>
                            <h3>premium</h3>
                            <span>  $ 499.99 <small> One time pay</small> </span>
                            <ul class="benefits-list">
                                <li>Responsive</li>
                                <li>Documentation</li>
                                <li>Multiplatform</li>
                                <li>Video background</li>
                                <li>Support</li>
                            </ul>
                            <a href="#" target="_blank" class="buy"> <i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <li class="silver wow flipInY animated animated" data-wow-delay="0.2s" style="visibility: visible; -webkit-animation-delay: 0.2s;">
                            <h3>stander</h3>
                            <span> $ 19.99 <small>per month</small> </span>
                            <ul class="benefits-list">
                                <li>Responsive</li>
                                <li>Documentation</li>
                                <li>Multiplatform</li>
                                <li class="not">Video background</li>
                                <li class="not">Support</li>
                            </ul> 
                            <a href="#" target="_blank" class="buy"> <i class="fa fa-shopping-cart"></i></a>
                        </li>
                    </ul>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /#pricing -->
    
    <!-- HHHHHHHHHHHHHHHHHH        Contact Us          HHHHHHHHHHHHHHHH -->
    <section id="contact" class="wrapper">
        <div  class="container">
            <div class="row">
                 <div class="col-md-4 contact-item col-sm-6 col-xs-12 wow animated fadeInRight">
                    <i class="fa fa-map-marker"></i>
                    <h3>Address</h3>
                    <p class="contact">
                        Ragib Nagar, Kamal Bazar <br>
                        Sylhet,Bangladesh
                    </p>
                </div>
                <div class="col-md-4 contact-item col-sm-6 col-xs-12 wow animated fadeInLeft">
                    <i class="fa fa-phone" ></i>
                    <h3>Phone</h3>
                    <p class="contact">
                   
                        8801731533561<br>
                        8801738042784<br>
                    </p>
                </div>
               
                <div class="col-md-4 contact-item col-sm-6 col-xs-12 wow animated fadeInRight">
                    <i class="fa fa-envelope"></i>
                    <h3>Email Address</h3>
                    <p class="contact">
                        <a href="mailto:storeswift@gmail.com">MegaMart@gmail.com</a> <br>
                        <a href="www.Storeswift.com">www.MegaMart.com</a>
                    </p>
                </div>
            </div> <!-- /.row -->
            
        </div> <!-- /.container -->
    </section> <!-- /#contact -->

    <!-- HHHHHHHHHHHHHHHHHH        Footer          HHHHHHHHHHHHHHHH -->

    <section id="footer" class="wrapper">
        <div class="container text-center">
            <div class="footer-logo">
                <h1 class="text-center animation-box wow bounceIn animated">MegaMart</h1>
            </div>
            <ul class="social-icons text-center">
                <li class="wow animated fadeInLeft facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="wow animated fadeInRight twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                <li class="wow animated fadeInLeft linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li class="wow animated fadeInRight googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li class="wow animated fadeInLeft github"><a href="#"><i class="fa fa-github"></i></a>
            </ul>

            <div class="copyright">
                <div class="credits">
                    Made With <i class="fa fa-heart"></i> by <a href="#" target="_blank">MegaMart</a>
                </div>
                <div>©2018 MegaMart, All Rights Reserved</div>
            </div>
        </div><!-- container -->
    </section>




    
    


    <!-- HHHHHHHHHHHHHHHHHH        Open/Close          HHHHHHHHHHHHHHHH -->
    <div class="overlay overlay-hugeinc">
        <button type="button" class="overlay-close">Close</button>
        <nav>
        <ul>
            <li class="hideit"><a href="#header">Home</a></li>
            <li class="hideit"><a href="#bigfeatures">Feature</a></li>
            <li class="hideit"><a href="#speciality">Speciality</a></li>
            <li class="hideit"><a href="#gallery">Gallery</a></li>
            <li class="hideit"><a href="#testimonial">Testimonial</a></li>
            <!-- <li class="hideit"><a href="#team">Team</a></li> -->
            <li class="hideit"><a href="#contact">Contact Us</a></li>
        </ul>
        </nav>
    </div>
    <script src="js/jquery.min_r.js"></script>
    <script src="js/wow.min_r.js"></script>
    <script src="js/owl-carousel_r.js"></script>
    <script src="js/nivo-lightbox.min_r.js"></script>
    <script src="js/smoothscroll_r.js"></script>
    <!--<script src="js/jquery.ajaxchimp.min.js"></script>-->
    <script src="js/bootstrap.min_r.js"></script>
    <script src="js/classie_r.js"></script>
    <script src="js/script_r.js"></script>
    <script src="js/main_r.js"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        $(document).ready(function(){
            $(".hideit").click(function(){
                $(".overlay").hide();
            });
            $("#trigger-overlay").click(function(){
                $(".overlay").show();
            });
        });
    </script>
    <script>
        $(document).ready(function(){

          var kawa = $('.top-bar');
          var back = $('#back-to-top');
          function scroll() {
             if ($(window).scrollTop() > 700) {
                kawa.addClass('fixed');
                back.addClass('show-top');

             } else {
                kawa.removeClass('fixed');
                back.removeClass('show-top');
             }
          }

          document.onscroll = scroll;
        });
    </script>
            
 
    <!--HHHHHHHHHHHH        Smooth Scrooling     HHHHHHHHHHHHHHHH-->
    <script>
        $(function() {
          $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });
    </script>
</body>
</html>