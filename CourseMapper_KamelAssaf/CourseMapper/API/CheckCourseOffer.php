<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['courseID'])) {

        $courseID = $_REQUEST['courseID'];
       
	   if (!empty($courseID)) {
            $query = "select count(*) from offeredCourses where course_id_fk = ?";
			
			$stmt = $conn->prepare($query);
			$stmt->bind_param("i",$courseID);
				$output = array();
				$stmt->execute();
				$stmt->bind_result($results);
				while ($stmt->fetch()) 
					$output[]=array('Results' => $results);
				$stmt->close();
				$conn->close();
				echo json_encode($output,JSON_UNESCAPED_UNICODE);
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
