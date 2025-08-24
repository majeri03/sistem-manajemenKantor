
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; 

error_reporting(0);
session_start();
include 'connection1.php';

if(isset($_POST['verify']))
{
$otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
 $text_email=$_POST['username'];
  /* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
    } */
$sql = "SELECT * FROM admin where username ='".$text_email."' " ;
$ans = $conn->query($sql);
$res=mysqli_fetch_array($ans);
  $realemail=$res['username'];
  
  $personname=$res['name'];
  $user_name = $res['username'];

  
 $msg = "Your Password is :'".$otp."'";
$subject='Remind password';
 
  
$otp1 = hash('sha256', $otp);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$otp_pass =  hash('sha256', $salt . $otp1);     
  
if($text_email == $realemail){
$sql = "UPDATE admin SET password ='$otp_pass' WHERE username='$text_email'";
$ans1 = $conn->query($sql);
 




$mail = new PHPMailer;
$mail->isSMTP();  
$mail->Host = 'mail.raghavinfocom.com';  
$mail->SMTPAuth = true;                              
$mail->Username   = 'no_reply@raghavinfocom.com';
$mail->Password   = 'zo?n6BDVGtdo';
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';        
$mail->isHTML(true);
$mail->setFrom('no_reply@raghavinfocom.com','E Pass');
$mail->addAddress($text_email, $personname);
$mail->Subject ='Forget Password';
$mail->Body    =  "Hello, Your New Password is : ".$otp ;
//$mail->send();

if ($mail->send()) {
    
?>
<link rel="stylesheet" href="popup_style.css">
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Send Email Successfully.....Please check Your Email</p>
    <p>
      <a href="login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a>
    </p>
  </div>
</div>
<?php } else { ?>
<link rel="stylesheet" href="popup_style.css">
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Something Goes Wrong.....</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>



<?php

  

    
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

	<title>Advocate Management System</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="../assets/vendors/core/core.css">
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
                         <form class="forms-sample" method = "post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Enter Email address</label>
                        <input type="text" class="form-control" name="username" id="userEmail" placeholder="Email">
                      </div>
					  
					  </div>
                      <div>
                       <input type="submit" name="verify" value="Verify" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
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
