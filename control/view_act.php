<?php
   /* ini_set('display_errors', 1);
   error_reporting(E_ALL); */
   session_start();
   if(!isset($_SESSION['username'])){
   	header('location:login.php');
   
   }
   ?>
<?php 
   include("../auth/header.php");
     /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
    } */
   ?>   
<?php include("../auth/sidebar.php");?>
<link rel="stylesheet" href="popup_style.css">
<div class="page-content">
   <?php
      if(isset($_GET['id']))
      { ?>
   <div class="popup popup--icon -question js_question-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
         <h3 class="popup__content__title">
         Sure
         </h1>
         <p>Are You Sure To Delete This Act?</p>
         <p></p>
         <p>
            <a href="delete_act.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success" data-for="js_success-popup">Yes</a>
            <a href="view_act.php" class="btn btn-danger" data-for="js_success-popup">No</a>
         </p>
      </div>
   </div>
   <?php } ?>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Data Table</h6>
               <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Act Name</th>
                           <th>Status</th>
                           <th>Action</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           include 'connection1.php';
                           
                           $sql = "select * from legel_acts";
                           $result = $conn->query($sql);
                           
                           // print_r($result->fetch_assoc());
                           // print_r($result->fetch_al());
                           // exit;
                           
                           if($result->num_rows > 0){
                            while($row = $result->fetch_array()){
                           	
                           ?>
                        <tr>
                           <td class="sorting_1"><?=$row['id'];?></td>
                           <td class="sorting_1"><?=$row['act_name'];?></td>
                           <td class="sorting_1"><?php  if($row['status']=="0") 
                              echo "Active";
                               else 
                              echo "Inactive";?></td>
                           <td><a class="btn btn-danger" href="view_act.php?id=<?=$row['id'];?>"><i class="fa fa-trash text-white" aria-hidden="true"></i></a>
                           	<a class="btn btn-success" href="edit_act.php?id=<?=$row['id'];?>"><i class="fa fa-edit text-white" aria-hidden="true"></i></a>
                           </td>
                           <td> <?php if($row['status']=="0") 
                              echo "<a href=deactivate_act.php?id=".$row['id']." class='btn btn-danger'>Deactivate</a>";
                              else 
                                             echo "<a href=activate_act.php?id=".$row['id']." class='btn btn-success'>Activate</a>";
                              ?></td>
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
   <!-- partial:../../partials/_footer.html -->
   <!-- partial -->
</div>
<?php 
   include("../auth/footer.php");
         ?>