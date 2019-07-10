@extends('admin_layout')
@section('admin_content')

				<h2>Images for {{$product_info->product_name}}</h2>
				<hr>
				<div style="height: 1000px;width: 1000px">
				<img src="{{URL::to($product_info->product_image1)}}" style="height: 100%; width: 100%; ">
				</div>
				<hr>
				@if($product_info->product_image2!="noimage.jpg")
				
				<div style="height: 1000px;width: 1000px">
				<img src="{{URL::to($product_info->product_image2)}}" style="height: 100%; width: 100%; ">
				</div>
				<hr>
				@endif
				
				@if($product_info->product_image3!="noimage.jpg")
				
				<div style="height: 1000px;width: 1000px">
				<img src="{{URL::to($product_info->product_image3)}}" style="height: 100%; width: 100%; ">
				</div>
				@endif
@endsection