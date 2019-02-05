<?php

require 'config.php';

try{
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_REQUEST["major_id"])){	
			$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
			$major_id = htmlentities($_REQUEST["major_id"]);
			$query = "delete from major where major_id = ".$major_id."";
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