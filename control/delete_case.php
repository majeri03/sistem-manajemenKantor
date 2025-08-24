<?php
	include 'connection1.php'; 
	
		
		if(isset($_GET['id'])){
			$uid = $_GET['id'];
			$sql = "delete from case_stage where id = $uid";
			$result = $conn->query($sql);
			if($result == true){
				/* echo "record deleted successfully";
				header("location:viewcase_stage.php"); */
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
				 <?php echo "<script>setTimeout(\"location.href = 'viewcase_stage.php';\",1500);</script>"; ?>
				</p>
			  </div>
			</div>
				<?php
					}
					else{
							echo"sql error".$conn->error;
					}
				}
		$conn->close();
?>