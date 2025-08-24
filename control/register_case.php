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
<?php
   $get_client_sql = "select * from clients where status='0'";
   $client_list_result = $conn->query($get_client_sql);
   
   $case_stage_sql = "select * from case_stage where status='0'";
   $case_stage_result = $conn->query($case_stage_sql);
   
   $court_sql = "select * from court";
   $court_result = $conn->query($court_sql);
   
   $case_type_sql = "select * from case_types ";
   $case_type_result = $conn->query($case_type_sql);
   
   $act_sql = "select * from legel_acts where status='0'";
   $act_result = $conn->query($act_sql);
   
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
                     <h6 class="card-title">Registered Case</h6>
                     <form action="register_case.php" method="post" enctype="multipart/form-data" class="row">
                     	<div class="col-md-6">
	                        <label>Case Title</label>
	                        <input type="text" name="title" class="form-control">
	                    </div>
	                    <div class="col-md-6">
                        	<label>Case No</label>
                        	<input type="number" name="case_no" class="form-control">
                    	</div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Client Name</label>
                           <select class="form-select form-select-sm mb-3" name="client_name">
                              <option selected>select client name</option>
                              <?php 
                                 if($client_list_result->num_rows > 0){
                                 	while($row = $client_list_result->fetch_array()){
                                 		/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
                                 		
                                 		
                                 		?>
                              <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                              <?php
                                 }
                                 }
                                 ?>
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Court </label>
                           <select class="form-select form-select-sm mb-3" name="court">
                              <option selected>Select Court</option>
                              <?php 
                                 if($court_result->num_rows > 0){
                                 	while($row = $court_result->fetch_array()){
                                 		/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
                                 														?>
                              <option value="<?php echo $row['id'];?>" ><?php echo $row['court_category']; ?></option>
                              <?php
                                 }
                                 }
                                 ?> 
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Case Type</label>
                           <select class="form-select form-select-sm mb-3" name="case_type">
                              <option selected>Select case type</option>
                              <?php 
                                 if($case_type_result->num_rows > 0){
                                 	while($row = $case_type_result->fetch_array()){
                                 		/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
                                 	?>
                              <option value="<?php echo $row['id']; ?>" ><?php echo $row['case_type']; ?></option>
                              <?php
                                 }
                                 }
                                 ?>
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Case Stage</label>
                           <select class="form-select form-select-sm mb-3" name="case_stage">
                              <option selected>select case</option>
                              <?php 
                                 if($case_stage_result->num_rows > 0){
                                 	while($row = $case_stage_result->fetch_array()){
                                 		/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
                                 		
                                 		
                                 		?>
                              <option value="<?php echo $row['id']; ?>" ><?php echo $row['name']."-".$row['status']; ?></option>
                              <?php
                                 }
                                 }
                                 ?>
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Legel Acts</label>
                           <select class="form-select form-select-sm mb-3" name="legel_acts">
                              <option selected>--- select ---</option>
                              <?php 
                                 if($act_result->num_rows > 0){
                                 	while($row = $act_result->fetch_array()){
                                 		/* echo "<option value='".$row['id']."'>".$row['name']."</option>"; */
                                 		
                                 		
                                 		?>
                              <option value="<?php echo $row['id']; ?>" ><?php echo $row['act_name']."-".$row['status']; ?></option>
                              <?php
                                 }
                                 }
                                 ?>
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="exampleFormControlTextarea1" class="form-label">
                              Description
                              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" cols="150"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label class="form-label">Filling Date</label>
                        <div class="input-group date datepicker" id="datePickerExample">
                        <input type="text" name="filling_date" class="form-control">
                        <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                        </div>	
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Hearing Date</label>
                           <div class="input-group date datepicker" id="datePickerExample1">
                              <input type="text" name="hearing_date" class="form-control">
                              <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">			
                           <label>Apposite Lawyer</label>
                           <input type="text" name="opposite_lawyer" class="form-control">
                           <br><br>			
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="exampleInputNumber1" class="form-label">Total Fees</label>
                           <input type="number" name="total_fees" class="form-control" id="exampleInputNumber1" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="exampleInputNumber1" class="form-label">Unpaid</label>
                           <input type="number" name="unpaid" class="form-control" id="exampleInputNumber1" value="0">
                        </div>
                        <div class="col-md-12">
                        	<input type="submit" class="btn btn-primary" name="register" value="Submit">
                    	</div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<?php
   if(isset($_POST['register'])){   
   
    $title = $_POST['title'];
    $case_no = $_POST['case_no'];
    $client_name = $_POST['client_name'];
    $court = $_POST['court'];
    $case_type = $_POST['case_type'];
    $case_stage= $_POST['case_stage'];
       $legel_acts = $_POST['legel_acts'];
       $description = $_POST['description'];
      /*  $filling_date = date_format(date_create($_POST['filling_date']),"Y/m/d") ; */
     $filling_date = $_POST['filling_date'];
    /* $hearing_date = date_format(date_create($_POST['hearing_date']),"Y/m/d") ; */
    $hearing_date = $_POST['hearing_date'];
    $opposite_lawyer= $_POST['opposite_lawyer'];
    $total_fees= $_POST['total_fees'];
    $unpaid = $_POST['unpaid'];
    
   
   
   /* echo date_format(date_create("2013-03-15"),"d/m/Y");	
   */	
   
       $case_sql = "INSERT INTO case_register(title,case_no,client_name,court,case_type,case_stage,legel_acts,description,filling_date,hearing_date,opposite_lawyer, total_fees,unpaid) VALUES('$title','$case_no','$client_name','$court','$case_type','$case_stage','$legel_acts','$description','$filling_date','$hearing_date','$opposite_lawyer','$total_fees','$unpaid')";
    
     /*  $case_sql = "INSERT INTO case_register(title,case_no,client_name,court,case_type,case_stage,legel_acts,description,filling_date,hearing_date,opposite_lawyer, total_fees,unpaid) VALUES('$title','$case_no','$client_name','$court','$case_type','$case_stage','$legel_acts','$description', str_to_date('$filling_date','%m-%d-%y'), str_to_date('$hearing_date','%m-%d-%y'),'$opposite_lawyer','$total_fees','$unpaid')";
   */
   
   
   
       if (mysqli_query($conn, $case_sql)) {
          /* echo "New record has been added successfully !"; */
   	?>
<link rel="stylesheet" href="popup_style.css">
<div class="popup popup--icon -success js_success-popup popup--visible">
   <div class="popup__background"></div>
   <div class="popup__content">
      <h3 class="popup__content__title">
         Success 
      </h3>
      <p> Case registered</p>
      <p>
         <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
         <?php echo "<script>setTimeout(\"location.href = 'view_case.php';\",1500);</script>"; ?>
      </p>
   </div>
</div>
<?php
   } else {
   echo "Error: " . $case_sql . ":-" . mysqli_error($conn);
   }
   
   }
   mysqli_close($conn);
   
   
   
   include("../auth/footer.php");
    ?>