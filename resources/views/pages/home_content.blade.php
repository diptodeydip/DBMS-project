@extends('layout_with_slider')

@section('content')
	
                        <h2 class="title text-center">Featured Items</h2>
                         @if(count($all_published_product)==0)<p>No such Product</p>
                        @endif
                       
                        @foreach($all_published_product as $infos)

                        <div class="col-sm-4" {{-- onclick="window.location.href='/admin';" --}} style="background-color: #f0f0f0 ;  margin-top: 20px; border-style: solid; border-color: white; height: 250px;">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{URL::to($infos->product_image1)}}" style="height:100px; width:200px; " alt="" />
                                        <h2>Price : {{$infos->product_price}} Tk</h2>
                                        <p>Product Name : {{$infos->product_name}}</p>
                                        
                                        {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>See Details</a>
                                        <a href=s"#" class="btn btn-default add-to-cart"><i class="fa fa-phone"></i>See Contact Info</a> --}}
                                    </div>
                                    
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{$infos->product_price}} Tk</h2>
                                            <p>{{$infos->product_name}}</p>
                                            @if($infos->availability==1)
                                            <h2><span class="label label-success">Available</span></h2>
                                            @else
                                             <h2><span class="label label-danger">Out Of Stock</span></h2>
                                             @endif
                                            <a href="{{URL::to('/view_product/'.$infos->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Product</a>
                                        </div>
                                    </div>
                                

                                </div>
                                 <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><i class="fa fa-list-alt"></i>{{$infos->manufacture_name}}</li>
                                    
                                       <li><i class="fa fa-list-alt"></i>{{$infos->category_name}}</li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                        
                        @endforeach

                        
                    </div><!--features_items-->

                        <div>
                            {{$all_published_product->links()}}
                        </div>


                    <?php 
                     $all_published_product2=DB::table('tbl_products')
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                     ->where('tbl_products.publication_status', 1)
                     ->where('tbl_products.rec_status', 1)
                     ->orderby('product_id','DESC')
                      ->get();
                     ;
                    ?>
                    

                    
                    <div class="recommended_items" style="margin-top: 200px;"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <?php $count=1 ;?>

                              @foreach($all_published_product2->chunk(3) as $infos)

                        <div <?php if($count==1) {?> class="item active" <?php } else {?> class="item" <?php } ?> >


                            @foreach($infos as $info)

                        <div class="col-sm-4" {{-- onclick="window.location.href='/admin';" --}} style="background-color: #f0f0f0 ;  margin-top: 20px; border-style: solid; border-color: white; height: 250px;">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{URL::to($info->product_image1)}}" style="height:100px; width:200px; " alt="" />
                                        <h2>Price : {{$info->product_price}} Tk</h2>
                                        <p>Product Name : {{$info->product_name}}</p>
                                        
                                        {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>See Details</a>
                                        <a href=s"#" class="btn btn-default add-to-cart"><i class="fa fa-phone"></i>See Contact Info</a> --}}
                                    </div>
                                    
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            
                                            <p>{{$info->product_name}}</p>
                                            @if($info->availability==1)
                                            <h2><span class="label label-success">Available</span></h2>
                                            @else
                                             <h2><span class="label label-danger">Out Of Stock</span></h2>
                                             @endif
                                            <a href="{{URL::to('/view_product/'.$info->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Product</a>
                                        </div>
                                    </div>
                                

                                </div>
                                 <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><i class="fa fa-list-alt"></i>{{$info->manufacture_name}}</li>
                                       {{--  <li><a href="{{URL::to('/view_product/'.$infos->product_id)}}"><i class="fa fa-eye"></i>View Product</a></li> --}}
                                       <li><i class="fa fa-list-alt"></i>{{$info->category_name}}</li>
                                    </ul>
                                </div> 
                            </div>
                        </div>

                                @endforeach
                        </div>
                        <?php $count++ ;?>
                        @endforeach

                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>          
                        </div>
                    </div><!--/recommended_items-->

@endsection()