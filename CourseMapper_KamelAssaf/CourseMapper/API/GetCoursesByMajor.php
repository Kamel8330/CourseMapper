<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_REQUEST["YearID"], $_REQUEST["MajorID"])){
			
			/*VAlidate as int and sanitize the request vars*/
			$yearID = htmlentities($_REQUEST["YearID"], FILTER_VALIDATE_INT);
			$majorID = htmlentities($_REQUEST["MajorID"], FILTER_VALIDATE_INT);
			
			$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
			$query = "select c.course_code,c.course_name,c.course_description 
					  from course as c, offeredcourses as o, major as m 
					  where c.course_id = o.course_id_fk and
							c.major_id_fk = ? and
							m.major_id = ? and 
							o.year_id_fk =?";
			
			$stmt = $conn->prepare($query);
			$stmt->bind_param("iii",$majorID,$majorID,$yearID);
			//$stmt = $conn->prepare($query);
				$output = array();
				$stmt->execute();
				$stmt->bind_result($course_code,$course_name,$course_description);
				while ($stmt->fetch()) 
					$output[]=array('CourseCode' => $course_code,'CourseName' => $course_name, 'CourseDescription' => $course_description);
				$stmt->close();
				$conn->close();
				echo json_encode($output,JSON_UNESCAPED_UNICODE);
		}
	}
}
catch(Excpetion $err){
	echo json_encode($err);
}
?>