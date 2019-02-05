<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['content'])) {

        $content = $_REQUEST['content'];
       
        if (!empty($content)) {
            $query = "insert into content (content) values('$content')";
            $result = mysqli_query($conn, $query);
			
            if ($result > 0) {
                $response [] = array('success'=>"New Content Created!");
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => "Content not Added.");
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
