@extends('layout')
@section('content')
{{-- <section id="form"> --}}<!--form-->
		<div class="container">
			<div class="row">
				
				<div class="col-sm-4" style="margin-left: 100px">
					<p class='alert-danger'>
					<?php

						$user_type=Session::get('user_type');
						$message = Session::get('message');
						if($message){
							echo $message;
							//Session::flush();
							Session::put('message',null);
						}

						?>
					</p>
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/user_registration')}}" method="post">
							{{csrf_field()}}
							<div class="control-group" style="margin-top: 15px; margin-bottom: 15px;">
								<label class="control-label" for="selectError3">Select Your Profession<span class="red-star">*</span></label>
								<div class="controls">
								  <select id="selectError3" name="user_type">

									<option value="Teacher">Teacher</option>
									<option value="Employee">Employee</option>
									<option value="Student">Student</option>	

								  </select>
								</div>
							  </div>
							
							<button type="submit" class="btn btn-default">Next</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
{{-- 	</section> --}}<!--/form-->
	


@endsection