 
 
 <?php
/* ini_set('display_errors', 1);
error_reporting(E_ALL); */
session_start();
 if(!isset($_SESSION['username'])){
	header('location:login.php');
}

include("../auth/header.php");
include 'connection1.php';
?>
<?php include("../auth/sidebar.php");?>
	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
<?php
/* $get_client_sql = "select * from clients";
$client_list_result = $conn->query($get_client_sql); */

/* $case_stage_sql = "select * from case_stage where status='0'";
$case_stage_result = $conn->query($case_stage_sql);

$court_sql = "select * from court";
$court_result = $conn->query($court_sql);

$case_type_sql = "select * from case_types ";
$case_type_result = $conn->query($case_type_sql);

$act_sql = "select * from legel_acts where status='0'";
$act_result = $conn->query($act_sql); */

?>
<?php
if(isset($_POST['update2'])){
	 // print_r($_POST);
	
	 
	 $sql_update = "update case_register set title = '".$_POST['title']."', case_no = '".$_POST['case_no']."', client_name = '".$_POST['client_name']."', court = '".$_POST['court']."', case_type = '".$_POST['case_type']."', case_stage = '".$_POST['case_stage']."', legel_acts = '".$_POST['legel_acts']."', description = '".$_POST['description']."',filling_date = '".$_POST['filling_date']."',hearing_date = '".$_POST['hearing_date']."', opposite_lawyer = '".$_POST['opposite_lawyer']."', total_fees = '".$_POST['total_fees']."', unpaid = '".$_POST['unpaid']."' where id = ".$_POST['case_register_id'];
	 
	 
	 
	  			echo ''. $sql_update;
				/* exit; */
		
	$result_update = $conn->query($sql_update);
		if($result_update == true){
			/* echo "<script>alert('record updated successfully')</script>"; */
			/* header('Location: view_case.php'); */
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
				 <?php echo "<script>setTimeout(\"location.href = 'view_case.php';\",1500);</script>"; ?>
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
 if(isset($_GET['case_register_id'])){
	$case_register_id = $_GET['case_register_id']; 
	 // echo "connect $uid";
	 
	$user_case_sql = "select *,case_register.id as case_register_id, clients.name as clients_name from case_register,clients,case_types,court,case_stage,legel_acts where case_register.client_name = clients.id and case_register.case_type =case_types.id and case_register.court=court.id and case_register.case_stage = case_stage.id and case_register.legel_acts = legel_acts.id and case_register.id ='$case_register_id' "; 
	/* $sql_res = "select * from case_register where case_register_id ='$rid'"; */

	$user_data_result = $conn->query($user_case_sql);
/* 	echo " <br> HERE 2";
	print_r($user_data_result);
 */
	if($user_data_result->num_rows > 0){
		$user_row = $user_data_result->fetch_assoc();
		/* print_r($user_row); */
	
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
					<h6 class="card-title">Register Case</h6>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="case_register_id" value="<?php echo $user_row['case_register_id'];?>">
                           <label>Case Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $user_row['title'];?>">
							<br><br>
							
                           <label>Case No</label>
                            <input type="number" name="case_no" class="form-control" value="<?php echo $user_row['case_no'];?>">
							<br><br>
							
							<div class="mb-3">
							
									<label class="form-label">Client Name</label>
									<select class="form-select form-select-sm mb-3" name="client_name">
										<option selected >select client name</option>
									<?php 
										$get_client_sql = "select * from clients";
										$client_list_result = $conn->query($get_client_sql);	
										if($client_list_result->num_rows > 0){
											while($row = $client_list_result->fetch_assoc()){
												/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
												
												
												?>
												
												<option <?php if($row['id'] == $user_row['client_name']) echo "selected"; ?>  value ="<?php echo $row['id']; ?>"> <?php echo $row['name']?> <option>
											
												
												<?php
											}
										}
									?>
										
										
									</select>
								</div>
							
							<div class="mb-3">
									<label class="form-label">Court </label>
									<select class="form-select form-select-sm mb-3" name="court">
										<option selected>Select Court</option>
										<?php 
										$court_sql = "select * from court";
										$court_result = $conn->query($court_sql);
										if($court_result->num_rows > 0){
											while($row = $court_result->fetch_assoc()){
												/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
												?>
												<option <?php if($row['id'] == $user_row['court']) echo "selected"; ?> value="<?php echo $row['id'];?>" ><?php echo $row['court_category']; ?></option>
												
												<?php
											}
										}
									?> 
									</select>
								</div>
							
							<div class="mb-3">
									<label class="form-label">Case Type</label>
									<select class="form-select form-select-sm mb-3" name="case_type">
										<option selected>Select case type</option>
										<?php 
										$case_type_sql = "select * from case_types ";
										$case_type_result = $conn->query($case_type_sql);
										if($case_type_result->num_rows > 0){
											while($row = $case_type_result->fetch_assoc()){
												/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
											?>
												<option <?php if($row['case_type'] == $user_row['case_type']) echo "selected"; ?> value="<?php echo $row['id'];?>"><?php echo $row['case_type']; ?></option>
												
												
									<?php
											}
										}
									?>
									</select>
								</div>
								
							<div class="mb-3">
									<label class="form-label">Case Stage</label>
									<select class="form-select form-select-sm mb-3" name="case_stage">
										<option selected>select case(0-Active case, 1-Inactive case)</option>
											<?php 
											$case_stage_sql = "select * from case_stage where status='0'";
											$case_stage_result = $conn->query($case_stage_sql);
										if($case_stage_result->num_rows > 0){
											while($row = $case_stage_result->fetch_assoc()){
												/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
												
												
												?>
												<option <?php if($row['id'] == $user_row['case_stage']) echo "selected"; ?> value="<?php echo $row['id']; ?>" ><?php echo $row['name']."-".$row['status']; ?></option>
												
												<?php
											}
										}
									?>
									</select>
								</div>
							
							<div class="mb-3">
									<label class="form-label">Legel Acts</label>
									<select class="form-select form-select-sm mb-3" name="legel_acts">
										<option selected>--- select ---</option>
										<?php 
										$act_sql = "select * from legel_acts where status='0'";
										$act_result = $conn->query($act_sql);
										if($act_result->num_rows > 0){
											while($row = $act_result->fetch_assoc()){
												/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
												
												
												?>
												<option <?php if($row['id'] == $user_row['legel_acts']) echo "selected"; ?> value="<?php echo $row['id']; ?>" ><?php echo $row['act_name']."-".$row['status']; ?></option>
												
												<?php
											}
										}
									?>
									</select>
								</div>
							
							<div class="mb-3">
										<label for="exampleFormControlTextarea1" class="form-label">Description
										<textarea class="form-control" name="description" id="exampleFormControlTextarea1" value= "<?php echo $user_row['description'];?>" rows="5"><?php echo $user_row['description'];?></textarea>
									</div>
									
							<div class="card-body">
							<label class="form-label">Filling Date</label>
							<div class="input-group date datepicker" id="datePickerExample">
									<input type="text" name="filling_date" class="form-control" value="<?php echo $user_row['filling_date'] ;?>">
									
									
									<span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
							</div>	
							</div>
							
							
							<div class="card-body">
							<label class="form-label">Hearing Date</label>
							<div class="input-group date datepicker" id="datePickerExample1">
									<input type="text" name="hearing_date" class="form-control" value="<?php echo $user_row['hearing_date'];?>">
									<span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
							</div>	
							</div>
							
							<div class="mb-3">			
							<label>Apposite Lawyer</label>
                            <input type="text" name="opposite_lawyer" class="form-control" value="<?php echo $user_row['opposite_lawyer'];?>">
							<br><br>			
							</div>
							
							<div class="mb-3">
										<label for="exampleInputNumber1" class="form-label">Total Fees</label>
										<input type="number" name="total_fees" class="form-control" id="exampleInputNumber1" value="<?php echo $user_row['total_fees'];?>">
								</div>
							<div class="mb-3">
										<label for="exampleInputNumber1" class="form-label">Unpaid</label>
										<input type="number" name="unpaid" class="form-control" id="exampleInputNumber1" value="<?php echo $user_row['unpaid'];?>">
								</div>
								<br>
								<br>
							<input type="submit"  name="update2" value="Update">
                    </form>
                </div>
				</div>
				</div>
				</div>
				</div>
</body>
</html>


<?php
   include("../auth/footer.php");
      ?>