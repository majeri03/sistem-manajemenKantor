
<?php 
session_start();
include("../auth/header.php");
 ?>
<?php include("../auth/sidebar.php");?>
 
		<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Tables</a></li>
						<li class="breadcrumb-item active" aria-current="page">Data Table</li>
					</ol>	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
              <div class="card-body">
                <h6 class="card-title">admin Data</h6>
               
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
						<th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        
						<th align="center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php

						 /* include 'connection1.php'; */
						$servername='localhost';
						$username='root';
						$password='';
						$dbname = "advocate";
						$conn=mysqli_connect($servername,$username,$password,"$dbname");
						  if(!$conn){
							  die('Could not Connect MySql Server:' .mysql_error());
						   }
						$sql = "select * from admin";
						$result = $conn->query($sql);
						
						// print_r($result->fetch_assoc());
t						// print_r($result->fetch_al());
						// exit;

						if($result->num_rows > 0){
						 while($row = $result->fetch_array()){
							
						?>
							
							
							<tr>
								<td><?=$row['id'];?></td>
								<td><?=$row['name'];?></td>
								<td><?=$row['username'];?></td>
								
								
								
								<td><a href="edit_profile.php?id=<?=$row['id'];?>">Edit</a></td>
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
	</div>	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
	</div>
	</div>
							
<?php

	if(isset($_SESSION['username'])){
		
		$now=time();
		
		if($now > $_SESSION['expire'] ){
			session_destroy();
			header("location:admin_login.php");
		}
	}
		/* else{
			echo "username is:".$_SESSION['username']."<br>";
			echo "<br><p><a href ='admin_login.php'>logout</a></p>";
	} */
	
?>

	<?php 
include("../auth/footer.php");
      ?>