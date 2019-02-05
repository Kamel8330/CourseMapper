<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['username'],$_REQUEST['password'], $_REQUEST['role_id_fk'])) {
		$username = intval($_REQUEST['username']);
        $password = $_REQUEST['password'];
        
        $roleFk = intval($_REQUEST['role_id_fk']);
        
        if (!empty($username) && !empty($password) && !empty($roleFk)) {
            $query = "update users set username='".$username."',password='".$password."',role_id_fk='".$roleFk."'";
			$result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'User has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update user.');
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