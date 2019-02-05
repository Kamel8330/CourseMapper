<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['role_id_fk'])) {

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $roleFK = intval($_REQUEST['role_id_fk']);

        if (!empty($username) && !empty($password) && !empty($roleFK)) {
            $query = "insert into users (username,password,role_id_fk) values('$username','$password', '$roleFK')";
            $result = mysqli_query($conn, $query);
		
            if ($result > 0) {
                $response [] = array('success'=>"New User Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "User not Added.");
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
