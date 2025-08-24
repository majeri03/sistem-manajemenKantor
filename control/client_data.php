<?php
   session_start();
   if(!isset($_SESSION['username'])){
   	header('location:login.php');
   }
   include("../auth/header.php");
    ?>
<?php include("../auth/sidebar.php");?>
<link rel="stylesheet" href="popup_style.css">
<div class="page-content">
   <?php
      if(isset($_GET['id']))
      { ?>  /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
      } */
   <div class="popup popup--icon -question js_question-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
         <h3 class="popup__content__title">
         Sure
         </h1>
         <p>Are You Sure To Delete This Record?</p>
         <p></p>
         <p>
            <a href="delete_client.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success" data-for="js_success-popup">Yes</a>
            <a href="client_data.php" class="btn btn-danger" data-for="js_success-popup">No</a>
         </p>
      </div>
   </div>
   <?php } ?>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Client Data</h6>
               <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Name</th>
                           <th>Gender</th>
                           <th>DOB</th>
                           <th>Email</th>
                           <th>Mobile</th>
                           <th>Address</th>
                           <th>Status</th>
                           <th>Action</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           include 'connection1.php';
                           
                           $sql = "select * from clients";
                           $result = $conn->query($sql);
                           
                           // print_r($result->fetch_assoc());
                           // print_r($result->fetch_al());
                           // exit;
                           
                           if($result->num_rows > 0){
                           while($row = $result->fetch_array()){
                           
                           ?>
                        <tr>
                           <td class="sorting_1"><?=$row['id'];?></td>
                           <td class="sorting_1"><?=$row['name'];?></td>
                           <td class="sorting_1"><?=$row['gender'];?></td>
                           <td class="sorting_1"><?=$row['dob'];?></td>
                           <td class="sorting_1"><?=$row['email'];?></td>
                           <td class="sorting_1"><?=$row['mobile'];?></td>
                           <td class="sorting_1"><?=$row['address'];?></td>
                           <td class="sorting_1"><?php  if($row['status']=="0") 
                              echo "Active";
                               else 
                              echo "Inactive";?></td>
                           <td><a class="btn btn-danger" href="client_data.php?id=<?=$row['id'];?>"><i class="fa fa-trash text-white" aria-hidden="true"></i></a>
                           	<a class="btn btn-success" href="edit_client.php?id=<?=$row['id'];?>"><i class="fa fa-edit text-white" aria-hidden="true"></i></a>
                           </td>
                           <td> <?php if($row['status']=="0") echo 
                              "<a href=deactivate.php?id=".$row['id']." class='btn btn-danger'>Deactivate</a>";
                              else 
                              echo 
                              "<a href=activate.php?id=".$row['id']." class='btn btn-success'>&nbsp; Activate&nbsp;&nbsp; </a>";
                              ?>
                           </td>
                        </tr>
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
      </div>
   </div>
</div>   /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
      } */
<?php
   /*if(isset($_SESSION['username'])){
   	
   	$now=time();
   	
   	if($now > $_SESSION['expire'] ){
   		session_destroy();
   		header("location:admin_login.php");
   	}
   }
   	 else{
   		echo "username is:".$_SESSION['username']."<br>";
   		echo "<br><p><a href ='admin_login.php'>logout</a></p>";
   } */
   
   ?>
<?php 
   include("../auth/footer.php")
   
   
         ?>