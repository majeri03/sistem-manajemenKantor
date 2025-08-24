<?php 
include("../auth/header.php");

      ?>
<?php include("../auth/sidebar.php");?>
      
				<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Tables</a></li>
						<li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
					</ol>
				</nav>

					<div class="row">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Striped Table</h4>
								<p class="text-muted mb-3">
									Add class <code>.table-striped</code>
								</p>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>User</th>
												<th>Name</th>
												<th>Progress</th>
												<th>Salary</th>
												<th>Start date</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="py-1">
													<img src="http://via.placeholder.com/36x36" alt="image">
												</td>
												<td>Cedric Kelly</td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>$206,850</td>
												<td>June 21, 2021</td>
											</tr>
											<tr>
												<td class="py-1">
													<img src="http://via.placeholder.com/36x36" alt="image">
												</td>
												<td>Haley Kennedy</td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>$313,500</td>
												<td>May 15, 2021</td>
											</tr>
											<tr>
												<td class="py-1">
													<img src="http://via.placeholder.com/36x36" alt="image">
												</td>
												<td>Bradley Greer</td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>$132,000</td>
												<td>Apr 12, 2021</td>
											</tr>
											<tr>
												<td class="py-1">
													<img src="http://via.placeholder.com/36x36" alt="image">
												</td>
												<td>Brenden Wagner</td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>$206,850</td>
												<td>June 21, 2021</td>
											</tr>
											<tr>
												<td class="py-1">
													<img src="http://via.placeholder.com/36x36" alt="image">
												</td>
												<td>Bruno Nash</td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>$163,500</td>
												<td>January 01, 2021</td>
											</tr>
											<tr>
												<td class="py-1">
													<img src="http://via.placeholder.com/36x36" alt="image">
												</td>
												<td>Sonya Frost</td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>$103,600</td>
												<td>July 18, 2021</td>
											</tr>
											<tr>
												<td class="py-1">
													<img src="http://via.placeholder.com/36x36" alt="image">
												</td>
												<td>Zenaida Frank</td>
												<td>
													<div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>$313,500</td>
												<td>March 22, 2021</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				
			<!-- partial:../../partials/_footer.html -->
			
			<!-- partial -->
	
		</div>
	</div>

	<?php 
include("../auth/footer.php");
      ?>