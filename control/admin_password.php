<?php
session_start();
error_reporting(0);
include("../auth/header.php");
 if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>
  <div class="page-content">
 
<?php 
include 'connection1.php';
if(isset($_POST['submit']))
	{	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
	 
	 $currentpassword=$_POST['currentpassword'];
	 $newpassword=$_POST['newpassword'];
	 $confirmpassword=$_POST['confirmpassword'];
	 
	
	$old_password = hash('sha256',$currentpassword);
	function createSalt(){
		return '2123293dsj2hu2nikhiljdsd';
	}
	$salt = createSalt();
	$oldpass = hash('sha256',$salt.$old_password);
	
	
	$new_password = hash('sha256',$newpassword);
	
	$newpass = hash('sha256',$salt.$new_password);
	
	$confirm_password = hash('sha256',$confirmpassword);
	
	$confirmpass = hash('sha256',$salt.$confirm_password);
	 //echo $newpass;exit;
	 $sql="SELECT * FROM admin where id= '".$_SESSION['id']."' ";
	$result = $conn->query($sql);

	
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
	//echo  $row['password'];exit;
 		if ($oldpass==$row['password'])
        {
            // Check if password is same
            if ($newpass == $confirmpass)
            {
                // Change password
                $sql = "UPDATE admin SET password = '".$newpass."' where id= '".$_SESSION['id']."' ";
                mysqli_query($conn, $sql);
				
				
 
              echo "<script>alert('password has been changed');
			           window.location.href='dashboard.php';
			  </script>";
				
            }
            else
            {
				echo "<script>alert('password does not match');
			           window.location.href='admin_password.php';
			  </script>";	
              
            }
        }
        else
        {
			echo "<script>alert('password is not correct');
			           window.location.href='admin_password.php';
			  </script>";
          }
 
		
}
	}
?>
 
         <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">

							
							   <form method="post" enctype="multipart/form-data">
								<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Enter your current password</label>
										<input type="password" class="form-control" name="currentpassword" id="exampleInputText1">
										</div>

								<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Enter your new password</label>
										<input type="password" class="form-control" name="newpassword" id="exampleInputText1">
										</div>
										
								<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Confirm password</label>
										<input type="password" class="form-control" name="confirmpassword" id="exampleInputText1">
										</div>
									
								<input type="submit" class="btn btn-primary" name="submit" value="Update Password">
								</form>
								<br><br>
							   
							  </div>
						</div>
					</div>
				</div> 
       
</div>
					

<?php 
include("../auth/footer.php");
?>