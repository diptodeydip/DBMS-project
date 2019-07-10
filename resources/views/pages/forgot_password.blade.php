@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1" style="margin-left: 50px">
					<div class="login-form"><!--login form-->

						
						<form action="{{url('/send_password')}}" method="post">
						    {{csrf_field()}}
							<input type="email" required="" placeholder="Your Email" name="user_email" />
							<button type="submit" class="btn btn-default">Send Password</button>
						</form>

					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	


@endsection