<?php 
include("../auth/header.php");
      ?>
<?php include("../auth/sidebar.php");?>

						
					<div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
								<h6 class="card-title">Staff login</h6>
								<form class="forms-sample">
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Username</label>
										<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
									</div>
									
									<div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Password</label>
										<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password">
									</div>
									<div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">
											Remember me
										</label>
									</div>
									<button type="submit" class="btn btn-primary me-2">Submit</button>
									<button class="btn btn-secondary">Cancel</button>
								</form>
              </div>
            </div>
					</div>
					
				
			  
<?php 
include("../auth/footer.php");
      ?>			  