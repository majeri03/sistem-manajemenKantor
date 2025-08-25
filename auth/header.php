<!DOCTYPE html>
<title>Kortex lite - Advocate office Software</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->
<!-- core:css --><!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
<link rel="stylesheet" href="../assets/vendors/core/core.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
<link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- endinject -->
<!-- Layout styles -->  
<link rel="stylesheet" href="../assets/css/demo1/style.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>
<body>
   <div class="main-wrapper">
   <!-- partial:partials/_sidebar.html -->
   <nav class="settings-sidebar">
      <div class="sidebar-body">
         <!-- <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
            </a> -->
         <h6 class="text-muted mb-2">Sidebar:</h6>
         <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
               <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
               <label class="form-check-label" for="sidebarLight">
               Light
               </label>
            </div>
            <div class="form-check form-check-inline">
               <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
               <label class="form-check-label" for="sidebarDark">
               Dark
               </label>
            </div>
         </div>
         <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item active" href="demo1/dashboard.html">
            <img src="../assets/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item" href="demo2/dashboard.html">
            <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
         </div>
      </div>
   </nav>
   <!-- partial -->
   <div class="page-wrapper">
   <!-- partial:partials/_navbar.html -->
   <nav class="navbar">
      <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
      </a>
      <div class="navbar-content">
         <ul class="navbar-nav">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                     include("connection1.php");
                     
                     
                     $sql = "select * from admin";
                     
                     $result = $conn->query($sql);   //mysqli_query($conn,$sql);
                     
                     if($result->num_rows > 0){
                      //fetch data of each row
                      while($row = $result->fetch_array()){
                     
                        //echo "id =".$row['id']." Name=".$row['uname']."<br>";
                                  
                                   ?>
                  <img class="wd-30 ht-30 rounded-circle" src="image/<?php echo $row['photo'];?>" alt="profile">
                  <?php
                     }
                     
                     }
                     else{
                     echo "sql error".$sql."<br>".$conn->error;  //mysqli_error();
                     }
                     $conn->close();
                     
                     
                     ?>
                  <!--<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">-->
               </a>
               <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                  <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                     <div class="mb-3">
                        <?php
                           include("connection1.php");
                           
                           
                           $sql = "select * from admin";
                           
                           $result = $conn->query($sql);   //mysqli_query($conn,$sql);
                           
                           if($result->num_rows > 0){
                            //fetch data of each row
                            while($row = $result->fetch_array()){
                           
                              //echo "id =".$row['id']." Name=".$row['uname']."<br>";
                                        
                                         ?>
                        <img class="wd-80 ht-80 rounded-circle" src="image/<?php echo $row['photo'];?>" alt="profile">
                        <?php
                           }
                           
                           }
                           else{
                           echo "sql error".$sql."<br>".$conn->error;  //mysqli_error();
                           }
                           $conn->close();
                           
                           
                           ?>
                        <!--<img class="wd-80 ht-80 rounded-circle" src="image/<?php echo $row['photo'];?>" alt="">-->
                     </div>
                     <div class="text-center">
                        <p class="tx-16 fw-bolder"><?php echo $_SESSION['username']?>
                        </p>
                        <p class="tx-12 text-muted"></p>
                     </div>
                  </div>
                  <ul class="list-unstyled p-1">
                     <li class="dropdown-item py-2">
                        <!--    <a href="pages/general/profile.html" class="text-body ms-0">-->
                        <i class="me-2 icon-md" data-feather="user"></i>
                        <a href="edit_profile.php?id=<?php echo $_SESSION['id']?>">Edit</a>
                        </a>
                     </li>
                     <li class="dropdown-item py-2">
                        <a href="javascript:;" class="text-body ms-0">
                        <i class="me-2 icon-md" data-feather="log-out"></i>
                        <a href="admin_password.php" > Change Password </a>
                        <!--   <span>Log Out</span>-->
                        </a>
                     </li>
                     <li class="dropdown-item py-2">
                        <a href="javascript:;" class="text-body ms-0">
                        <i class="me-2 icon-md" data-feather="log-out"></i>
                        <a href="admin_logout.php" > Logout</a>
                        <!--   <span>Log Out</span>-->
                        </a>
                     </li>
                  </ul>
               </div>
            </li>
         </ul>
      </div>
   </nav>
   <!-- partial -->