<?php

require_once '../config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		/*if (isset($_GET["page"])){
			$page  = $_GET["page"]; 
		}
			else {
				$page=1; 
		}  
		$start_from = ($page-1) * $limit;  
		*/
		$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
		$query = "select i.instructor_id, i.instructor_name from instructors as i";
		
		$stmt = $conn->prepare($query);
		$output = array();
		$stmt->execute();
		$stmt->bind_result($instructor_id,$instructor_name);
		while ($stmt->fetch()) 
			$output[]=array('InstructorId'=>$instructor_id, 'InstructorName' => $instructor_name);
		$stmt->close();
		$conn->close();
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}
}
catch(Excpetion $err){
	echo json_encode($err);
}
?>