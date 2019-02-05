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

<link rel="stylesheet" href="../css/dashboard.css"/>
<link rel="stylesheet" href="../../css/bootstrap4.css"/>


</head>
<body>

<div class="sidebar">
  <a href="background.php">Home</a>
  <a href="Courses/" class="btnCourses" onclick="clicked();">Courses</a>
  <a href="Majors/">Majors</a>
  <hr>
  <a class="active" href="Mapper/">Mapper</a>
  <a href="Users/">Users</a>
  <a href="Settings/">Settings</a>
</div>

<div class="content">
		
		<div class="row">
			<div><img src="../../images/logo.png" height="100"/></div>
			<div class="col-md-4"></div>
		</div>
		<hr>
	<div id="pageContent">
	  <h1><span class="label label-primary">Course Mapper for </span></h2>
	</div>
	<hr>
	<div class="row">
		<div class="col">
			<button type="button" class="btn btn-dark btnAddAssessment" id="btnAddAssessment">Add Assessment</button>
			<button type="button" class="btn btn-info btnAddModule" id="btnAddModule">Add Module</button>
			<button type="button" class="btn btn-dark btnAddContent" id="btnAddContent">Add Content</button>
			<button type="button" class="btn btn-info btnAddLearningObjectives" id="btnAddLearningObjectives">Add Learning Objectives</button>
			<button type="button" class="btn btn-dark btnAddLearningOutcomes" id="btnAddLearningOutcomes">Add Learning Outcomes</button>
			<button type="button" class="btn btn-info btnAddCAMRT" id="btnAddCAMRT">Add CAMRT</button>
			
		</div>
	</div>
	<hr>

	
</div>

<script type="text/javascript" src="../js/dashboard.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>

</body>
</html>
