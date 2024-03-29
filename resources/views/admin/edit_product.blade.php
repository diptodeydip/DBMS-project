@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
			{{-- 	<li>
					<i class="icon-home"></i>
					<a href="#">Home</a>
					<i class="icon-angle-right"></i> 
				</li> --}}
				<li>
					<i class="icon-edit"></i>
					Edit Product
				</li>
			</ul>

	
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						{{-- <h2><i class="halflings-icon edit"></i><span class="break"></span>Infos</h2> --}}
						<div class="box-icon">
						{{-- 	<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a> --}}
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>

					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update_product/'.$product_info->product_id)}}" method="post"
						enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
				
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name :</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_name" value="{{$product_info->product_name}}" required=""
							>
							  </div>
							</div>


							  <div class="control-group">
								<label class="control-label" for="selectError3">Product Category :</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">

								  {{-- 	<option>Select Category</option> --}}
								  <option value="12">Laptops & Computers</option>
                                   <option value="13">Laptop & Computer Accessories</option>
                                   <option value="14">Cameras, Camcorders & Accessories</option>
                                   <option value="15">Audio & Sound Systems</option>
                                   <option value="16">Tablets & Accessories</option>
                                   <option value="17">Other Electronics</option>
								  
								  	<?php
                                $all_published_category=DB::table('tbl_category')
                                ->where('publication_status',1)
                                ->get();
                            
                            
                            	foreach($all_published_category as $cat){?>
									<option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
									<?php
                            			}
                            		?>

								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture Name :</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">

								  {{-- 	<option>Select Manufacture</option> --}}
									<?php
                                $all_published_manufacture=DB::table('tbl_manufacture')
                                ->where('publication_status',1)
                                ->get();
                            
                            
                            	foreach($all_published_manufacture as $man){?>
									<option value="{{$man->manufacture_id}}">{{$man->manufacture_name}}</option>
									<?php
                            			}
                            		?>
								  </select>
								</div>
							  </div>

							  

	        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product  Description :</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_description" rows="3"  required="">{{$product_info->product_description}}</textarea>
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="date01">Product Price :</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_price" value="{{$product_info->product_price}}" required="">
							  </div>
							</div>

							<div class="control-group">
								 <label class="control-label" for="fileInput">Display Image :</label>
								<div class="controls">
							<img src="{{URL::to($product_info->product_image1)}}"style="height:100px; width:100px"alt="templatemo easy profile">
								</div>
							</div>

							<div class="control-group">
							 
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="product_image1">
							  </div>
							</div> 

							<div class="control-group">
								 <label class="control-label" for="fileInput">Optional_Image1 :</label>
								<div class="controls">
							<img src="{{URL::to($product_info->product_image2)}}"style="height:100px; width:100px"alt="templatemo easy profile">
								</div>
							</div>


							<div class="control-group">
							 
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="product_image2">
							  </div>
							</div> 

							<div class="control-group">
								<label class="control-label" for="fileInput">Optional_Image2 :</label>
								<div class="controls">
							<img src="{{URL::to($product_info->product_image3)}}"style="height:100px; width:100px"alt="templatemo easy profile">
								</div>
							</div>


							<div class="control-group">
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="product_image3">
							  </div>

							</div> 

							<div class="control-group">
							  <label class="control-label" for="date01">Product Size :</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " value="{{$product_info->product_size}}" name="product_size">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Color :</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " value="{{$product_info->product_color}}" name="product_color">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Condition :</label>
								<div class="controls">
								  <select id="selectError3" name="condition">
								  	@if($product_info->product_condition=="New")
									<option value="New" selected="">New</option>
									<option value="Used" >Used</option>
									@else
									<option value="New" >New</option>
									<option value="Used" selected="">Used</option>
									@endif
								  </select>
								</div>
							  </div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection