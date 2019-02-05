<?php
session_start();
if(!isset($_SESSION["Username"], $_SESSION["Role"]))
	{
		header("Location: ../index.php");
	}	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/dashboard.css"/>
<link rel="stylesheet" href="../css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"/>

    
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="sidebar">
  <a class="active" href="background.php">Home</a>
  <a href="Courses/" class="btnCourses" onclick="clicked();">Courses</a>
  <a href="Majors/">Majors</a>
  <!--<a href="Departments/">Departments</a>
  <a href="Schools/">Schools</a>-->
   <!--<div class="dropdown show">
 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Mapper Settings
  </a>

  <div id="dropdown-menu1" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			  <a href="Assessments/"style="color:orange;">Assessments</a>
              <a style="color:orange;">Learning Outcomes</a>
              <a class="h6" style="color:orange;">Learning Objectives</a>
              <a class="h5" style="color:orange;">Modules</a>
              <a class="h5" style="color:orange;">CAMRT</a>
              <a class="h5" style="color:orange;">Contents</a>
              <a class="h5" style="color:orange;">Sections</a>
  </div>
</div>-->
  <hr>
  <a href="Mapper/">Mapper</a>
  <a href="Users/">Users</a>
  <a href="Settings/">Settings</a>
</div>

<div class="content">
		
		<div class="row">
			<div><img src="../images/logo.png" height="100"/></div>
			<div class="col-md-4"></div>
		</div>
	<div id="pageContent">
	  <h1><span class="label label-primary">Major Curriculum Mapper</span></h2>
	</div>
</div>

</body>
</html>
