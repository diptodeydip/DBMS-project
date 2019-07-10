@extends('admin_layout')
@section('admin_content')
{{-- 	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
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

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
						<div class="box-icon">
						
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							
						</div>
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
								  <th>Featured</th>
								  <th>Avaliability</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  

						  @foreach($all_product_info as $infos)

						  <tbody>
							<tr>
								<td class="center">{{ $infos->product_id }}</td>
								<td class="center">{{ $infos->product_name }}</td>
								<td class="center">{{ $infos->product_description}}</td>
								<td class="center">{{ $infos->created_at}}</td>
								<td><img src="{{URL::to($infos->product_image1)}}" style="height: 50px; width: 50px;">
									<hr>
									<a  href="{{URL::to('/all_product_images/'.$infos->product_id)}}"  >
										View Images 
									</a>
								</td>
								<td class="center">{{ $infos->product_price}} Tk</td>
								<td class="center">{{ $infos->category_name}}</td>
								<td class="center">{{ $infos->manufacture_name}}</td>
								<td class="center">{{ $infos->product_condition }}</td>

								<td class="center">
									@if($infos->publication_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Inactive</span>
									@endif
									

									@if($infos->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive_product/'.$infos->product_id)}}" >
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_product/'.$infos->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

								</td>

								<td class="center">
									@if($infos->rec_status==1)
									<span class="label label-success">Yes</span>
									@else
									<span class="label label-danger">No</span>
									@endif

									@if($infos->rec_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive_rec_status/'.$infos->product_id)}}" >
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_rec_status/'.$infos->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

								</td>


								<td class="center">
									@if($infos->featured_status==1)
									<span class="label label-success">Yes</span>
									@else
									<span class="label label-danger">No</span>
									@endif

									@if($infos->featured_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive_featured_status/'.$infos->product_id)}}" >
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_featured_status/'.$infos->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

								</td>


								<td class="center">
									@if($infos->availability==1)
									<span class="label label-success">Available</span>
									@else
									<span class="label label-danger">Out of Stock</span>
									@endif

									@if($infos->availability==1)
									<a class="btn btn-danger" href="{{URL::to('/outofstock/'.$infos->product_id)}}" >
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/available/'.$infos->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

								</td>
								<td class="center">
									

									<a class="btn btn-info" href="{{URL::to('/edit_product/'.$infos->product_id)}}">
										<i class="halflings-icon white edit" ></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_product/'.$infos->product_id)}}" id="delete" >
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>

						
						  </tbody>
						  @endforeach
						  
					  </table>            
					</div>
					
				</div><!--/span-->
			
			</div><!--/row-->

			{{$all_product_info->links()}}

@endsection