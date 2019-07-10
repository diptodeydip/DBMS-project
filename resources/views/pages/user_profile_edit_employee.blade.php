@extends('pages.layout_for_profile')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				
				<div class="col-sm-4" style="margin-left: 50px">

					<div class="signup-form"><!--sign up form-->
						<h2>Edit Profile</h2>
						<form action="{{url('/user_info_update')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<input type="text" placeholder="Name" value="{{$user_info->name}}" name="user_name" required="" />
							<input type="password" placeholder="Password" value="{{$user_info->password}}" name="password" required=""/>
							<input type="text" placeholder="Mobile Number" value="{{$user_info->mobile}}" name="mobile_number" required=""/>

		
							<input type="text" placeholder="Designation" value="{{$user_info_type->designation}}" name="designation" required=""/>


							<input type="text" placeholder="Office Name" value="{{$user_info_type->office}}" name="office" required=""/>


						<div class="box-content" style="margin-top: 20px;">
						<table>
						  <thead>
							  <tr>
							  	  <th>Display Image</th>


							  </tr>
						  </thead>  
						  <tbody> 
						  	<tr>
								<td><img src="{{URL::to($user_info->profile_image)}}"style="height:100px; width:100px"alt="templatemo easy profile"></td>
							</tr>
							<tr>
								<td><input class="input-file uniform_on" id="fileInput" type="file" name="profile_image"></td>
							</tr>

						  </tbody>
					  </table>            
					</div>


							{{-- <div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="profile_image">
							  </div>
							</div>  --}}
							
							<button type="submit" class="btn btn-default">Update</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	


@endsection