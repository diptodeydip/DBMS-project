<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kenabecha.250 :)</title>
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/price-range.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/responsive.css" rel="stylesheet">


        <!-- stylesheet css for profile page -->


 


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend') }}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend') }}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend') }}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend') }}/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<style>
    a {
  transition: background-color .5s;
}

a:hover {
  background-color:#f6993f;
}
</style>

<body>
    <header id="header" > <!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +8801789627055</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> dipdey093@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/DDD72"><i class="fa fa-facebook"></i></a></li>
                                {{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li> --}}
                                <li><a href="https://www.google.com.bd/webhp"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}">
                               {{--  <img src="{{ asset('frontend') }}/images/home/logo.png" alt="" /> --}}
                               <h1><span>Kenabecha.Com</span></h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                              {{--   <li><a href="#"><i class="fa fa-user"></i> Account</a></li> --}}
                               {{--  <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li> --}}
                                <?php
                                    $user_id=Session::get('user_id');
                                ?>
                                @if($user_id)
                                <li class="dropdown">
                                 <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> Hi, {{ Session::get('user_name')}}
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    <span>Account Settings</span>
                                    <i class="fa fa-gear"></i>
                                </li>
                                <li><a href="{{URL::to('/user_profile')}}"><i class="halflings-icon user"></i>My Profile</a></li>
                                
                                

                                <li><a href="{{URL::to('/logout_user')}}"><i class="halflings-icon user"></i> Logout</a></li>

                               <li><a href="{{URL::to('/my_ads')}}"><i class="halflings-icon user"></i>My Products</a></li>

                                 <li><a href="{{URL::to('/post_a_ad')}}"><i class="halflings-icon user"></i>Post a Product</a></li>
                                </ul>
                                </li>
                                @else
                                    
                                 <li><a href="{{URL::to('/user_login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{URL::to('/user_registration_page')}}"><i class="fa fa-lock"></i> Register</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->


    
        <div class="header-bottom" ><!--header-bottom-->
            <div class="container"style="background-color: #f6993f; height: 60px;">
                <div class="row">
                    <div class="col-sm-9" style="margin-top: 20px;">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                {{-- <li><a href="/" class="active">Home</a></li> --}}
                                <li><a href="/" style="font-style: bold; font-size: 20px;">Home</a></li>
                               {{-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::to('/products')}}">Products</a></li> 
                                    </ul>
                                </li>  --}}

                                <li><a href="{{URL::to('/products')}}" style="font-style: bold; font-size: 20px;">Products</a></li>
                               {{--  <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                                
                                <li><a href="contact-us.html">Contact</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-top: 15px;">
                        <div>
                            <form action="{{url('/search')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" name="product_name" placeholder="Search Product" required="" oninvalid="this.setCustomValidity('Put a name in the box')"
                            oninput="this.setCustomValidity('')"/>
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->

    </header><!--/header-->
    
                       
                        



    
    <section>
        <div class="container">
            <div class="row">
 
                <div class="col-sm-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer" style="margin-top: 100px;"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>D</span>evelopers</h2>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <p>Dipto Dey Dip</p>
                                <p>Session: 2016-17</p>
                                <h2>CSE,SUST</h2>
                            </div>
                        </div>
                        

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <p>Zubair Ahmed Rafi</p>
                                <p>Session: 2016-17</p>
                                <h2>CSE,SUST</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <p>Tanjiqur Rahman Prince</p>
                                <p>Session: 2016-17</p>
                                <h2>CSE,SUST</h2>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{ asset('frontend') }}/images/home/map.png" alt="" />
                            <p> University Ave, Sylhet 3114</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019</p>
                   {{--  <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p> --}}
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{ asset('frontend') }}/js/jquery.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('frontend') }}/js/price-range.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>


    

    <script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js')}}"></script>
    
    <script>    
    $(document).on("click", "#delete", function(e){
     e.preventDefault();
     var link = $(this).attr("href");
     bootbox.confirm("Are you sure?", function(confirmed){
        if (confirmed) {
            window.location.href = link;
        };
     });
    });
</script>



</body>
</html>