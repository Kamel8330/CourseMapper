<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

try {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $eId = $_REQUEST['eId'];
        $query = "select * from employee where employeeId='$eId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $eName = $row['employeeName'];
        $eSurname = $row['employeeSurname'];
        $eDob = $row['employeeDob'];
        
        $emp [] = array('empName'=>$eName,'empSurname'=>$eSurname,'empDob'=>$eDob);
        echo json_encode($emp, JSON_UNESCAPED_UNICODE);
        
    }
    else{
        throw new Exception("Error 1", $code, $previous);
    }
} catch (Exception $ex) {
    echo json_encode($ex);
}
?>
