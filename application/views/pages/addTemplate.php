 <div class="container mt-5 mb-5">	
		<div class="row ">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 shadow-lg rounded p-3 mb-5 bg-white">
			<?php 
				if(validation_errors()!= false) {
				 echo '<div class="alert alert-danger" role="alert">';
						echo	validation_errors();
					echo'</div>';
					 }

			 ?>
			<?php echo form_open_multipart('Templates/addTemplate'); ?>
			<div class="form-horizontal" method="post" action="#">
									<div class=" mb-2 bg-danger text-white"></div>
									<div class="form-group">
										<label for="car_type" class="cols-sm-2 control-label">Title</label>
										<div class="cols-sm-10">
											<div class="input-group" id="car_type">
												
												<input type="text" class="form-control"  name="title" id="title"  placeholder="Enter the title"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="build" class="cols-sm-2 control-label">Description</label>
										<div class="cols-sm-10">
											<div class="input-group" id="build">
												
												<textarea rows = "5" cols = "100" placeholder="Enter description" name = "description"></textarea>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="price" class="cols-sm-2 control-label">Price</label>
										<div class="cols-sm-10">
											<div class="input-group" id="price">
												
												<input type="number" class="form-control"  name="price" id="price"  placeholder="15"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="userfile" class="cols-sm-2 control-label">Image</label>
										<div class="cols-sm-10">
											<div class="input-group" id="userfile">
																				<input type="file" class="form-control"  name="userfile" id="userfile"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="userfile" class="cols-sm-2 control-label">Template</label>
										<div class="cols-sm-10">
											<div class="input-group" id="document">
																				<input type="file" class="form-control"  name="document" id="document"/><br>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<button type="submit" id="submitbutton" class="btn btn-secondary btn-lg btn-block login-button">Add</button>
									</div>
								</div>
				<?php echo form_close(); ?>			
		</div>
		<div class="col-lg-3"></div>
		
	</div>

 </div>