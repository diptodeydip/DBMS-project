@extends('pages.layout_for_profile')
@section('content')

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-wordpress">
       <span class="sk-inner-circle"></span>
     </div>
</div>

<!-- header section -->

	<div class="container">
		<p class='alert-success'>
					<?php
						$message = Session::get('message');
						if($message){
							echo $message;
							//Session::flush();
							Session::put('message',null);
						}
						?>
					</p>

		<div >
		<h1 class="tm-title bold shadow" style="float: left; margin-top: 20px;">Profile</h1>
		<a class="btn btn-info" href="{{URL::to('/user_profile_edit')}}" style="float: right; margin-top: 20px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

		</div>
				
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<hr>
				<img src="{{URL::to($user_info->profile_image)}}" class="img-responsive img-circle tm-border" style="height:300px; width:350px;"alt="templatemo easy profile">
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
					<h2>Details</h2>
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
</section>


@endsection