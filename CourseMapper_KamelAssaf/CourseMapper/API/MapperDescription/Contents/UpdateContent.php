<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['content_id'],$_REQUEST['content'])) {
		$content_id = intval($_REQUEST['content_id']);
        $content = $_REQUEST['content'];
       
        if (!empty($content_id) && !empty($content)) {
            $query = "update content set content='".$content."' where content_id = '".$content_id."'";
            $result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'Content has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update Content.');
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