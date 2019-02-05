<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['module_id'],$_REQUEST['module_name'])) {
		$module_id = intval($_REQUEST['module_id']);
        $module_name = $_REQUEST['module_name'];
      
        if (!empty($module_id) && !empty($module_name)) {
            $query = "update modules set module_name='".$module_name."' where module_id = '".$module_id."'";
            //$query = "update course set course_code = 'testando' where course_id=8";
			$result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'Module has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update Module.');
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