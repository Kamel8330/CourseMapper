<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['course_id'],$_REQUEST['course_code'], $_REQUEST['course_name'], $_REQUEST['course_description'], $_REQUEST['major_id_fk'])) {
		$courseId = intval($_REQUEST['course_id']);
        $courseCode = $_REQUEST['course_code'];
        $courseName = $_REQUEST['course_name'];
        $courseDescription = $_REQUEST['course_description'];
        $majorId = intval($_REQUEST['major_id_fk']);
        
        if (!empty($courseCode) && !empty($courseName) && !empty($courseDescription) && !empty($majorId)) {
            $query = "update course set course_code='".$courseCode."',course_name='".$courseName."',course_description='".$courseDescription."',major_id_fk='".$majorId."' where course_id = '".$courseId."'";
            //$query = "update course set course_code = 'testando' where course_id=8";
			$result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'Course has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update course.');
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
        $response [] = array('success' => 'fatal error!!!');

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        mysqli_close($conn);
    }
}
?>