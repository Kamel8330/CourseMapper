<?php

require 'config.php';

try{
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_REQUEST["school_id"])){	
			$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
			$school = htmlentities($_REQUEST["school_id"]);
			$query = "delete from school where school_id = ".$school."";
			$result = mysqli_query($conn, $query);
			if($result > 0)
				echo $result;
			else
				echo 0;
			mysqli_close($conn);
			//echo json_encode($output,JSON_UNESCAPED_UNICODE);
		}
	}	
}
catch(Exception $err){
	echo json_encode($err);
}
?>