<?php
   session_start();
   error_reporting(0);
   if(!isset($_SESSION['username'])){
   	header('location:login.php');
   }
   
   ?>
<?php    /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
      } */
   include("../auth/header.php");
   ?>
<?php include("../auth/sidebar.php");?>
<div class="page-content">
   <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
         <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
         <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
            <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar" class=" text-primary"></i></span>
            <input type="text" class="form-control border-primary bg-transparent">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
         <div class="row flex-grow-1">
            <div class="col-md-4 grid-margin stretch-card">
               <div class="card bg-warning text-white box">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Clients</h6>
                        <div class="dropdown mb-2">
                           <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                           </button>
                        </div>
                     </div>
                     <?php
                        include 'connection1.php';
                        $result = mysqli_query($conn,"SELECT * FROM clients");
                        $rows = mysqli_num_rows($result);
                        /* echo "There are " . $rows . " rows in my table"; */
                        ?>
                     <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                           <h3 class="mb-2"><?php echo $rows; ?></h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
               <div class="card bg-danger text-white box">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Cases</h6>
                        <div class="dropdown mb-2">
                           <button class="btn p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                           </button>
                        </div>
                     </div>
                     <?php
                        include 'connection1.php';
                        $result1 = mysqli_query($conn,"SELECT * FROM case_register");
                        $row1 = mysqli_num_rows($result1);
                        
                        ?>
                     <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                           <h3 class="mb-2"><?php echo $row1; ?></h3>
                           <div class="d-flex align-items-baseline">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
               <div class="card bg-success text-white box">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Active Case</h6>
                        <div class="dropdown mb-2">
                           <button class="btn p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                           </button>
                        </div>
                     </div>
                     <?php
                        include 'connection1.php';
                        $results = mysqli_query($conn,"SELECT * FROM case_stage where status='0'");
                        $row2 = mysqli_num_rows($results);
                        
                        ?>
                     <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                           <h3 class="mb-2"><?php echo $row2; ?></h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Recent cases</h6>
               <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Title</th>
                           <th>Case No</th>
                           <th>Client Name</th>
                           <th>Court</th>
                           <th>Case Type</th>
                           <th>Case stage</th>
                           <th>Legel Acts</th>
                           <th>Description</th>
                           <th>Filling Date</th>
                           <th>Hearing Date</th>
                           <th>Opposite Lawyer</th>
                           <th>Total fees</th>
                           <th>Unpaid</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           include 'connection1.php';
                           
                           /* $case_sql = "select * from case_register,clients where case_register.client_name = clients.id "; */
                           $case_sql = "select *,case_register.id as case_register_id, clients.name as clients_name from case_register,clients,case_types,court,case_stage,legel_acts where case_register.client_name = clients.id and case_register.case_type =case_types.id and case_register.court=court.id and case_register.case_stage = case_stage.id and case_register.legel_acts = legel_acts.id and filling_date >= '2022/04/01'"; 
                           
                           /* $case_sql =	"SELECT *,case_register.id, clients.client_name, court.court_category, case_stage.status, legel_acts.act_name
                           FROM case_register
                           INNER JOIN clients
                           ON case_register.client_name = clients.id
                           INNER JOIN case_types
                           ON case_register.case_type = case_types.id
                           ";  */
                           	 
                           $result = $conn->query($case_sql);
                           
                           /* print_r($result->`fetch_assoc()); */
                           /* print_r($result->fetch_all()); */
                           /* exit; */
                           
                           if($result->num_rows > 0){
                           while($row = $result->fetch_assoc()){
                           /* print_r($row); */
                           /* continue; */
                           ?>
                        <tr>
                           <td class="sorting_1"><?=$row['case_register_id'];?></td>
                           <td class="sorting_1"><?=$row['title'];?></td>
                           <td class="sorting_1"><?=$row['case_no'];?></td>
                           <td class="sorting_1"><?=$row['clients_name'];?></td>
                           <td class="sorting_1"><?=$row['court_category'];?></td>
                           <td class="sorting_1"><?=$row['case_type'];?></td>
                           <td class="sorting_1"><?php  if($row['status']=="0") 
                              echo "Active";
                               else    /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
      } */
                              echo "Inactive";?></td>
                           <td class="sorting_1"><?=$row['act_name'];?></td>
                           <td class="sorting_1"><?=$row['description'];?></td>
                           <td class="sorting_1"><?=$row['filling_date'];?></td>
                           <td class="sorting_1"><?=$row['hearing_date'];?></td>
                           <td class="sorting_1"><?=$row['opposite_lawyer'];?></td>
                           <td class="sorting_1"><?=$row['total_fees'];?></td>
                           <td class="sorting_1"><?=$row['unpaid'];?></td>
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
</div>
<?php			
   include("../auth/footer.php");
    ?>