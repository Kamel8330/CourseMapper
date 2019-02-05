<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['course_code'], $_REQUEST['course_name'], $_REQUEST['course_description'], $_REQUEST['major_id_fk'])) {

        $courseCode = $_REQUEST['course_code'];
        $courseName = $_REQUEST['course_name'];
        $courseDescription = $_REQUEST['course_description'];
        $majorFK = intval($_REQUEST['major_id_fk']);

        if (!empty($courseCode) && !empty($courseName) && !empty($courseDescription) && !empty($majorFK)) {
            $query = "insert into course (course_code,course_name,course_description,major_id_fk) values('$courseCode','$courseName', '$courseDescription', '$majorFK')";
            $result = mysqli_query($conn, $query);
			//echo json_encode($result,JSON_UNESCAPED_UNICODE);
		
            if ($result > 0) {
                $response [] = array('success'=>"New Course Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Course not Added.");
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
