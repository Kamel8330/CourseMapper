<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['major_id'],$_REQUEST['major_name'], $_REQUEST['department_id_fk'])) {
		$majorId = intval($_REQUEST['major_id']);
        $majorName = $_REQUEST['major_name'];
        $departmentId = intval($_REQUEST['department_id_fk']);
       
        if (!empty($majorId) && !empty($majorName) && !empty($departmentId)) {
            $query = "update major set major_name='$majorName' ,department_id_fk='".$departmentId."' where major_id = '".$majorId."'";
			$result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'Major has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update Major.');
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