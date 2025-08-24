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
					<h6 class="card-title">Register Case</h6>
                    <form action="register_case.php" method="post" enctype="multipart/form-data">
                        
                            <label>Case Title</label>
                            <input type="text" name="ctitle" class="form-control">
							<br><br>
							
                           <label>Case No</label>
                            <input type="number" name="cnumber" class="form-control">
							<br><br>
							
							<div class="mb-3">
									<label class="form-label">Client Name</label>
									<select class="form-select form-select-sm mb-3">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
							
							<div class="mb-3">
									<label class="form-label">Court </label>
									<select class="form-select form-select-sm mb-3">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option> 
										<option value="3">Three</option>
									</select>
								</div>
							
							<div class="mb-3">
									<label class="form-label">Case Type</label>
									<select class="form-select form-select-sm mb-3">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
								
							<div class="mb-3">
									<label class="form-label">Case Stage</label>
									<select class="form-select form-select-sm mb-3">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
							
							<div class="mb-3">
									<label class="form-label">Legel Acts</label>
									<select class="form-select form-select-sm mb-3">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
							
							<div class="mb-3">
										<label for="exampleFormControlTextarea1" class="form-label">Description
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
									</div>
									
							<div class="col">
											<label class="form-label">Filling Date</label>
											<input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
										</div>
										
							<div class="col">
											<label class="form-label">Hearing Date</label>
											<input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
										</div>
							<div class="mb-3">
									<label class="form-label">Apposite lawyer</label>
									<select class="form-select form-select-sm mb-3">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
								
							<div class="mb-3">
										<label for="exampleInputNumber1" class="form-label">Number Input</label>
										<input type="number" class="form-control" id="exampleInputNumber1" value="6473786">
								</div>
							
								<br>
								<br>
							<input type="submit"  name="submit" value="Submit">
                    </form>
                </div>
				</div>
				</div>
				</div>
				</div>
</body>
</html>


<?php
    include 'connection1.php';
		
	if(isset($_POST['submit'])){    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];
	 $gender= $_POST['gender'];
	 $address= $_POST['address'];
	 $image= $_POST['image'];
	 
	 if(isset($_FILES['image'])){
		$errors = array();
		$filename=$_FILES['image']['name'];
		$filesize=$_FILES['image']['size'];
		$filetemp=$_FILES['image']['tmp_name'];
		$filetype=$_FILES['image']['type'];
		
		$file_ext= strtolower(end(explode('.',$_FILES['image']['name'])));
		
		$extensions = array("jpeg","jpg","png");
		if(in_array($file_ext,$extensions)===false){
			$errors[]="please choose jpeg,jpg,png image file";
			}
			
			if($filesize > 2097152){
			$errors[]= "file size must be 2mb or less than 2mb";
			}
			$filename= rand(00,99).$filename;
			if(empty($errors)==true){
				move_uploaded_file($filetemp,"images/".$filename);
				echo "file uploaded successfully";
			}
			else{
				print_r($errors);
			}
		}
	 
     $sql = "INSERT INTO usertbl(name,email,gender,mobile,address,image)
     VALUES ('$name','$email','$gender','$mobile','$address','$filename')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<?php 
include("../auth/footer.php");
      ?>