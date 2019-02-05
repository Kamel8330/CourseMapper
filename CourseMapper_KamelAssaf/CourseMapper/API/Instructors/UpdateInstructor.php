<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['section_id'],$_REQUEST['section_room'])) {
		$section_id = intval($_REQUEST['section_id']);
        $section_room = $_REQUEST['section_room'];
       
        if (!empty($section_id) && !empty($section_room)) {
            $query = "update section set section_room='".$section_room."' where section_id = '".$section_id."'";
            //$query = "update course set course_code = 'testando' where course_id=8";
			$result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'Section has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update Section.');
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