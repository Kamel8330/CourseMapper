<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['_course_id_fk'], $_REQUEST['_semester_id_fk'], $_REQUEST['_year_id_fk'],$_REQUEST['_section_id_fk'],$_REQUEST['_instructor_id_fk'])) {

        $courseID = $_REQUEST['_course_id_fk'];
        $semesterID = $_REQUEST['_semester_id_fk'];
        $yearID = $_REQUEST['_year_id_fk'];
        $sectionID = htmlentities($_REQUEST['_section_id_fk']);
		$instructorID = htmlentities($_REQUEST['_instructor_id_fk']);

        if (!empty($courseID) && !empty($semesterID) && !empty($yearID)) {
            $query = "insert into offeredcourses (course_id_fk,semester_id_fk,year_id_fk,instructor_id_fk,section_id_fk) values('$courseID','$semesterID', '$yearID','$instructorID', '$sectionID')";
            $result = mysqli_query($conn, $query);
			//echo json_encode($result,JSON_UNESCAPED_UNICODE);
		
            if ($result > 0) {
                $response [] = array('success'=>"New Course Offer Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Could Not Create Course Offer.");
                echo json_encode($response, JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            }
        } else {
            //values are empty!
            $response [] = array('success' => 'Value Are Empty.');
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            mysqli_close($conn);
        }
    } else {
        /* Post Request are not set */
        $response [] = array('success' => 'Fatal Error!');

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        mysqli_close($conn);
    }
}


?>
