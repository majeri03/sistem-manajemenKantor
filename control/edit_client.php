
 <?php
session_start();
 if(!isset($_SESSION['username'])){
	header('location:login.php');
}
 
include("../auth/header.php");

include 'connection1.php';

if(isset($_POST['Edit'])){
	 // print_r($_POST);
	
	  /* $sql_query = "update clients set name = '".$_POST['name']."', email = '".$_POST['email']."', gender = '".$_POST['gender']."', mobile = '".$_POST['mobile']. "' where id = ".$_POST['id'];  */
	 
	 $sql_query = "update clients set name = '".$_POST['name']."', gender = '".$_POST['gender']."', dob = '".$_POST['dob']."', email = '".$_POST['email']."', mobile = '".$_POST['mobile']. "', address = '".$_POST['address']. "' where id = ".$_POST['id'];
	 
	  			echo ''. $sql_query;
		
	$result = $conn->query($sql_query);
		if($result == true){
			/*  echo "<script>alert('record updated successfully')</script>";  */
			/* header('Location: client_data.php'); */
			?>
				<link rel="stylesheet" href="popup_style.css">
			<div class="popup popup--icon -success js_success-popup popup--visible">
			  <div class="popup__background"></div>
			  <div class="popup__content">
				<h3 class="popup__content__title">
				  Success 
				</h3>
				<p>Record Updated Successfully</p>
				<p>
				 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
				 <?php echo "<script>setTimeout(\"location.href = 'client_data.php';\",1500);</script>"; ?>
				</p>
			  </div>
			</div>
			<?php
		}
		else{
				echo"sql error".$conn->error;
		}
		
		/*  */
}
 if(isset($_GET['id'])){
	$uid = $_GET['id']; 
	 // echo "connect $uid";
 
	$sql = "select * from clients where id='$uid'";
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		$row = $result->fetch_array();
		// print_r($row);
		// exit;
	} 
 }
 ?>
<html>
<head>
</head>
<body>

<div class="page-content">

         <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								
								<form method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $row['id'];?>">
									<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Name</label>
										<input type="text" class="form-control" name="name" id="exampleInputText1" value="<?php echo $row['name'];?>" placeholder="Enter Name">
										</div>
										
										<div class="row mb-3">
											<label class="gender">
												Gender
											</label>
											<input type="radio"  name="gender" value="Male"<?php if($row['gender']=="Male") echo 'checked';?>>
											<label>
												Male
											</label>
											
											<input type="radio"  name="gender" Value="Female"<?php if($row['gender']=="Female") echo 'checked';?>>
											<label>
												Female
											</label>
											</div>
										
										<div class="row mb-3">
										<div class="col">
											<label class="form-label">Date Of Birth:</label>
											<input type="text" class="form-control mb-4 mb-md-0" name="dob" value="<?php echo $row['dob'];?>" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
										</div>
										
										<div class="mb-3">
										<label for="exampleInputEmail3" class="form-label">Email</label>
										<input type="email" name="email" class="form-control" id="exampleInputEmail3" value="<?php echo $row['email'];?>" placeholder="Enter Email">
									</div>
										
									
									
									<div class="mb-3">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile Number</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile'];?>" id="exampleInputMobile" placeholder="Mobile number">
										</div>
									</div>
									
									
									<div class="mb-3">
										<label for="exampleFormControlTextarea1" class="form-label"> Address </label>
										<textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"><?php echo $row['address'];?></textarea>
									</div>
									
									
									<button class="btn btn-primary" name="Edit" type="submit">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div> 
       
</div>
</body>
</html>
	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
			

<?php
include("../auth/footer.php");
      ?>
			