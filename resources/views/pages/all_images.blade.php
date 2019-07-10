@extends('pages.layout_for_profile')
@section('content')

				<div class="col-sm-7">
				<h2>Images for {{$product_info->product_name}}</h2>
				<hr>

				<img src="{{URL::to($product_info->product_image1)}}" style="height: 100%; width: 100%; margin-left: 250px; ">
				<hr>
				@if($product_info->product_image2!="noimage.jpg")
				
				<img src="{{URL::to($product_info->product_image2)}}" style="height: 100%; width: 100%; margin-left: 250px;">
				<hr>
				@endif
				
				@if($product_info->product_image3!="noimage.jpg")
				
				<img src="{{URL::to($product_info->product_image3)}}" style="height: 100%; width: 100%;
				margin-left: 250px;">
				@endif
			</div>
@endsection