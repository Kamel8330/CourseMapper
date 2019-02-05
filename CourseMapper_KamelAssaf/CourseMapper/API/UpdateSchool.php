<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['school_id'],$_REQUEST['school_name'])) {
		$schoolId = intval($_REQUEST['school_id']);
        $schoolName = $_REQUEST['school_name'];
        if (!empty($schoolId) && !empty($schoolName)) {
            $query = "update school set school_name='".$schoolName."' where school_id = '".$schoolId."'";
            $result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'school has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update school.');
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