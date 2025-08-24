
 <?php
session_start();
 if(!isset($_SESSION['username'])){
	header('location:login.php');
}
 
include("../auth/header.php");
include 'connection1.php';
<?php include("../auth/sidebar.php");?>

if(isset($_POST['Edit'])){
	 // print_r($_POST);
	
	 
	 
	 $sql_query = "update case_stage set name = '".$_POST['name']."' where id = ".$_POST['id'];
	 
	  			echo ''. $sql_query;
		
	$result = $conn->query($sql_query);
		if($result == true){
			/* echo "record updated successfully"; */
				/* header('location:viewcase_stage.php'); */
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
				 <?php echo "<script>setTimeout(\"location.href = 'viewcase_stage.php';\",1500);</script>"; ?>
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
 
	$sql = "select * from case_stage where id='$uid'";
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
			