<?php

require_once 'config.php';

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
		$query = "select c.course_id, c.course_code, c.course_name, c.course_description, m.major_name
					from course as c, major as m 
					where c.major_id_fk = m.major_id
				";
		
		$stmt = $conn->prepare($query);
		$output = array();
		$stmt->execute();
		$stmt->bind_result($course_id,$course_code,$course_name,$course_description,$major_name);
		while ($stmt->fetch()) 
			$output[]=array('CourseId'=>$course_id, 'CourseCode' => $course_code,'CourseName' => $course_name, 'CourseDescription' => $course_description, 'MajorName'=>$major_name);
		$stmt->close();
		$conn->close();
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}
}
catch(Excpetion $err){
	echo json_encode($err);
}
?>