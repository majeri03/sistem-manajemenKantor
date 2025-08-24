
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}


	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
include("../auth/header.php");
 ?>
		
<?php include("../auth/sidebar.php");?>
	
		<div class="page-content">

				
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Client Data</h6>
                 <div class="table-responsive">
				 <table id="dataTableExample" class="table">
                    <thead>
						<tr>
						<th>Id</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
						
						
                      </tr>
                    </thead>
                    <tbody>
					<?php

						  include 'connection1.php';
						
						$sql = "select * from clients";
						$result = $conn->query($sql);
						
						// print_r($result->fetch_assoc());
						// print_r($result->fetch_al());
						// exit;

						if($result->num_rows > 0){
						 while($row = $result->fetch_array()){
							
						?>
							
							
							<tr>
								<td class="sorting_1"><?=$row['id'];?></td>
								<td class="sorting_1"><?=$row['name'];?></td>
								<td class="sorting_1"><?=$row['gender'];?></td>
								<td class="sorting_1"><?=$row['dob'];?></td>
								<td class="sorting_1"><?=$row['email'];?></td>
								<td class="sorting_1"><?=$row['mobile'];?></td>
								<td class="sorting_1"><?=$row['address'];?></td>
								</tr>
						<?php		
						 }
						}
						
						else{
								echo"sql error".$sql."<br>".$conn->error;
							}
						
						$conn->close(); 
						?>

				 </tbody>
                  </table>
               
                </div>
              </div>
            </div>
	</div>
	</div>
	</div>
							
<?php

	/*if(isset($_SESSION['username'])){
		
		$now=time();
		
		if($now > $_SESSION['expire'] ){
			session_destroy();
			header("location:admin_login.php");
		}
	}
		 else{
			echo "username is:".$_SESSION['username']."<br>";
			echo "<br><p><a href ='admin_login.php'>logout</a></p>";
	} */
	
?>

	<?php 
include("../auth/footer.php")


      ?>
	  