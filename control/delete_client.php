<?php
	include 'connection1.php'; 
	
	/* $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "advocate";

	$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} */
			/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
		if(isset($_GET['id'])){
			$uid = $_GET['id'];
			$sql = "delete from clients where id = $uid";
			$result = $conn->query($sql);
			if($result == true){
				/* echo "record deleted successfully";
				header("location:client_data.php"); */
				?>
			<link rel="stylesheet" href="popup_style.css">
			<div class="popup popup--icon -success js_success-popup popup--visible">
			  <div class="popup__background"></div>
			  <div class="popup__content">
				<h3 class="popup__content__title">
				  Success 
				</h3>
				<p>Record deleted Successfully</p>
				<p>
				
				
				
				
				 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
				 <?php echo "<script>setTimeout(\"location.href = 'client_data.php';\",1500);</script>"; ?>
				</p>
			  </div>
			</div>
			<?php
			}
			else{
					echo"sql error".$conn->error;
			}
		}	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
		$conn->close();
?>