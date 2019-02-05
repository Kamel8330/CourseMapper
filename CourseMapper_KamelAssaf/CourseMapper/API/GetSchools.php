<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
		$query = "select s.school_id, s.school_name from school as s";
		
		$stmt = $conn->prepare($query);
		$output = array();
		$stmt->execute();
		$stmt->bind_result($school_id,$schoolName);
		while ($stmt->fetch()) 
			$output[]=array('SchoolId' => $school_id, 'SchoolName' => $schoolName);
		$stmt->close();
		$conn->close();
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}
}
catch(Excpetion $err){
	echo json_encode($err);
}
?>