<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
		$query =    "select d.department_id, d.department_name, s.school_name 
					from school as s, department as d
					where d.school_id_fk = s.school_id";
		
		$stmt = $conn->prepare($query);
		$output = array();
		$stmt->execute();
		$stmt->bind_result($department_id,$department_name,$school_name);
		while ($stmt->fetch()) 
			$output[]=array('DepartmentId'=>$department_id, 'DepartmentName' => $department_name, 'SchoolName' => $school_name);
		$stmt->close();
		$conn->close();
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}
}
catch(Excpetion $err){
	echo json_encode($err);
}
?>