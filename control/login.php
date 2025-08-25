<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

    $username = $_POST['username'];
    $password_input = $_POST['password'];

    $sql = "SELECT id, username, password FROM admin WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password_input, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                
                unset($_SESSION['login_error']);
                header("Location: dashboard.php");
                exit();
            }
        }
        
        $_SESSION['login_error'] = "Username atau Password yang Anda masukkan salah.";

    } else {
        $_SESSION['login_error'] = "Terjadi kesalahan pada sistem.";
    }

    $stmt->close();
    $conn->close();
    
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Kortex lite - Login</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../assets/vendors/core/core.css">
      <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
      <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
      <link rel="stylesheet" href="../assets/css/demo1/style.css">
      <link rel="shortcut icon" href="../assets/images/favicon.png" />
      <link rel="stylesheet" href="popup_style.css">
      </head>
   <body>
      <?php
      if (isset($_SESSION['login_error'])) {
          echo '
          <div class="popup popup--icon -error js_error-popup popup--visible">
             <div class="popup__background"></div>
             <div class="popup__content">
                <h3 class="popup__content__title">Error</h3>
                <p>' . htmlspecialchars($_SESSION['login_error']) . '</p>
                <p>
                   <a href="login.php" onclick="document.querySelector(\'.js_error-popup\').classList.remove(\'popup--visible\'); return false;"><button class="button button--error" data-for="js_error-popup">Close</button></a>
                </p>
             </div>
          </div>';
          unset($_SESSION['login_error']);
      }
      ?>
      <div class="main-wrapper">
         <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center p-0">
               <div class="row w-100 mx-0 auth-page">
                  <div class="col-md-6 login-img p-0">
                     <img src="../assets/images/login-img.jpg" width="100%" class="vh-100" style="object-fit: cover;">
                  </div>
                  <div class="col-md-6 bg-white">
                     <div class="col-md-8 mx-auto">
                        <div class="auth-form-wrapper px-4 py-7 vh-100">
                           <img src="assets/images/logo.png" style="height: 135px;padding-top: 10px;">
                           <form class="forms-sample login-form" method="post" action="login.php">
                              <div class="mb-3">
                                 <label for="userEmail" class="form-label">Email address</label>
                                 <input type="email" class="form-control" name="username" id="userEmail" placeholder="Email" required>
                              </div>
                              <div class="mb-3">
                                 <label for="userPassword" class="form-label">Password</label>
                                 <input type="password" class="form-control" name="password" id="userPassword" autocomplete="current-password" placeholder="Password" required>
                              </div>
                              <div>
                                 <input type="submit" name="login" value="Login" class="btn btn-primary w-100 me-2 mb-2 mb-md-0 text-white">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="../assets/vendors/core/core.js"></script>
      <script src="../assets/vendors/feather-icons/feather.min.js"></script>
      <script src="../assets/js/template.js"></script>
   </body>
</html>