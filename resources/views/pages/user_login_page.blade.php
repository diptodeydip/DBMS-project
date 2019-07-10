@extends('layout')
@section('content')
{{-- <section id="form"> --}}<!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1" style="margin-left: 100px">
					<div class="login-form"><!--login form-->
						<p class='alert-danger'>
					<?php
						$message = Session::get('message');
						if($message){
							echo $message;
							//Session::flush();
							Session::put('message',null);
						}
						?>
					</p>
					<p class='alert-success'>
					<?php
						$message1 = Session::get('message1');
						if($message1){
							echo $message1;
							//Session::flush();
							Session::put('message1',null);
						}
						?>
					</p>
						
						<h2>Login to your account</h2>
						<form action="{{url('/user_login')}}" method="post">
						    {{csrf_field()}}
							<input type="email" required="" placeholder="Email" name="user_email" />
							<input type="password" placeholder="Passwords" name="password" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<hr>
						<a href="{{URL::to('/forgot_password')}}" class="btn btn-default" style="color: black;">Forgot Password!</a>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	{{-- </section> --}}<!--/form-->
	


@endsection