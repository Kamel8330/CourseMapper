<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['_course_id_fk'], $_REQUEST['_course_prerequisite_id_fk'])) {

        $courseID = intval(filter_var(htmlentities($_REQUEST["_course_id_fk"]), FILTER_VALIDATE_INT));
        $courseRequisiteID = intval(filter_var(htmlentities($_REQUEST["_course_prerequisite_id_fk"]), FILTER_VALIDATE_INT));
		
        if (!empty($courseID) && !empty($courseRequisiteID)) {
            $query = "insert into prerequisite (course_id_fk,course_prerequisite_id_fk) values('$courseID','$courseRequisiteID')";
            $result = mysqli_query($conn, $query);
			
            if ($result > 0) {
                $response [] = array('success'=>"New Course Pre Requisite Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Could Not Create Pre Requisite for course.");
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
