<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['department_name'], $_REQUEST['school_id_fk'])) {

        $departmentName = $_REQUEST['department_name'];
        $school_id_fk  = $_REQUEST['school_id_fk'];

        if (!empty($departmentName)) {
            $query = "insert into department (department_name, school_id_fk) values('$departmentName', '$school_id_fk')";
            $result = mysqli_query($conn, $query);
			
			if ($result > 0) {
                $response [] = array('success'=>"New Department Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Department not Added.");
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
