@extends('layout')
@section('content')     
<div class="col-sm-10 padding-right">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product" >
				<img src="{{URL::to($product_info->product_image1)}}" alt="" style="height: 100%; width:100%;"/>
			</div>
		</div>
		<?php
			$user_id=Session::get('user_id');
		?>


		<div class="col-sm-7" >
			<div class="product-information"><!--/product-information-->
				@if($user_id==$product_info->user_id)
				<a class="btn btn-info" href="{{URL::to('/edit_ad/'.$product_info->product_id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  </a>
				<a class="btn btn-danger" href="{{URL::to('/delete_ad/'.$product_info->product_id)}}" id="delete" ><i class="fa fa-trash-o"></i>  
				</a>
				<hr>
				@endif

				<h2>{{$product_info->product_name}}</h2>
				<hr>
				<p>Price :{{$product_info->product_price}} Tk</p>
				<p>Color: {{$product_info->product_color}}</p>
				@if($product_info->availability==1)
				<h2><span class="label label-success">Available</span></h2>
				@else
				<h2><span class="label label-danger">Out Of Stock</span></h2>
				@endif
				<p><b>Condition:</b> {{$product_info->product_condition}}</p>
				<p><b>Brand:</b> {{$product_info->manufacture_name}}</p>
				<p><b>Category:</b> {{$product_info->category_name}}</p>
				<p><b>Size:</b> {{$product_info->product_size}}</p>
				<p><b>Uploaded At:</b> {{$product_info->created_at}}</p>

			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->

	<div class="category-tab shop-details-tab" style="border-style: solid;border-color: #D3D3D3;"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li ><a href="#details" data-toggle="tab">Details</a></li>
				<li  class="active"><a href="#reviews" data-toggle="tab">Comments</a></li>
				<li ><a href="#user_info" data-toggle="tab">Owner's Info</a></li>
				<li ><a href="#photos" data-toggle="tab">All Photos</a></li>
			</ul>
		</div>


		<div class="tab-content">
			<div class="tab-pane fade " id="details" style="margin: 20px;">
				<p>{{$product_info->product_description}}</p>
			</div>

			<div class="tab-pane fade" id="photos" style="margin: 20px;">
				<img src="{{URL::to($product_info->product_image1)}}" style="height: 100%; width: 100%;">
				<hr>
				@if($product_info->product_image2!="noimage.jpg")

				<img src="{{URL::to($product_info->product_image2)}}" style="height: 100%; width: 100%;">
				<hr>
				@endif
			
				@if($product_info->product_image3!="noimage.jpg")
				
				<img src="{{URL::to($product_info->product_image3)}}" style="height: 100%; width: 100%;">
				@endif
			</div>



			<div class="tab-pane fade" id="user_info" style="margin: 20px;">
				<div class="container">
					<h1 class="tm-title bold shadow">Profile</h1>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<img src="{{URL::to($user_info->profile_image)}}" class="img-responsive img-circle tm-border" style="height:100px; width:200px"alt="templatemo easy profile">
							<hr>
							<h1 class="tm-title bold shadow">{{$user_info->name}}</h1>
						</div>
					</div>
				</div>
				<!-- contact and experience -->
				<section class="container" style="margin-bottom:100px">
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="contact">
								<h2>Contact</h2>
								<p><i class="fa fa-phone"></i> {{$user_info->mobile}}</p>
								<p><i class="fa fa-envelope"></i> {{$user_info->email}}</p>
								@if($user_info->user_type=="Employee")
								<p><i class="fa fa-map-marker"></i>  {{$user_info_type->office}}</p>
								@else
								<p><i class="fa fa-map-marker"></i>   {{$user_info_type->department}}</p> 
								@endif
							</div>
						</div>
						<div class="col-md-8 col-sm-12">
							<div class="experience">
								<h2 class="white">Details</h2>
								<div class="experience-content">
									<h4 class="experience-title accent">Profession: {{$user_info->user_type}}</h4>

									@if($user_info->user_type=="Employee" || $user_info->user_type=="Teacher")

									<h4 class="experience-title accent">{{$user_info_type->designation}}</h4>
									@else

									<h4 class="experience-title accent">Reg No : {{$user_info_type->regi_no}}</h4>
									<h4 class="experience-title accent">Session : {{$user_info_type->session}}</h4>
									@endif

								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="tab-pane fade active in" id="reviews" style="margin: 20px;">
					<div class="col-sm-12">
						@foreach($reviews as $review)
						<ul style="background-color: #f0f0f0;">
							
							<li style="font-size: 17px;margin-left: 10px;"><i class="fa fa-user"></i>{{$review->name}}</li>
							<li style="font-size: 17px; margin-left: 10px;"><i class="fa fa-envelope"></i>{{$review->email}}</li>
							
							@if($user_id==$review->user_id)
							<a  style="float: right;"  class="btn btn-danger" href="{{URL::to('/delete_review/'.$review->id)}}" id="delete"><i  class="fa fa-trash-o"></i></a>
							
							@endif
							
							<p style="margin-top: 20px; margin-left: 25px;">{{$review->comment}}</p>
							<li style="float: right;"><i class="fa fa-clock-o"></i>{{$review->created_at}}</li>
							

						</ul>
						<hr>
						@endforeach
						{{$reviews->links()}}

						@if($user_id)

						<form action="{{url('/post_review')}}"  method="post">
							{{csrf_field()}}
							<fieldset>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Write Your Review</label>
							  <div class="controls">
								<textarea  name="comment" rows="3" required=""></textarea>
							  </div>
							</div>


						
							{{-- <button type="button" class="btn btn-default pull-right">
								Submit
							</button> --}}
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Post</button>
							  
							</div>
							</fieldset>
						</form>
						@endif
					</div>
				</div>

			</div>
		</div><!--/category-tab-->

		






		@endsection