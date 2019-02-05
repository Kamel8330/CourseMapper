<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['major_name'], $_REQUEST['department_id_fk'])) {

        $majorName = $_REQUEST['major_name'];
        $departmentFK = intval($_REQUEST['department_id_fk']);

        if (!empty($majorName)&& !empty($departmentFK)) {
            $query = "insert into major (major_name,department_id_fk) values('".$majorName."','$departmentFK')";
            $result = mysqli_query($conn, $query);
			
            if ($result > 0) {
                $response [] = array('success'=>"New Major Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Major not Added.");
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
