<?php
 session_start();
error_reporting(0);
 if(!isset($_SESSION['id'])){
	header('location:login.php');
}
?>
<?php
 	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
 include("../auth/header.php");
 include 'connection1.php';

 if(isset($_GET['id'])){
	$uid = $_GET['id']; 
	 // echo "connect $uid";
 
	$sql = "select * from admin where id=$uid";
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		$row = $result->fetch_array();
		/* // print_r($row);
		exit; */
		/* $gender = $row['gender']; */
	}
 }
?>

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
										
									<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Username</label>
										<input type="text" class="form-control" name="username" id="exampleInputText1" value="<?php echo $row['username'];?>" placeholder="Enter username">
										</div>
										
										<div>
										Attach image
										<br>
										Select file
										<input type="file" id="photo" name="image"> 
										
										
	               			<img class="wd-80 ht-80 rounded-circle" src="image/<?php echo $row['photo'];?>" alt="profile">
	               			
	              
										
										<br>
									<!--	<input type="hidden" value="" name="image">-->
										<br>
										</div>		
									
									
									<!--<a href="edit_profile.php?id=<?=$row['id'];?>">Edit</a>-->
									
									<button class="btn btn-primary" name="edit" type="submit">Update</button>
									
								</form>
							</div>
						</div>
					</div>
				</div> 
       
</div>
<?php
	
	
if(isset($_POST['edit'])){
	 // print_r($_POST);
	/* $id=$_SESSION['id]']; */
		$id = $_POST['id'];
        $name = $_POST['name'];
		$username = $_POST['username'];
		/* $password = $_POST['password']; */
			  
	 $errors = array();
   $filename = $_FILES['image']['name']; //imagenm.jpg
   $filesize = $_FILES['image']['size'];
   $filetemp = $_FILES['image']['tmp_name'];
   $filetype = $_FILES['image']['type'];  
   	
   $file_ext = strtolower(end(explode('.',$filename)));

   	$extension = array("jpeg","jpg","png");

   	if(in_array($file_ext,$extension)===false){

          $errors[]="extension not allowed .please choose jpg,png image file";
   	}

   	if($filesize > 2097152 ){  //2 mb

   			$errors[] = "file size must be 2 mb or small";	
   	} 
   	if(!empty($filename)){
   			$filename = rand(00,99).$filename;
   	        if(empty($errors)==true){
   		        move_uploaded_file($filetemp,"image/".$filename);
   		        echo "file uploaded successfully";
   				}
  			 	else
   				{
   				print_r($errors);
   				}
   	}
   	else
   	{
         $filename = $row['photo'];
   	}
	  
	/* $sql_query = "update admin set name = '".$_POST['name']."', username = '".$_POST['username']."', photo = '".$_POST['filename']."' where id = ".$_POST['id']; */
	  			
	$sql_query = "update admin set name='$name',username='$username', photo='$filename' where id='$uid'";			
				/* echo ''. $sql_query; */
		
	$result = $conn->query($sql_query);
		if($result == true){
			/* echo '<script>alert("record updated successfully")</script>'; */
/* 			 echo ("record updated successfully");  */
			?>
				<link rel="stylesheet" href="popup_style.css">
			<div class="popup popup--icon -success js_success-popup popup--visible">
			  <div class="popup__background"></div>
			  <div class="popup__content">
				<h3 class="popup__content__title">
				  Success 
				</h3>
				<p>Profile Updated Successfully</p>
				<p>
				 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
				 <?php echo "<script>setTimeout(\"location.href = 'view_case.php';\",1500);</script>"; ?>
				</p>
			  </div>
			</div>
			<?php
			/*  header('Location:dashboard.php');  */
		}
		else{
				echo"sql error".$conn->error;
		}
		
}
?>
<?php 
include("../auth/footer.php");
 ?>