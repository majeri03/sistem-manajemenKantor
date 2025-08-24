
<?php
error_reporting(0);
session_start();
include 'connection1.php';

if(isset($_POST['username']) && isset($_POST['password'])){

	$username= $_POST['username'];
	$password= $_POST['password'];
	
	$passw = hash('sha256',$password);
	function createSalt(){
		return '2dfrtasertghhjji';
	}
	$salt = createSalt();
	$pass = hash('sha256',$salt.$passw);
	// echo $pass;
	// exit;
	
	  /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
    } */
	
	$sql_query = "select id, username, password from admin where username= '$username' and password = '$pass' limit 1";

	
	$result = $conn->query($sql_query);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		
		if($row['username'] == $username && $row['password'] == $pass  ){
		/* echo "$row[0]";
		print_r($row); */
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $name;
		$_SESSION['id'] =$row['id'];
		$_SESSION['password']=$password;
		$_SESSION['photo']=$photo;
		?>
		
		<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h3>
    <p>Login Successfully</p>
    <p>
     <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
     <?php echo "<script>setTimeout(\"location.href = 'dashboard.php';\",3000);</script>"; ?>
    </p>
  </div>
</div>
   <!--   <script>
     window.location="index.php";
     </script> -->
     <?php
    }
 }
else {?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h3>
    <p>Invalid Email or Password</p>
    <p>
      <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>
       <!--  <script> 
       // alert("Invalid email or Password!");
        window.location="login.php";
        </script> -->
        <?php
        //// $message = "Invalid email or Password!";
         }
    		
	} 
	



?>




<!DOCTYPE html>
<!--
Template Name: Kortex lite - Advocate office Software
Author: NobleUI
Purchase: https://1.envato.market/nobleui_admin
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">
	<meta name="author" content="Mayuri K Freelancer">
	<meta name="keywords" content="">

	<title>Kortex lite - Advocate office Software</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="../assets/vendors/core/core.css">
	<link rel="stylesheet" href="popup_style.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="../assets/css/demo1/style.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="../assets/images/favicon.png" />
  
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Advocate<span> Management System</span></a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" method = "post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="username" id="userEmail" placeholder="Email">
                      </div>
					  <div class="mb-3">
                      <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="userPassword" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                          Remember me
                        </label>
                      </div>
                      <div>
                       <input type="submit" name="login" value="Login" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                      <!--   <button type="submit" name="login" class="btn btn-primary me-2">Login</button>-->
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
  /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
    } */
	<!-- core:js -->
	<script src="../assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->



</body>
</html>
