<?php
include 'connection1.php'; 
	
		
		if(isset($_GET['id'])){
			$uid = $_GET['id'];
			$sql = "update case_stage set status=1 where id = $uid";
			$result = $conn->query($sql);
			if($result == true){
				/* echo "record updated successfully"; */
				header("location:viewcase_stage.php");
			}
			else{
					echo"sql error".$conn->error;
			}
		}
		$conn->close();
?>
	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */