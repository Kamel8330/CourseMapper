<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['camrt_id'],$_REQUEST['camrt'])) {
		$camrt_id = intval($_REQUEST['camrt_id']);
        $camrt = $_REQUEST['camrt'];
       
        if (!empty($camrt_id) && !empty($camrt)) {
            $query = "update camrt set camrt='".$camrt."' where camrt_id = '".$camrt_id."'";
            $result = mysqli_query($conn, $query);

            if ($result > 0) {
                $response [] = array('success'=>'CAMRT has been updated.');
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                mysqli_close($conn);
            } else {
                $response[] = array('success' => 'Could not update CAMRT.');
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