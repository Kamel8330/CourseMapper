<?php
session_start();
if(!isset($_SESSION["Username"]))
	header("Location: ../index.php");
	?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/dashboard.css"/>
<link rel="stylesheet" href="../../css/bootstrap.css"/>
<script type="text/javascript" src="../js/dashboard.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../js/courseOfferingScript.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Course Offering</title>
</head>
<body onload="bodyLoad()">

<div class="sidebar">

  <a href="../dashboard.php">Home</a>
  <a class="active" href="#">Course Offering</a>
  <a href="../Courses">Courses</a>
  <a href="../Majors">Majors</a>
  <a href="../Departments">Departments</a>
  <a href="../Schools">Schools</a>
</div>

<div class="content">
	
		<div class="row">
			<div class="header col-md-4"><img src="../../images/logo.png" height="100" width="400"/></div>
			<div class="col-md-4"><?php echo "<h2>".$_SESSION["Username"]."</h2>"?></div>
		</div>
	<div id="pageContent">
	  <h2>Course Offering</h2>
	  
	  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNewCourseOffering">New Course Offering</button>
	 <table id="courseOfferTable" class="table table-striped courseOfferTable">
	 <tr>
				
				<th><label>Course</label></th>
				<th><label for="course_name">Semester</label></th>
				<th><label>Year</label></th>
				
	</tr>

	
	</div>
</div>


<div class="container">
  <!-- Modal New Course Offering-->
  <div class="modal fade" id="modalNewCourseOffering" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Course Offering</h4>
        </div>
        <div class="modal-body">
          <h4 class="h4">Course</h4><select id="courseDropDown" class="form-control courseDropDown"></select>
          <h4 class="h4">Semester</h4><select id="semesterDropDown" class="form-control semesterDropDown"></select>
	      <h4 class="h4">Year</h4><select id="yearDropDown" class="form-control yearDropDown"></select>
	   </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCourseOffering" class="btn btn-success" data-dismiss="modal" onclick="createNewCourseOffering()">Save</button>
        </div>
      </div>
    </div>
  </div>


<!-- Modal Edit Course-->
  <div class="modal fade" id="modalEditCourseOffering" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Course Offering</h4>
        </div>
        <div class="modal-body">
		  <input type="hidden" id="update_id"/>
			<h4 class="h4">Course</h4><select id="courseDropDown" class="form-control courseDropDown"></select>
          <h4 class="h4">Semester</h4><select id="semesterDropDown" class="form-control semesterDropDown"></select>
	      <h4 class="h4">Year</h4><select id="yearDropDown" class="form-control yearDropDown"></select>
		 </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateCourseOffering" class="btn btn-primary btnUpdateCourseOffering" data-dismiss="modal">Update</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>

</body>
</html>
