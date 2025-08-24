<?php
   session_start();
   if(!isset($_SESSION['username'])){
   	header('location:login.php');
   }
   ?>
<?php 
   include("../auth/header.php");
   ?>
<?php include("../auth/sidebar.php");?>
<html>   /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
      } */
   <head></head>
   <body>
      <div class="page-content">
         <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <h6 class="card-title">Add Acts</h6>
                     <form  method="post" enctype="multipart/form-data" class="row">
                        <div class="col-md-6 mb-3">
                           <label for="exampleInputText1" class="form-label">Act Name</label>
                           <input type="text" class="form-control" name="aname" id="exampleInputText1" value="" placeholder="Enter Act Name">
                        </div>
                        <div class="col-md-12 mb-3">
                        	<button class="btn btn-primary" name="add" type="submit">Add</button>
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
   include 'connection1.php';
   	if(isset($_POST['add'])){    
   	 $aname = $_POST['aname'];
   	 
   	  /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
      } */
     $sql = "INSERT INTO legel_acts(act_name,status) VALUES ('$aname','1')";
   	 if (mysqli_query($conn, $sql)) {
   		 ?>
<link rel="stylesheet" href="popup_style.css">
<div class="popup popup--icon -success js_success-popup popup--visible">
   <div class="popup__background"></div>
   <div class="popup__content">
      <h3 class="popup__content__title">
         Success 
      </h3>
      <p> New Act added Successfully</p>
      <p>
         <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
         <?php echo "<script>setTimeout(\"location.href = 'client_data.php';\",1500);</script>"; ?>
      </p>
   </div>
</div>
<?php
   } else {
   echo "Error: " . $sql . ":-" . mysqli_error($conn);
   }
   mysqli_close($conn);
   }
   
   ?>
<?php 
   include("../auth/footer.php");
         ?>