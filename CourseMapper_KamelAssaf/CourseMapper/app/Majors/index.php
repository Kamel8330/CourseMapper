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
<script type="text/javascript" src="../js/majorScript.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Majors</title>
</head>
<body onload="bodyLoad()">

<div class="sidebar">

  <a href="../dashboard.php">Home</a>
   
  <a href="../Courses">Courses</a>
  <a class="active"  href="#">Majors</a>
  <a href="../Departments">Departments</a>
  <a href="../Schools">Schools</a>
</div>

<div class="content">
	
		<div class="row">
			<div><img src="../../images/logo.png" height="100"/></div>
			<div class="col-md-4"></div>
		</div>
	<div id="pageContent">
	  <h1><span class="label label-primary">Majors<span></h1>
	  
	  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNewMajor">New Major</button>
	 <table id="majorsTable" class="table table-striped majorsTable">
	 <tr>
				
				<th><label>Major Name</label></th>
				<th><label>Department Name</label></th>
				
		</tr>

	
	</div>
</div>


<div class="container">
  <!-- Modal New Major-->
  <div class="modal fade" id="modalNewMajor" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New MAjor</h4>
        </div>
        <div class="modal-body">
          <h4 class="h4">Major Name</h4><input type="text" id="major_name" class="form-control major_name"/>
           <h4 class="h4">Department Name</h4><select id="departmentDropDown" class="form-control departmentDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveMajor" class="btn btn-success" data-dismiss="modal" onclick="createNewMajor()">Save</button>
        </div>
      </div>
    </div>
  </div>


<!-- Modal Edit Major-->
  <div class="modal fade" id="modalEditMajor" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#1e8a36;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Major</h4>
        </div>
        <div class="modal-body">
		  <input type="hidden" id="update_id"/>
          <h4 class="h4">Major Name</h4><input type="text" class="form-control update_major_name"/>
         <h4 class="h4">Department Name</h4><select class="form-control updateDepartmentDropDown"></select><!--<input type="dropdown" id="department_name" class="form-control"/>-->
        </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateMajor" class="btn btn-primary btnUpdateMajor" data-dismiss="modal">Update</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>

</body>
</html>
