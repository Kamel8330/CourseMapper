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

<title>Courses</title>
</head>
<body onload="bodyLoad()">

<div class="sidebar">

  <a href="../dashboard.php">Home</a>

  <a class="active" href="#">Courses</a>
  <a href="../Majors">Majors</a>
  <a href="../Departments">Departments</a>
  <a href="../Schools">Schools</a>
</div>

<div class="content">
	
		<div class="row">
			<div><img src="../../images/logo.png" height="100"/></div>
			<div class="col-md-4"></div>
		</div>
	<div id="pageContent">
	  <h1><span class="label label-primary" data-toggle="tooltip" title="Click on the below button to start adding a course!">Courses</span></h2>
	  <hr>
	  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modalNewCourse">New Course</button>
		
	 <table id="coursesTable" class="table table-lg table-striped table-condensed coursesTable" cellspacing="0" width="100%">
	<thead>
	<tr>
				
				<th><label>Course Code</label></th>
				<th><label for="course_name">Course Name</label></th>
				<th><label>Course Description</label></th>
				<th><label>Major</label></th>
				
		</tr>
	</thead>
	<tbody id="tbody">

	
	</div>
</div>


<div class="container">
  <!-- Modal New Course-->
  <div class="modal fade" id="modalNewCourse" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New Course</h4>
        </div>
        <div class="modal-body">
          <h4 class="h4">Code<input type="text" id="course_code" class="form-control"/></h4>
          <h4 class="h4">Name<input type="text" id="course_name" class="form-control"/></h4>
          <h4 class="h4">Description<input type="text" id="course_description" class="form-control"/></h4>
          <h4 class="h4">Major</h4><select id="majorDropDown" class="form-control majorDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCourse" class="btn btn-success" data-dismiss="modal" onclick="createNewCourse()">Save</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal New Course Offering-->
  <div class="modal fade" id="modalNewCourseOffer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Course Offering</h4>
        </div>
        <div class="modal-body">
		    <input type="hidden" id="course_id_fk"/>
			<input type="text" id="_courseName" class="form-control" readonly />
            <select id="semesterDropDown" class="form-control semesterDropDown"></select>
            <select id="yearDropDown" class="form-control yearDropDown"></select>
		 </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCourseOffering" class="btn btn-success" data-dismiss="modal">Create Course Offer</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Edit Course-->
  <div class="modal fade" id="modalEditCourse" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Course</h4>
        </div>
        <div class="modal-body">
		  <input type="hidden" id="update_id"/>
          <h4 class="h4">Code<input type="text" id="update_code" class="form-control"/></h4>
          <h4 class="h4">Name<input type="text" id="update_name" class="form-control"/></h4>
          <h4 class="h4">Description<input type="text" id="update_description" class="form-control"/></h4>
          <h4 class="h4">Major</h4><select id="updateMajorDropDown" class="form-control updateMajorDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateCourse" class="btn btn-primary btnUpdateCourse" data-dismiss="modal">Update</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Course PreREquisite -->
	 <div class="modal fade" id="modalPreRequisite" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Course Pre Requisite</h4>
        </div>
        <div class="modal-body">
		    <input type="hidden" id="_courseNameID"/>
            <!--<select id="coursesDropDown" class="form-control coursesDropDown"></select>-->
			<input type="text" id="courseNameRequisite" class="form-control" readonly />
            <select id="courseRequisiteDropDown" class="form-control courseRequisiteDropDown"></select>
		 </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveCoursePreRequisite" class="btn btn-success" data-dismiss="modal">Set Course Pre Requisite</button>
        </div>
      </div>
    </div>
  </div>
 </div>

<script type="text/javascript" src="../js/dashboard.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../js/courseScript.js"></script>
<script type="text/javascript" src="../js/pagination.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>
