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
<script type="text/javascript" src="../js/departmentScript.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Departments</title>
</head>
<body onload="bodyLoad()" background="../../images/wallpaper.png" width="1" height="700px">

<div class="sidebar">

  <a href="../dashboard.php">Home</a>
  
  <a href="../Courses">Courses</a>
  <a href="../Majors">Majors</a>
  <a class="active" href="#">Departments</a>
  <a href="../Schools">Schools</a>
</div>

<div class="content">
	
		<div class="row">
			<div><img src="../../images/logo.png" height="100"/></div>
			<div class="col-md-4"></div>
		</div>
	<div id="pageContent">
	  <h1><span class="label label-primary">Departments</span></h1>
	  
	  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNewDepartment">New Department</button>
	 <table id="departmentsTable" class="table table-striped departmentsTable">
	 <tr>
				
				<th><label>Department Name</label></th>
				<th><label for="school_name">School Name</label></th>
				
		</tr>

	
	</div>
</div>


<div class="container">
  <!-- Modal New Department-->
  <div class="modal fade" id="modalNewDepartment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New Department</h4>
        </div>
        <div class="modal-body">
          <h4 class="h4">Department Name<input type="text" id="department_name" class="form-control"/></h4>
           <h4 class="h4">School Name</h4><select id="schoolDropDown" class="form-control schoolDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveDepartment" class="btn btn-success" data-dismiss="modal" onclick="createNewDepartment()">Save</button>
        </div>
      </div>
    </div>
  </div>


<!-- Modal Edit Department-->
  <div class="modal fade" id="modalEditDepartment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Department</h4>
        </div>
        <div class="modal-body">
		  <input type="hidden" id="update_id"/>
          <h4 class="h4">Department Name</h4><input type="text" class="form-control department_name"/>
         <h4 class="h4">School Name</h4><select class="form-control updateSchoolDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateDepartment" class="btn btn-primary btnUpdateDepartment" data-dismiss="modal">Update</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>

</body>
</html>
