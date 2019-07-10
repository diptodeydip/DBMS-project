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
    <header id="header" style="margin-bottom: 100px;"> <!--header-->
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
                               {{--  <li><a href="#"><i class="fa fa-user"></i> Account</a></li> --}}
                               {{--  <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li> --}}
                                <?php
                                    $user_id=Session::get('user_id');
                                ?>
                                @if($user_id)
                                <li class="dropdown" >
                                 <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user" ></i> Hi, {{ Session::get('user_name')}}
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                     <span>Account Settings</span> 
                                    <i class="fa fa-gear"></i>
                                </li>
                                <li><a href="{{URL::to('/user_profile')}}" ><i class="halflings-icon user"></i>My Profile</a></li>
                                
                                

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

        <?php
                                $all_published_slider=DB::table('tbl_slider')
                                ->where('publication_status',1)
                                ->get();
                                ?>



    



    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container" style="background-color: #f6993f; height: 60px;">
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
                                {{-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
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
                <div class="col-sm-3" style=" background-color: #f0f0f0 ;">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            {{-- first manual category --}}
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear" style="text-transform: none;">
                                            <span class="badge pull-right" ><i class="fa fa-plus"></i></span>
                                            Electronics
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li style=""><a href="{{URL::to('/product_by_category/12')}}" style="text-transform: none;">Laptops & Computers</a></li>
                                            <li><a href="{{URL::to('/product_by_category/13')}}" style="text-transform: none;">Laptop & Computer Accessories</a></li>
                                            <li><a href="{{URL::to('/product_by_category/14')}}" style="text-transform: none;">Cameras, Camcorders & Accessories</a></li>
                                            <li><a href="{{URL::to('/product_by_category/15')}}" style="text-transform: none;">Audio & Sound Systems</a></li>
                                            
                                            <li><a href="{{URL::to('/product_by_category/16')}}" style="text-transform: none;">Tablets & Accessories</a></li>
                                            <li><a href="{{URL::to('/product_by_category/17')}}" style="text-transform: none;">Other Electronics</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <?php
                                $all_published_category=DB::table('tbl_category')
                                ->where('publication_status',1)
                                ->get();
                                ?>
                            
                            
                            @foreach($all_published_category as $cat)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$cat->category_id)}}"  style="text-transform: none;">{{$cat->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach


                        </div><!--/category-products-->

                        <!-- Brands -->
                        <h2>Brands</h2>
                        <div class="panel-group category-products" id="accordian">
                            <?php
                                $all_published_manufacture=DB::table('tbl_manufacture')
                                ->where('publication_status',1)
                                ->get();
                                ?>
                            
                            
                            @foreach($all_published_manufacture as $man)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_manufacture/'.$man->manufacture_id)}}"  style="text-transform: none;">{{$man->manufacture_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>


                        <!--brands_products-->
                        {{-- <div class="brands_products">
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked"> --}}

                                
                            <?php
                                $all_published_manufacture=DB::table('tbl_manufacture')
                                ->where('publication_status',1)
                                ->get();
                                ?>
                            
                           {{--  @foreach($all_published_manufacture as $man)
                            <div class="panel panel-default">
                                <li><a href="{{URL::to('/product_by_manufacture/'.$man->manufacture_id)}}"> <span class="pull-right">(50)</span>{{$man->manufacture_name}}</a></li>
                            </div>
                            }
                            @endforeach
                            
                                    
                                </ul>
                            </div>
                        </div> --}}<!--/brands_products-->

                        
                        
                        <div class="price-range"><!--price-range-->
                            <h2 style="font-size: 15px;">Custom Search</h2>
                            <div class="well text-center">
                                 {{-- <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="5" data-slider-value="[250,3000]" id="sl2" ><br />
                                 <b class="pull-left">0tk</b> <b class="pull-right">10000tk</b> --}}
                                 <form action="{{url('/product_by_search')}}"  method="post">
                            {{csrf_field()}}
                            <fieldset>

                            <div class="control-group">
                                <label class="control-label" for="selectError3">Product Category</label>
                                <div class="controls">
                                  <select id="selectError3" name="category_id">
                                @foreach($all_published_category as $cat){?>
                                    <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                    

                                  </select>
                                </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label" for="selectError3">Brand</label>
                                <div class="controls">
                                  <select id="selectError3" name="manufacture_id">
                                @foreach($all_published_manufacture as $man){?>
                                    <option value="{{$man->manufacture_id}}">{{$man->manufacture_name}}</option>
                                    @endforeach
                                    
                                  </select>
                                </div>
                              </div>
                            <label class="control-label" for="selectError3">Price Range</label>
                            <div class="control-group">
                                <div class="controls">
                                  <select id="selectError3" name="price_range">
                                    <option value="1">0tk-5000tk</option>
                                    <option value="2">5001tk-10000tk</option>
                                    <option value="3">10001tk-15000tk</option>
                                    <option value="4">15001tk-20000tk</option>
                                    <option value="5">>20000tk</option>
                                    <option value="0">All</option>
                                  </select>
                                </div>
                              </div>

                            <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Search</button>
                              
                            </div>
                            </fieldset>
                        </form>
                            </div>
                        </div><!--/price-range-->
                        
                        {{-- <div class="shipping text-center"><!--shipping-->
                            <img src="{{ asset('frontend') }}/images/home/shipping.jpg" alt="" />
                        </div> --}}<!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
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