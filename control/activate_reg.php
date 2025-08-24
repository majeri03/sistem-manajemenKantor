<?php
include 'connection1.php'; 
	
		
		if(isset($_GET['id'])){
			$rid = $_GET['id'];
			$sql_reg = "update case_register set status=0 where id = $rid";
			$result = $conn->query($sql_reg);
			if($result == true){
				/* echo "record updated successfully"; */
				header("location:view_case.php");
			}
			else{
					echo"sql error".$conn->error;
			}
		}
		$conn->close();	/* <!--  Author Name- Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website - www.mayurik.com -->
		} */
?>