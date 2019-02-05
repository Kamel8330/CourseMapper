<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST["lo_id"])){	
			$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
			$lo_id = htmlentities($_POST["lo_id"]);
			$query = "delete from learningobjectives where learningobjectives_id = ".$lo_id."";
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