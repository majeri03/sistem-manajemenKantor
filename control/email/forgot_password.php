
<?php include('head.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Lockdown E-Pass</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="#">
<meta name="keywords" content="Admin , Responsive, ">
<meta name="author" content="Mayuri K.">


<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
</head>
<body class="fix-menu">

<?php
  include('connect.php');
if(isset($_POST['btn_forgot']))
{
$otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
 $text_email=$_POST['email'];

$sql = "SELECT * FROM admin where email ='".$text_email."' " ;
$ans = $conn->query($sql);
$res=mysqli_fetch_array($ans);
  $realemail=$res['email'];
  $person_fname=$res['fname'];  
  $person_lname=$res['lname'];
  $personname=$person_fname.$person_lname;
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
$sql = "UPDATE admin SET password ='$otp_pass' WHERE email='$text_email'";
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

<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<form method="POST" class="md-float-material form-material">
<div class="text-center">
 <image class="profile-img" src="uploadImage/Logo/<?php echo $logo; ?>" style="width: 10%"></image>
</div>
<div class="auth-box card">
<div class="card-block">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-left">Recover your password</h3>
</div>
</div>
<div class="form-group form-primary">
<input type="email" name="email" class="form-control" required="" placeholder="Your Email Address">
<span class="form-bar"></span>
</div>
<div class="row">
<div class="col-md-12">
<button type="submit" name="btn_forgot" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset Password</button>
</div>
 </div>
<p class="f-w-600 text-right">Back to <a href="login.php">Login.</a></p>
<div class="row">
<div class="col-md-10">
<p class="text-inverse text-left m-b-0">Thank you.</p>
<p class="text-inverse text-left"><a href="index.php"><b class="f-w-600">Back to website</b></a></p>
</div>
<div class="col-md-2">
<img src="files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
</div>
</div>
</div>
</div>
</form>

</div>

</div>

</div>

</section>

<script type="text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="text/javascript" src="../files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script type="text/javascript" src="../files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="../files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="../files/assets/js/common-pages.js"></script>

<script async src="#"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>


</html>
