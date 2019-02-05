<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		if(isset($_REQUEST['course_id_fk']))
		{
			$courseID = htmlentities($_REQUEST['course_id_fk']);
			$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
			$query = "select c.course_id, c.course_name, s.semester_name, y.year, i.instructor_name, z.section_room 
				from course as c, offeredcourses as o, instructors as i, semester as s, year as y , section as z 
				where c.course_id= '$courseID' and c.course_id=o.course_id_fk AND 
				o.instructor_id_fk=i.instructor_id AND 
				o.semester_id_fk = s.semester_id AND 
				o.year_id_fk = y.id AND 
				o.section_id_fk = z.section_id ";
					
			$stmt = $conn->prepare($query);
			
			$output = array();
			$stmt->execute();
			$stmt->bind_result($course_id,$course_name,$semester_name,$year,$instructor_name,$section_room);
			while ($stmt->fetch()) 
				$output[]=array('CourseId'=>$course_id,'CourseName'=>$course_name, 'SemesterName'=>$semester_name, 'Year' =>$year, 'InstructorName'=>$instructor_name, 'SectionRoom' =>$section_room);
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