<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once 'connection.php';

try {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$username = $_POST['_username'];
			$password = $_POST['_password'];
			$password = sha1($password);
			$query = "select role_id_fk from users where username='".$username."' and password='".$password."'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_row($result);
			if($row > 0){
				//then username and password are correct.
				//we take the role name from the table.
				$roleId = $row[0];
				$role = getRole($roleId, $conn);
				//echo "Role = ".$role."";
				session_start();
				$_SESSION["Username"] = $username;
				$_SESSION["Role"] 	  = $role;
				if($roleId == 1){
					/*Administrator*/
					header("Location: ../app/dashboard.php");
				}else if($roleId == 2){
					//dean
				}
				else if($roleId == 3){
					//Instructor
				}
				else if($roleId == 4){
					//Student
					header("Location: ../app/dashboard_student.php"); 
				}else{
					//registrar
					
				}
				
 			}
			else{
				header("Location: ../index.php");
			}
	} else {
			throw new Exception("Error 1", $code, $previous);
    }
} catch (Exception $ex) {
    echo json_encode($ex);
}
function getRole($roleId, $conn){
		
			$query = "select role_name from role where role_id = '".$roleId."'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_row($result);
			if($row > 0){
			
				return $row[0];
			}
	
}
?>

