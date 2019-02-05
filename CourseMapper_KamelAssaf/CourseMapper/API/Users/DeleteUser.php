<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST["username"])){	
			$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
			$courseId = htmlentities($_POST["username"]);
			$query = "delete from users where username = ".$username."";
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