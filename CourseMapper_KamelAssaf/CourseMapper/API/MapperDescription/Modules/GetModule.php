<?php

require_once 'config.php';

try{
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		/*if (isset($_GET["page"])){
			$page  = $_GET["page"]; 
		}
			else {
				$page=1; 
		}  
		$start_from = ($page-1) * $limit;  
		*/
		$conn = mysqli_connect(hostname,username,password,database) or die('<h1>Could not connect to the database!</h1>');
		$query = "select modules.module_name from modules as m";
		
		$stmt = $conn->prepare($query);
		$output = array();
		$stmt->execute();
		$stmt->bind_result($module_id, $module_name);
		while ($stmt->fetch()) 
			$output[]=array('ModuleId'=>$module_id, 'ModuleName' => $module_name);
		$stmt->close();
		$conn->close();
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}
}
catch(Excpetion $err){
	echo json_encode($err);
}
?>