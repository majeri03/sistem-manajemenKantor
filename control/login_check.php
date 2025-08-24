<?php
session_start();
echo "hello";
exit;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advocate";

	$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

$db = mysqli_select_db($conn,advocate');

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = " select * from  admin where username='$username' and password='$password' ";
	$query = mysqli_query($con,$sql);
		
	$row = mysqli_num_rows($query);
	
		if($row == 0){
			echo "login successful";
			$_SESSION['username'] = $username;
	
			header('location:dashboard.php');
		}else{
			echo "login failed";
			header('location:login.php');
		}

}
		

?>
