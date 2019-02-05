<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST["learningoutcomes_id"])){	
			$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
			$learningoutcomes_id = htmlentities($_POST["learningoutcomes_id"]);
			$query = "delete from learningoutcomes where learningoutcomes_id = ".$learningoutcomes_id."";
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
catch(Excpetion $err){
	echo json_encode($err);
}
?>