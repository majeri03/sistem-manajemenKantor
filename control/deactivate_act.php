<?php
include 'connection1.php'; 
	
		
		if(isset($_GET['id'])){
			$aid = $_GET['id'];
			$sql = "update legel_acts set status=1 where id = $aid";
			$result = $conn->query($sql);
			if($result == true){
				/* echo "record updated successfully"; */
				header("location:view_act.php");
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
