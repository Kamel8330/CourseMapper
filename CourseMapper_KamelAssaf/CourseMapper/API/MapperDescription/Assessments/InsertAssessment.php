<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['assessment'])) {

        $assessment = $_REQUEST['assessment'];
        
        if (!empty($assessment)) {
            $query = "insert into assessments (assessment) values('$assessment')";
            $result = mysqli_query($conn, $query);
			//echo json_encode($result,JSON_UNESCAPED_UNICODE);
		
            if ($result > 0) {
                $response [] = array('success'=>"New Assessment Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Assessment not Added.");
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
