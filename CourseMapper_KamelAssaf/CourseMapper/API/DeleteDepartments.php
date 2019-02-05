<?php

require_once "config.php";

try{
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_REQUEST["department_id"])){	
			$conn = mysqli_connect(hostname,username,password,database) or die("<h1>Could not connect to the database!</h1>");
			$departmentID = htmlentities($_REQUEST["department_id"]);
			$query = "delete from department where department_id = '$departmentID'";
			$result = mysqli_query($conn, $query);
			if($result)
				echo 1;
			else
				echo 0;
			mysqli_close($conn);
			//echo json_encode($output,JSON_UNESCAPED_UNICODE);
		}
	}	
}
catch(Exception $err){
	//echo json_encode($err);
}
?>