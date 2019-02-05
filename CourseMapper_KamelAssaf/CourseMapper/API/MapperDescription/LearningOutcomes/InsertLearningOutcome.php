<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['learningoutcomes'])) {

        $learningoutcomes = $_REQUEST['learningoutcomes'];
        
        if (!empty($learningoutcomes)) {
            $query = "insert into learningoutcomes (learningoutcomes) values('$learningoutcomes')";
            $result = mysqli_query($conn, $query);
			//echo json_encode($result,JSON_UNESCAPED_UNICODE);
		
            if ($result > 0) {
                $response [] = array('success'=>"New Learning Outcomes Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Learning Outcomes not Added.");
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
