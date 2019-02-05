<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['learningobjectives_id'],$_REQUEST['learningobjectives'])) {
		$learningobjectives_id = intval($_REQUEST['learningobjectives_id']);
        $learningobjectives = $_REQUEST['learningobjectives'];
       
        if (!empty($learningobjectives_id) && !empty($learningobjectives)) {
            $query = "update learningobjectives set learningobjectives='".$learningobjectives."' where learningobjectives_id = '".$learningobjectives_id."'";
            //$query = "update course set course_code = 'testando' where course_id=8";
			$result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'learning objectives has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update learning objectives .');
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