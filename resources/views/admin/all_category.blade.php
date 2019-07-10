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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
						<div class="box-icon">
						
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							
						</div>
					</div>



					<div class="box-content">
						<table class="table table-bordered">
						  <thead>
							  <tr>
								  <th>Category Id</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  

						  @foreach($all_category_info as $infos)

						  <tbody>
							<tr>
								<td class="center">{{ $infos->category_id }}</td>
								<td class="center">{{ $infos->category_name }}</td>
								<td class="center">{{ $infos->category_description}}</td>
								<td class="center">
									@if($infos->publication_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Inactive</span>
									@endif

								</td>
								<td class="center">
									@if($infos->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive_category/'.$infos->category_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_category/'.$infos->category_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

									<a class="btn btn-info" href="{{URL::to('/edit_category/'.$infos->category_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_category/'.$infos->category_id)}}" id="delete">
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
			{{$all_category_info->links()}}
@endsection