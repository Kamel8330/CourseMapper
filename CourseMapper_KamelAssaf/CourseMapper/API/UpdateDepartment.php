<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['department_id'],$_REQUEST['department_name'], $_REQUEST['school_id_fk'])) {
		$departmentId = intval($_REQUEST['department_id']);
        $departmentName = $_REQUEST['department_name'];
        $schoolId = intval($_REQUEST['school_id_fk']);
        
        if (!empty($departmentId) && !empty($departmentName) && !empty($schoolId)) {
            $query = "update department set department_name='$departmentName' ,school_id_fk='$schoolId' where department_id = '$departmentId'";
			$result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'Department has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update Department.');
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