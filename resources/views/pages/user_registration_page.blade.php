@extends('layout')
@section('content')
{{-- <section id="form"> --}}<!--form-->
		<div class="container" >
			<div class="row">
				
				<div class="col-sm-4" style="margin-left: 100px;">
					<?php

						$user_type=Session::get('user_type');
						?>
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/user_info_registration')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<input type="text" placeholder="Full Name*" name="user_name" required="" />
							<input type="email" placeholder="Email Address*" name="user_email" required=""/>
							<input type="password" placeholder="Password*" name="password" required=""/>
							<input type="text" placeholder="Mobile Number*" name="mobile_number" required=""/>

							@if($user_type=="Teacher" || $user_type=="Employee")
							<input type="text" placeholder="Designation*" name="designation" required=""/>
							@else
							<input type="text" placeholder="Registration Number*" name="reg_no" required=""/>
							<input type="text" placeholder="Session*" name="session" required=""/>
							@endif
							@if($user_type=="Teacher" || $user_type=="Student")
							<input type="text" placeholder="Department Name*" name="department" required=""/>
							@else
							<input type="text" placeholder="Office Name*" name="office" required=""/>
							@endif

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image<span class="red-star">*</span></label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="profile_image" required="">
							  </div>
							</div> 
							
							<button style="float: right;" type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	{{-- </section> --}}<!--/form-->
	


@endsection