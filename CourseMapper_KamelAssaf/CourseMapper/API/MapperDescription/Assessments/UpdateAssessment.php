<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['assessmentId'],$_REQUEST['assessment'])) {
		$assessmentId = intval($_REQUEST['assessmentId']);
        $assessment = $_REQUEST['assessment'];
        
        if (!empty($assessmentId) && !empty($assessment)) {
            $query = "update assessments set assessment='".$assessment."' where assessment_id = '".$assessmentId."'";
            $result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'Assessment has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update Assessment.');
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