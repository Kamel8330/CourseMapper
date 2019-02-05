<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
		$query = "select m.major_id, m.major_name, d.department_name
					from major as m, department as d 
					where m.department_id_fk = d.department_id";
		
		$stmt = $conn->prepare($query);
		$output = array();
		$stmt->execute();
		$stmt->bind_result($major_id,$major_name,$department_name);
		while ($stmt->fetch()) 
			$output[]=array('MajorId'=>$major_id, 'MajorName' => $major_name, 'DepartmentName' => $department_name);
		$stmt->close();
		$conn->close();
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}
}
catch(Exception $err){
	echo json_encode($err);
}
?>