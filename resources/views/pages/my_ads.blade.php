@extends('pages.layout_for_profile')
@section('content')
{{-- 	<ul class="breadcrumb">

				<li><a href="#">My Ads</a></li>
			</ul> --}}

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

	{{-- 	<div  style="overflow-y: scroll; height:40px;">

		</div>	 --}}		
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li  class="active"><a href="#">My Products</a></li>
				<li ><a href="{{URL::to('/availableproducts')}}" >Available Products</a></li>
				<li ><a href="{{URL::to('/outofstockproducts')}}" >Out Of Stock Products</a></li>
			</ul>
		</div>

				<div class="row-fluid sortable" >		
				<div class="box span12">
					<div class="box-header" data-original-title>
						{{-- <h2><i class="halflings-icon user"></i><span class="break"></span>My Products</h2> --}}
					</div>
					<div class="box-content">
						<table class="table table-bordered">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Name</th>
								  <th>Description</th>
								  <th>Uploaded At</th>
								  <th>Image</th>
								  <th>Price</th>
								  <th>Category</th>
								  <th>Manufacture</th>
								  <th>Condition</th>

								  <th>Publication Status</th>
								  <th>Recommended</th>
								  <th>Featured Status</th>
								  <th>Avaliability</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  

						  <tbody>
						  @foreach($all_product_info as $infos)

						  
							<tr>
								<td class="center">{{ $infos->product_id }}</td>
								<td class="center">{{ $infos->product_name }}</td>
								<td class="center">{{ $infos->product_description}}</td>
								<td class="center">{{ $infos->created_at}}</td>
								<td><img src="{{URL::to($infos->product_image1)}}" style="height: 50px; width: 50px;">
									<hr>
									<a  href="{{URL::to('/all_images/'.$infos->product_id)}}"  >
										View Images 
									</a>
									</td>
								<td class="center">{{ $infos->product_price}} Tk</td>
								<td class="center">{{ $infos->category_name}}</td>
								<td class="center">{{ $infos->manufacture_name}}</td>
								<td class="center">{{ $infos->product_condition}}</td>

								<td class="center">
									@if($infos->publication_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Inactive</span>

									@endif

								</td>

								<td class="center">
									@if($infos->rec_status==1)
									<span class="label label-success">Yes</span>
									@else
									<span class="label label-danger">No</span>
									@endif
								</td>

								<td class="center">
									@if($infos->featured_status==1)
									<span class="label label-success">Yes</span>
									@else
									<span class="label label-danger">No</span>
									@endif

								</td>
								<td class="center">
									@if($infos->availability==1)
									<span class="label label-success">Available</span>
									@else
									<span class="label label-danger">Out of Stock</span>
									@endif

								</td>
								<td class="center">
									

									<a class="btn btn-info" href="{{URL::to('/edit_ad/'.$infos->product_id)}}">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i>  
									</a> 
									<a class="btn btn-danger" href="{{URL::to('/delete_ad/'.$infos->product_id)}}" id="delete" >
										<i class="fa fa-trash-o"></i>  
									</a>
									 {{-- <button class="bt btn-info" onclick="window.location.href = '{{URL::to('/edit_product/'.$infos->product_id)}}';">Edit</button>
									 <button class="bt btn-danger" onclick="window.location.href = '{{URL::to('/delete_product/'.$infos->product_id)}}';" id="delete">Delete</button> --}}
									
								</td>
							</tr>

						
						  
						  @endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			{{$all_product_info->links()}}
		


			

@endsection