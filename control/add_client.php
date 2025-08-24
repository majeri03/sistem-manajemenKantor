<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

<?php
 
include("../auth/header.php");
?>
<?php include("../auth/sidebar.php");?>
<html>
<head>
</head>
<body>

<div class="page-content">

        
       <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Registration Form</h6>
								<form action="add_client.php" method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Name</label>
										<input type="text" class="form-control" name="name" id="exampleInputText1" value="" placeholder="Enter Name">
										</div>
										
										<div class="row mb-3">
											<label class="gender" for="gender">
												Gender
											</label>
										<input type="radio" name="gender" value="Male" class="mgender" id="mgender">
											<label for="mgender">
												Male
											</label>
										<input type="radio" name="gender" Value="Female" class="fgender" id="fgender">
											<label for="fgender">
												Female
											</label>
										<div>
										
										<div class="row mb-3">
										<div class="col">
											<label class="form-label">Date Of Birth:</label>
											<input type="text" class="form-control mb-4 mb-md-0" name="dob" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
										</div>
										
										<div class="mb-3">
										<label for="exampleInputEmail3" class="form-label">Email</label>
										<input type="email" name="email" class="form-control" id="exampleInputEmail3" value="" placeholder="Enter Email">
									</div>
										
										/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
									
									<div class="mb-3">
										<label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile Number</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="mobile" id="exampleInputMobile" placeholder="Mobile number">
										</div>
									</div>
									
									
									<div class="mb-3">
										<label for="exampleFormControlTextarea1" class="form-label"> Address </label>
										<textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
									</div>
									
									
									<button class="btn btn-primary" name="submit" type="submit">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div> 

</div>
</body>
</html>
<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "advocate";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
       }
		
		if(isset($_POST['submit'])){    
		 $name = $_POST['name'];
		 $gender= $_POST['gender'];
		 $dob= $_POST['dob'];
		 $email = $_POST['email'];
		 $mobile = $_POST['mobile'];
		 $address= $_POST['address'];
		 
		 
	  $sql = "INSERT INTO clients(name,gender,dob,email,mobile,address)
		 VALUES ('$name','$gender','$dob','$email','$mobile','$address')";
		 if (mysqli_query($conn, $sql)) {
			echo "New record has been added successfully !";
		 } else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		 }
		 mysqli_close($conn);
	}

?>	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
			
<?php 
include("../auth/footer.php");
      ?>
			